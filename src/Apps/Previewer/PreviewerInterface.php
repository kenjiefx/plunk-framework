<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Previewer;
use Kenjiefx\PlunkFramework\App\Services\BuildService;
use Kenjiefx\PlunkFramework\App\Services\QueryParserService;
use Kenjiefx\PlunkFramework\App\Entities\ThemeEntity;
use GuzzleHttp\Psr7\Uri;

interface PreviewerInterface {

    public function preview(
        Uri $uri
    );

}
