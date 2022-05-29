<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exports;
use Kenjiefx\PlunkFramework\App\Exports\ExportableEntity;
use Kenjiefx\PlunkFramework\Exceptions\Export\InvalidConfigException;
use Kenjiefx\PlunkFramework\App\Exports\ExportableEntityFeed;

class ExportableEntityFactory {

    public function create(
        string $themePath,
        string $exportableName,
        array $exportableEntity
        )
    {
        $exportable = new ExportableEntity(new ExportableEntityFeed());

        $exportable->setName($exportableName)
                   ->setThemePath($themePath);

        try {
            if (!isset($exportableEntity['template'])) {
                throw new InvalidConfigException(
                    "Invalid plunk.exports.json config file, exportable entity '{$exportableName}' must bind template"
                );
            }
            $exportable->setTemplate($exportableEntity['template']);
            if (!isset($exportableEntity['feed'])) {
                throw new InvalidConfigException(
                    "Invalid plunk.exports.json config file, exportable entity '{$exportableName}' must declare feed even when empty"
                );
            }
            if (null!==$exportableEntity['feed']) {
                if (!isset($exportableEntity['feed']['context'])) {
                    throw new InvalidConfigException(
                        "Invalid plunk.exports.json config file, exportable entity '{$exportableName}' feed must declare context"
                    );
                }
                $exportable->feed()->setContext($exportableEntity['feed']['context']);
                if (!isset($exportableEntity['feed']['path'])) {
                    throw new InvalidConfigException(
                        "Invalid plunk.exports.json config file, exportable entity '{$exportableName}' feed must bind path"
                    );
                }
                $exportable->feed()->setPath($exportableEntity['feed']['path']);
            }
            if (!isset($exportableEntity['exportPath'])) {
                throw new InvalidConfigException(
                    "Invalid plunk.exports.json config file, exportable entity '{$exportableName}' must bind export path"
                );
            }
            $exportable->setExportPath($exportableEntity['exportPath']);
            return $exportable;

        } catch (\Exception $e) {
            echo 'ExportableEntityException: (Thrown at ExportableEntityFactory): '.$e->getMessage();
            exit();
        }


        return '';
    }

}
