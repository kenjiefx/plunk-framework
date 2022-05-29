<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Services;
use Kenjiefx\PlunkFramework\App\Exports\Manager;
use Kenjiefx\PlunkFramework\App\Builders\Page\PageBuilder as BuildService;
use Kenjiefx\PlunkFramework\Exceptions\Export\ExportRuntimeException;
use Kenjiefx\PlunkFramework\App\Entities\Template as ThemeEntity;
use Kenjiefx\PlunkFramework\App\Exports\ExportableEntity;

class ExportService {

    public function __construct(
        private Manager $manager,
        private BuildService $BuildService,
        private ThemeEntity $ThemeEntity
        )
    {

    }

    public function useManager(
        Manager $manager
        )
    {
        $this->manager = $manager;
    }

    
    public function export()
    {
        try {
            foreach ($this->manager->getExportables() as $exportable) {
                $this->processExportableEntity($exportable);
            }
        } catch (\Exception $e) {
            echo 'ExportRuntimeException: '.$e->getMessage();
            exit();
        }
    }

    private function processExportableEntity(
        ExportableEntity $exportable
        )
    {
        $this->prepareExportDirectory($exportable->getExportPath());
        $this->ThemeEntity->setName($exportable->getTemplate())->setPath();

        if (null!==$exportable->feed()->getPath()) {
            $feeds = scandir(ROOT.$exportable->feed()->getPath());
            foreach ($feeds as $feed) {
                if ($feed==='.'||$feed==='..') continue;
                [$feedName,$fileType] = explode('.',$feed);
                if ($fileType==='json') {
                    $this->publish(
                        $exportable->getExportPath().'/'.$feedName.'.html',
                        $this->BuildService->useTheme($this->manager->getTheme())
                                                ->usePlugins($this->manager->getTheme())
                                                ->useContent((string)$this->ThemeEntity)
                                                ->useSource($exportable->feed()->getContext(),$exportable->feed()->getPath().'/'.$feed)
                                                ->build()
                    );
                }
            }
        } else {
            $this->publish(
                $exportable->getExportPath().'/'.$this->getTemplate().'.html',
                $this->BuildService->useTheme($this->manager->getTheme())
                                        ->usePlugins($this->manager->getTheme())
                                        ->useContent((string)$this->ThemeEntity)
                                        ->build()
            );
        }
    }

    private function prepareExportDirectory(
        string $exportPath
        )
    {
        if (!is_dir($exportPath)) {
            if (!@mkdir($exportPath)) {
                throw new ExportRuntimeException(
                    "Unable to create directory {$exportPath}. Parent directory do not exist"
                );
            }
        }
    }

    private function publish(
        string $filePath,
        string $fileContents
        )
    {
        file_put_contents($filePath,$fileContents);
    }



}
