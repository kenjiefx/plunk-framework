<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders\Asset;
use Kenjiefx\PlunkFramework\App\Services\ThemeService;
use Kenjiefx\PlunkFramework\App\Builders\BuildersInterface;
use Kenjiefx\PlunkFramework\App\Builders\Engine\BuildEngine;
use Kenjiefx\PlunkFramework\App\Builders\Builder;

class AssetBuilder extends Builder implements BuildersInterface {

    public function __construct(
        protected ThemeService $ThemeService,
        protected BuildEngine $BuildEngine
        )
    {

    }

    public function build()
    {
        return file_get_contents($this->ThemeService->getTarget());
    }

}
