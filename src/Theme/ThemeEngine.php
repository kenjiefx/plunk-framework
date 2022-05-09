<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;
use Kenjiefx\PlunkFramework\View\View;

class ThemeEngine
{
    public function __construct(
        View $view
        )
    {
        echo $view->path();
    }
}
