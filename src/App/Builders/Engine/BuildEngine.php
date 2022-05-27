<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders\Engine;
use Kenjiefx\PlunkFramework\App\Builders\Engine\GlobalsConstructor;
use Kenjiefx\PlunkFramework\App\Builders\Engine\ExecutableFactory;

class BuildEngine {

    private array $dataFeed = [];

    public function __construct(
        private GlobalsConstructor $GlobalsConstructor,
        private ExecutableFactory $ExecutableFactory
        )
    {

    }

    public function setTheme(
        string $path
        )
    {
        $this->GlobalsConstructor->addTheme($path);
        return $this;
    }

    public function setTarget(
        string $targetPath
        )
    {
        $this->GlobalsConstructor->addTarget($targetPath);
        return $this;
    }

    public function setPlugins(
        array $plugins
        )
    {
        $this->ExecutableFactory->importPlugins($plugins);
        return $this;
    }

    public function setFeed(
        array $dataFeed
        )
    {
        $this->dataFeed = $dataFeed;
        $this->GlobalsConstructor->addFeed($dataFeed);
        return $this;
    }

    public function setImports(
        string $pathToIndex
        )
    {
        $this->ExecutableFactory->importFunctions()
                                ->importGlobals($this->GlobalsConstructor->toArray())
                                ->importIndex($pathToIndex);
        return $this;
    }

    public function runBuild()
    {
        $this->ExecutableFactory->compile();
        return shell_exec('php '.__DIR__.'/bin/build.php');
    }




}
