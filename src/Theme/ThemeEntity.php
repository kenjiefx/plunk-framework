<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;
use Kenjiefx\PlunkFramework\Theme\ThemeOptions;
use Kenjiefx\PlunkFramework\Theme\ThemeModel;

class ThemeEntity extends ThemeModel
{

    private string $entityName;

    public function __construct(
        private ThemeOptions $ThemeOptions
        )
    {
        parent::__construct(
            themeName: $this->ThemeOptions->get()->theme()
        );
        $this->setName();
    }

    private function setName()
    {
        $this->entityName = $this->ThemeOptions->get()->entity();
    }








}
