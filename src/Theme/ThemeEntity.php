<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;
use Kenjiefx\PlunkFramework\Theme\Entities\Index;


class ThemeEntity {

    private \ReflectionClass $entity;
    private array $attr;
    private string $themeName;

    public function __construct(
        string $EntityClass
        )
    {
        $this->entity = new \ReflectionClass($EntityClass);
        $this->attr = $this->entity->getAttributes();
    }

    public static function index()
    {
        return new ThemeEntity(Index::class);
    }

    public function set(
        string $themeName
        )
    {
        $this->themeName = $themeName;
    }

    public function getPath()
    {
        foreach ($this->attr as $att) {
            
        }
    }

}
