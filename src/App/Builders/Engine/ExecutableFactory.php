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
    }

    public function compile()
    {
        file_put_contents(__DIR__.'/bin/build.php',$this->exe);
    }


}
