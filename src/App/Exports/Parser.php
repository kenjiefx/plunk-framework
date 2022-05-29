<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exports;
use Kenjiefx\PlunkFramework\App\Exports\Manager;
use Kenjiefx\PlunkFramework\Exceptions\Export\NotFoundException;
use Kenjiefx\PlunkFramework\Exceptions\Export\InvalidConfigException;

class Parser {

    public function __construct(
        private Manager $manager
        )
    {

    }

    public function parse(
        string $configPath
        )
    {
        try {
            if (!file_exists($configPath)) {
                throw new NotFoundException(
                    'Unable to find plunk.exports.json config file'
                );
            }
            $exports = json_decode(file_get_contents($configPath),TRUE);
            if (null===$exports) {
                throw new InvalidConfigException(
                    'Invalid plunk.exports.json config file'
                );
            }
            if (!isset($exports['theme'])) {
                throw new InvalidConfigException(
                    'Invalid plunk.exports.json config file, requires theme'
                );
            }
            if (!isset($exports['exports'])) {
                throw new InvalidConfigException(
                    'Invalid plunk.exports.json config file, unable to find exportable list'
                );
            }
            $this->manager->useTheme($exports['theme']);
            $this->manager->manage($exports['exports']);
            $this->manager->create();
        } catch (\Exception $e) {
            echo 'ExportException: '.$e->getMessage();
            exit();
        }

    }

    public function getManager()
    {
        return $this->manager;
    }



}
