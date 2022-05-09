<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\View;
use Kenjiefx\PlunkFramework\View\View;
use Psr\Http\Message\ServerRequestInterface as Request;
use Kenjiefx\PlunkFramework\Theme\ThemeEntity;

class ViewController {

    public static function index(
        Request $request
        )
    {
        return new View(
            $request->getUri(),
            ThemeEntity::index()
        );
    }

}
