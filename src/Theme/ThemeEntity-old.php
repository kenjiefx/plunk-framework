<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;
use Kenjiefx\PlunkFramework\Theme\Entities\Index;
use Kenjiefx\PlunkFramework\Theme\EntityAttribute;


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
            $attr = $att->newInstance();
            $attr->setTheme($this->themeName);
        }
        return $attr->buildPath();
    }

    public function getImports()
    {
        $importPath = ROOT.'/views/'.$this->themeName.'/imports.json';
        return json_decode(file_get_contents($importPath),TRUE);
    }

}
