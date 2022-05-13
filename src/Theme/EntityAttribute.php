<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;

#[\Attribute]
class EntityAttribute {

    private string $themeName;

    public function __construct(
        private string $path
        )
    {
        
    }

    public function setTheme(
        string $themeName
        )
    {
        $this->themeName = $themeName;
    }

    public function buildPath()
    {
        return ROOT.'/views/'.$this->themeName.$this->path;
    }

}
