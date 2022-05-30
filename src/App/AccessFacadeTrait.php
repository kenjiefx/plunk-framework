<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App;
use Kenjiefx\PlunkFramework\App\AccessFacade;

trait AccessFacadeTrait {

    public function get()
    {
        return new AccessFacade($this);
    }

    public function set()
    {
        return new AccessFacade($this);
    }

    public function run(
        bool $isThreaded = false
        )
    {
        return new AccessFacade($this,$isThreaded);
    }

    public function thread()
    {
        return new AccessFacade($this,true);
    }

}
