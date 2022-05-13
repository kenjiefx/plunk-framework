<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;
use Kenjiefx\PlunkFramework\Theme\ThemeConfig;

class ThemeModel extends ThemeConfig {

    public function __construct(
        private string $themeName
        )
    {
        parent::__construct();
    }



}
