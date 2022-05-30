<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exceptions\AccessFacade;

class UndefinedPropertyException extends \Exception {

    public function __construct(
        private string $className,
        private string $propName
        )
    {
        echo "UndefinedPropertyException: Property '{$propName}' not found in {$className}";
    }


}
