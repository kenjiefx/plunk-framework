<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exports;
use Kenjiefx\PlunkFramework\App\Exports\ExportableEntityFactory;
use Kenjiefx\PlunkFramework\App\Entities\Template as ThemeEntity;
use Kenjiefx\PlunkFramework\App\Exports\Exportables;

class Manager {

    private array $registry    = [];
    private string $themeName  = '';

    public function __construct(
        private Exportables $Exportables,
        private ExportableEntityFactory $ExportableEntityFactory,
        private ThemeEntity $ThemeEntity
        )
    {

    }

    public function useTheme(
        string $themeName
        )
    {
        $this->themeName = $themeName;
        $this->ThemeEntity->setName($themeName)->setPath();
    }

    public function manage(
        array $rawExportables
        )
    {
        $this->registry = $rawExportables;
    }

    public function create()
    {
        $i = 0;
        foreach ($this->registry as $exportableName => $exportable) {
            $this->Exportables->push(
                $this->ExportableEntityFactory->create(
                    (string) $this->ThemeEntity,
                    $exportableName,
                    $exportable
                )
            );
            $i++;
        }
        echo "Found {$i} exportable entity/s in to be processed.";
    }

    public function getExportables()
    {
        return $this->Exportables;
    }

    public function getTheme()
    {
        return $this->themeName;
    }

    public function getEntity()
    {
        return $this->ThemeEntity;
    }



}
