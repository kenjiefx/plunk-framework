<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Kenjiefx\PlunkFramework\App\Factories\ContainerFactory as Container;
use Kenjiefx\PlunkFramework\App\Exports\Parser as Parser;
use Kenjiefx\PlunkFramework\App\Services\ExportService;

class Exporter {

    private Parser $parser;


    public function __construct()
    {

    }

    public function register()
    {
        $this->parser = Container::create()->get(Parser::class);
        $this->parser->parse(ROOT.'/plunk.exports.json');
        return $this;
    }

    public function export()
    {
        $this->exporter = Container::create()->get(ExportService::class);
        $this->exporter->useManager($this->parser->getManager());
        $this->exporter->export();
        return $this;
    }

}
