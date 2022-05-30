<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use Kenjiefx\PlunkFramework\App\Exceptions\AccessFacade\UndefinedMethodException;
use Kenjiefx\PlunkFramework\App\Exceptions\AccessFacade\UndefinedPropertyException;
use Kenjiefx\PlunkFramework\App\Exceptions\AccessFacade\UninitializedPropertyException;

class AccessFacade {

    private \ReflectionClass $AccessibleClass;

    public function __construct(
        private AccessFacadeInterface $AccessibleObject,
        private bool $isThreaded = false
        )
    {
        $this->AccessibleClass = new \ReflectionClass($AccessibleObject::class);
    }

    private function getProperty(
        string $prop
        )
    {
        $hasProp = false;
        try {
            foreach ($this->AccessibleClass->getProperties() as $property) {
                if ($property->name===$prop) $hasProp = true;
            }
            if (!$hasProp) {
                throw new UndefinedPropertyException(
                    $this->AccessibleClass->getName(),
                    $prop
                );
            }
            return $this->AccessibleClass->getProperty($prop);
        } catch (\Exception $e) {
            exit();
        }
    }

    public function __get(
        string $prop
        )
    {
        $AccessibleProperty = $this->getProperty($prop);
        $AccessibleProperty->setAccessible(true);
        return $AccessibleProperty->getValue($this->AccessibleObject);
    }

    public function __set(
        string $prop,
        mixed $value
        )
    {
        $AccessibleProperty = $this->getProperty($prop);
        $AccessibleProperty->setAccessible(true);
        $AccessibleProperty->setValue($this->AccessibleObject,$value);
    }

    public function __call(
        string $method,
        array $args
        )
    {
        try {
            if (!$this->AccessibleClass->hasMethod($method)) {
                throw new UndefinedMethodException(
                    $this->AccessibleClass->getName(),
                    $method
                );
            }
            $AccessibleMethod = $this->AccessibleClass->getMethod($method);
            foreach ($AccessibleMethod->getAttributes() as $attribute) {
                $attribute->newInstance();
            }

            call_user_func_array(array(&$this->AccessibleObject,$method),$args);

            if ($this->isThreaded) {
                return $this->AccessibleObject->run(true);
            }

        } catch (\Exception $e) {
            exit();
        }

    }



}
