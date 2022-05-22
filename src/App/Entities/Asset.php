<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Entities;
use Kenjiefx\PlunkFramework\App\Entities\ThemeEntity;
use Kenjiefx\PlunkFramework\App\Entities\ThemeEntityInterface;

class Asset {

    protected string $entity = 'asset';
    protected string|null $name = '';
    protected string $path = '';

    public function setName(
        string|null $name
        )
    {
        $this->name = $name;
        return $this;
    }

    public function setPath()
    {
        $this->path = '/assets/'.$this->name;
    }

    public function __toString()
    {
        return $this->path;
    }

}
