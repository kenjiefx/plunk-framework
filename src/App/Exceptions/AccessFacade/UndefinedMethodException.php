<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exceptions\AccessFacade;

class UndefinedMethodException extends \Exception {

    public function __construct(
        private string $className,
        private string $methodName
        )
    {
        echo "UndefinedMethodException: Method '{$methodName}' not found in {$className}";
    }


}
