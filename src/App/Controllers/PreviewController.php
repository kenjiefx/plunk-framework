<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Controllers;
use Kenjiefx\PlunkFramework\App\Controllers\ThemeController;

class PreviewController {

    public function __construct(
        private ThemeController $ThemeController
        )
    {

    }

    public function template()
    {
        $this->ThemeController->setTarget();
    }

}
