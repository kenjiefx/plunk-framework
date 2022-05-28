<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Kenjiefx\PlunkFramework\App\Factories\ContainerFactory as Container;
use Kenjiefx\PlunkFramework\App\Exports\Parser as Parser;

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
        return $this;
    }

}
