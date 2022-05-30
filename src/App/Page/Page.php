<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Page;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use Kenjiefx\PlunkFramework\App\Theme\Theme;
use Kenjiefx\PlunkFramework\App\Helpers\Path;
use Kenjiefx\PlunkFramework\App\Feed\Feed;


class Page implements AccessFacadeInterface{

    use AccessFacadeTrait;

    public function __construct(
        private Theme $Theme,
        private Path $Content,
        private Feed $Feed
        )
    {

    }

    public function theme()
    {
        return $this->Theme;
    }

    public function content()
    {
        return $this->Content;
    }

    public function feed()
    {
        return $this->Feed;
    }

}
