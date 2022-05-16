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
    }

    public function setTarget(
        string $targetPath
        )
    {
        $this->GlobalsConstructor->addTarget($targetPath);
    }

    public function feed(
        array $dataFeed
        )
    {
        $this->dataFeed = $dataFeed;
        $this->GlobalsConstructor->addFeed($dataFeed);
    }

    public function start(
        string $pathToIndex
        )
    {
        $this->ExecutableFactory->importFunctions();
        $this->ExecutableFactory->importGlobals($this->GlobalsConstructor->toArray());
        $this->ExecutableFactory->importIndex($pathToIndex);
        $this->ExecutableFactory->compile();
        return $this->run();
    }

    private function run()
    {
        return shell_exec('php '.__DIR__.'/bin/build.php');
    }




}
