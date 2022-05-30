<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Preview;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use GuzzleHttp\Psr7\Uri as RequestUri;
use Kenjiefx\PlunkFramework\App\Factory\PathFactory;
use Kenjiefx\PlunkFramework\App\Helpers\Query as QueryParser;
use Kenjiefx\PlunkFramework\App\Page\Page as PageRepository;
use Kenjiefx\PlunkFramework\App\Build\Build as BuildRepository;

class Preview implements AccessFacadeInterface {

    use AccessFacadeTrait;

    private string $base;
    private RequestUri $options;

    public function __construct(
        protected QueryParser $query,
        protected PageRepository $Page,
        protected BuildRepository $Build,
        protected PathFactory $PathFactory
        )
    {

    }

    public function preview()
    {
        $this->thread()
             # Parsing the query params
             ->query()
             # Setting the name of the theme
             ->theme()
             # Setting the path to the template
             ->content()
             # Setting the context of the feed, if there is any
             ->context()
             # Setting the path to the source of the page
             ->source()
             # Passing the page to our Build Repository
             ->page()
             # Calling the build method
             ->build();
        return $this;
    }

    public function query()
    {
        $params = $this->options->getQuery();
        $this->query->set($params);
        return $this;
    }

    public function theme()
    {
        $theme = $this->query->get('theme');
        $this->Page->theme()->set()->name = $theme;
        $path = $this->PathFactory::create("/themes/{$theme}");
        $this->Page->theme()->set()->path = $path;
        return $this;
    }

    public function content()
    {
        $content = $this->query->get('target');
        $this->Page->content()->set()->path = $content;
        return $this;
    }

    public function context()
    {
        $context = $this->query->get('context');
        $this->Page->feed()->set()->context = $context;
        return $this;
    }

    public function source()
    {
        if (null!==$this->query->get('source')) {
            $path = $this->PathFactory::create(
                $this->query->get('source')
            );
            $this->Page->feed()->set()->source = $path;
        }
        return $this;
    }

    public function page()
    {
        $this->Build->set()->Page = $this->Page;
        return $this;
    }

    public function build()
    {
        return $this->Build->run()->build();
    }













}
