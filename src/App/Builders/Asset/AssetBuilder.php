<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders\Asset;
use Kenjiefx\PlunkFramework\App\Services\ThemeService;
use Kenjiefx\PlunkFramework\App\Builders\BuildersInterface;
use Kenjiefx\PlunkFramework\App\Builders\Engine\BuildEngine;

class AssetBuilder implements BuildersInterface {

    public function __construct(
        private ThemeService $ThemeService,
        private BuildEngine $BuildEngine
        )
    {

    }

    public function useTheme(
        string|null $name
        )
    {
        $this->ThemeService->setTheme($name);
        return $this;
    }

    public function useContent(
        string|null $target
        )
    {
        $this->ThemeService->setTarget($target);
        return $this;
    }

    public function useSource(
        string|null $context,
        string|null $source
        )
    {
        $this->ThemeService->setSource($context,$source);
        return $this;
    }

    public function build()
    {
        return file_get_contents($this->ThemeService->getTarget());
    }

}
