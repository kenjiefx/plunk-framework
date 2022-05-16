<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders\Page;
use Kenjiefx\PlunkFramework\App\Services\ThemeService;
use Kenjiefx\PlunkFramework\App\Builders\BuildersInterface;
use Kenjiefx\PlunkFramework\App\Builders\Engine\BuildEngine;

class PageBuilder implements BuildersInterface {

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
        $this->BuildEngine->setTheme($this->ThemeService->getTheme());
        $this->BuildEngine->setTarget($this->ThemeService->getTarget());
        $this->BuildEngine->feed($this->ThemeService->getSource());
        return $this->BuildEngine->start($this->ThemeService->getIndex());
    }

}
