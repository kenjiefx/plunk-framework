<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exports;
use Kenjiefx\PlunkFramework\App\Exports\ExportableEntityFactory;

class Manager {

    private array $exportables = [];
    private array $registry    = [];

    public function __construct(
        private ExportableEntityFactory $ExportableEntityFactory
        )
    {
        
    }

    public function manage(
        array $exportables
        )
    {
        $this->exportables = $exportables;
    }

    public function create()
    {
        $i = 0;
        foreach ($this->exportables as $exportable) {
            array_push(
                $this->registry,
                $this->ExportableEntityFactory->create($exportable)
            );
            $i++;
        }
        echo "Found {$i} exportable entity/s in to be processed.";
    }

}
