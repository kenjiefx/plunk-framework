<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;
use Kenjiefx\PlunkFramework\View\View;

class ThemeEngine
{

    private string $theme;

    public function __construct(
        private View $view
        )
    {

    }

    public function preview()
    {
        $this->make();
        $this->build();
    }

    private function make()
    {
        $importable = $this->import();
        $exportable = file_get_contents($this->view->path());
        $this->theme = $importable.$exportable;
    }

    private function import()
    {
        $imports = $this->view->import();
        $import = "<?php ";
        foreach ($imports as $package) {
            $import .= "use {$package}; ";
        }
        $import .= "?> ";
        return $import;
    }

    private function build()
    {
        file_put_contents(__DIR__.'/theme.php',$this->theme);
        require(__DIR__.'/theme.php');
    }


}
