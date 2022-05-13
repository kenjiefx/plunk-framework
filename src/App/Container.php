<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App;
use Psr\Container\ContainerInterface;
use Kenjiefx\PlunkFramework\Exceptions\Container\NotFoundException;
use Kenjiefx\PlunkFramework\Exceptions\Container\ContainerException;

class Container implements ContainerInterface {

    private array $entries = [];

    public function get(
        string $id
        )
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];
            return $entry($this);
        }
        return $this->resolve($id);
    }

    public function has(
        string $id
        ): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(
        string $id,
        callable $concrete
        )
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(
        string $id
        )
    {
        $reflectionClass = new \ReflectionClass($id);
        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Class {$id} is not instantiable.");
        }
        $constructor = $reflectionClass->getConstructor();
        if (null===$constructor) {
            return new $id;
        }
        $parameters = $constructor->getParameters();
        if (null===$parameters) {
            return new $id;
        }
        $dependencies = array_map(function(\ReflectionParameter $param) use ($id){
            $name = $param->getName();
            $type = $param->getType();
            if (null===$type) {
                throw new ContainerException(
                    "Failed to resolve class {$id}, param {$name} is not type-hinted"
                );
            }
            if ($type instanceof \ReflectionUnionType) {
                throw new ContainerException(
                    "Failed to resolve class {$id}, param {$name} is union type and unsupported"
                );
            }
            if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {

                return $this->get($type->getName());
            }
            throw new ContainerException(
                "Failed to resolve class {$id}, invalid param {$name}"
            );
        },$parameters);
        return $reflectionClass->newInstanceArgs($dependencies);
    }

    public static function create()
    {
        return new Container();
    }



}
