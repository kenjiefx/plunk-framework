<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Entities;

class ThemeEntity {

    public function setPath()
    {
        $this->path = "/{$this->entity}s/{$this->name}.php";
    }

}
