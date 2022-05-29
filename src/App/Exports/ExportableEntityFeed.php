<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exports;

class ExportableEntityFeed
{

    private string $context;
    private string $path;

    public function setContext(
        string $context
        )
    {
        $this->context = $context;
    }

    public function setPath(
        string $path
        )
    {
        $this->path = $path;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function getPath()
    {
        return $this->path;
    }
}
