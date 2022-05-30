<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Build;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use Kenjiefx\PlunkFramework\App\Page\Page as PageRepository;
use Kenjiefx\PlunkFramework\App\Factory\GlobalsFactory;
use Kenjiefx\PlunkFramework\App\Build\Globals;
use Kenjiefx\PlunkFramework\App\Build\Executable;
use Kenjiefx\PlunkFramework\App\Exceptions\Build\NotFoundException;
use Kenjiefx\PlunkFramework\App\Exceptions\Build\InvalidConfigException;
use Kenjiefx\PlunkFramework\App\Factory\PathFactory;


class Build implements AccessFacadeInterface {

    use AccessFacadeTrait;

    private Globals $globals;

    public function __construct(
        private PageRepository $Page,
        private GlobalsFactory $GlobalsFactory,
        private PathFactory $PathFactory,
        private Executable $Executable
        )
    {

    }

    public function build()
    {
        $this->globals = $this->GlobalsFactory::create();
        $this->thread()
             ->theme()
             ->plugins()
             ->content();
    }

    public function theme()
    {
        try {
            if (!$this->Page->theme()->get()->path->isDir()) {
                throw new NotFoundException(
                    "Theme do not exist in path: {$this->Page->theme()->get()->path->real()}"
                );
            }
            $this->globals->set()->Theme = $this->Page->theme();
            return $this;
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function plugins()
    {
        try {
            $path = $this->PathFactory::create($this->Page->theme()->get()->path->raw().'/imports.json');
            if ($path->isFile()) {
                $plugins = json_decode($path->getContens(),true);
                if (null===$plugins) {
                    throw new InvalidConfigException(
                        "Invalid imports.json for theme: {$path->real()}"
                    );
                }
                $this->Executable->importPlugins($plugins);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function content()
    {

    }







}
