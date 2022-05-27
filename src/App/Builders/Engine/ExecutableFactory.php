<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders\Engine;

class ExecutableFactory {

    private string $exe = '';

    public function importGlobals(
        array $globals
        )
    {
        $this->exe .= '<?php $GLOBALS["BUILD_DATA"] = json_decode(\''.json_encode($globals,JSON_UNESCAPED_UNICODE).'\',TRUE); ?>';
        return $this;
    }

    public function importFunctions()
    {
        $this->exe .= file_get_contents(__DIR__.'/bin/functions.php');
        return $this;
    }

    public function importIndex(
        string $pathToIndex
        )
    {
        $this->exe .= file_get_contents($pathToIndex);
        return $this;
    }

    public function importPlugins(
        array $plugins
        )
    {
        $pluginsBlock = '<?php ';
        foreach ($plugins as $namespace => $alias) {
            $pluginsBlock .= "use {$namespace} as {$alias}; ";
        }
        $pluginsBlock .= 'require_once "'.$this->toSafePath(ROOT).'/vendor/autoload.php";';
        $this->exe .= $pluginsBlock.'?>';
        return $this;
    }

    public function toSafePath(
        string $path
        )
    {
        return str_replace('\\', '/', $path);
    }

    public function compile()
    {
        file_put_contents(__DIR__.'/bin/build.php',$this->exe);
        return $this;
    }


}
