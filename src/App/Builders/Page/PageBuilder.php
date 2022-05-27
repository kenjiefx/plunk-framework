<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders\Page;
use Kenjiefx\PlunkFramework\App\Services\ThemeService;
use Kenjiefx\PlunkFramework\App\Builders\BuildersInterface;
use Kenjiefx\PlunkFramework\App\Builders\Engine\BuildEngine;
use Kenjiefx\PlunkFramework\App\Builders\Builder;

class PageBuilder extends Builder implements BuildersInterface {

    public function __construct(
        protected ThemeService $ThemeService,
        protected BuildEngine $BuildEngine
        )
    {

    }

}
