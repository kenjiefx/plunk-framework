<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders;

class Builder {

    public function useTheme(
        string|null $name
        )
    {
        $this->ThemeService->setTheme($name);
        return $this;
    }

    public function usePlugins(
        string|null $name
        )
    {
        $this->ThemeService->loadPlugins();
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
        return $this->BuildEngine->setTheme($this->ThemeService->getTheme())
                                 ->setTarget($this->ThemeService->getTarget())
                                 ->setPlugins($this->ThemeService->getPlugins())
                                 ->setFeed($this->ThemeService->getSource())
                                 ->setImports($this->ThemeService->getIndex())
                                 ->runBuild();
    }

}
