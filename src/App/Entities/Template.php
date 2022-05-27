<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Entities;
use Kenjiefx\PlunkFramework\App\Entities\ThemeEntity;
use Kenjiefx\PlunkFramework\App\Entities\ThemeEntityInterface;

class Template extends ThemeEntity implements ThemeEntityInterface {

    protected string $entity = 'template';
    protected string|null $name = '';
    protected string $path = '';

    public function __toString()
    {
        return $this->path;
    }

}
