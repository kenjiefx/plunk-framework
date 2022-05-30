<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exceptions\AccessFacade;

class UninitializedPropertyException extends \Exception {

    public function __construct(
        private string $className,
        private string $propName
        )
    {
        echo "UninitializedPropertyException: Property '{$propName}' must be initialized before access in {$className}";
    }


}
