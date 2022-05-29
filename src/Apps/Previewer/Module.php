<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Previewer;
use Kenjiefx\PlunkFramework\App\Previewer\Previewer;
use Kenjiefx\PlunkFramework\App\Previewer\PreviewerInterface;
use Kenjiefx\PlunkFramework\App\Services\QueryParserService;
use Kenjiefx\PlunkFramework\App\Entities\Module as ThemeEntity;
use Kenjiefx\PlunkFramework\App\Builders\Module\ModuleBuilder as BuildService;
use Kenjiefx\PlunkFramework\App\Builders\BuildersInterface;
use GuzzleHttp\Psr7\Uri;

class Module extends Previewer implements PreviewerInterface {

    public function __construct(
        protected BuildService $BuildService,
        protected QueryParserService $query,
        protected ThemeEntity $ThemeEntity
        )
    {

    }

    public function preview(
        Uri $uri
        )
    {
        $this->setUri($uri->getQuery());
        $this->setEntity();
        return $this->BuildService->useTheme($this->query->get('theme'))
                                  ->usePlugins($this->query->get('theme'))
                                  ->useContent((string)$this->ThemeEntity)
                                  ->useSource($this->query->get('context'),$this->query->get('source'))
                                  ->build();
    }

}
