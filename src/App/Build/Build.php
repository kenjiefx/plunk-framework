<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Build;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use Kenjiefx\PlunkFramework\App\Page\Page as PageRepository;

class Build implements AccessFacadeInterface {

    use AccessFacadeTrait;

    public function __construct(
        private PageRepository $Page
        )
    {

    }

    public function build()
    {
        
    }



}
