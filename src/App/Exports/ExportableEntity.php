<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exports;
use Kenjiefx\PlunkFramework\App\Exports\ExportableEntityFeed;

class ExportableEntity {

    private string $themePath;
    private string $exportPath;
    private string $name;
    private string $template;

    public function __construct(
        private ExportableEntityFeed $feed
        )
    {

    }

    public function setName(
        string $name
        )
    {
        $this->name = $name;
        return $this;
    }

    public function setTemplate(
        string $template
        )
    {
        $this->template = $template;
        return $this;
    }

    public function setThemePath(
        string $themePath
        )
    {
        $this->themePath = $themePath;
        return $this;
    }

    public function setExportPath(
        string $path
        )
    {
        $this->exportPath = $path;
        return $this;
    }

    public function feed()
    {
        return $this->feed;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function getExportPath()
    {
        return ROOT.$this->exportPath;
    }







}
