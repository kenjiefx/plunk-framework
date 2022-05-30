<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Theme;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use Kenjiefx\PlunkFramework\App\Factory\PathFactory;
use Kenjiefx\PlunkFramework\App\Helpers\Path;

class Theme implements AccessFacadeInterface{

    use AccessFacadeTrait;

    private string $name;
    private Path $path;

    public function __construct(
        private PathFactory $PathFactory
        )
    {
        
    }





}
