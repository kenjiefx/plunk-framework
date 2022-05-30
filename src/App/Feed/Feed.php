<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Feed;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use Kenjiefx\PlunkFramework\App\Helpers\Path;

class Feed implements AccessFacadeInterface{

    use AccessFacadeTrait;

    private string $context;
    private Path $source;

    public function __construct()
    {

    }

}
