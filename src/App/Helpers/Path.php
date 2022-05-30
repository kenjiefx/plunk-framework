<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Helpers;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;

class Path implements AccessFacadeInterface{

    use AccessFacadeTrait;
    private string $path;

    public function __construct()
    {

    }

    public function isDir()
    {
        return is_dir(ROOT.$this->path);
    }

    public function isFile()
    {
        return is_file(ROOT.$this->path);
    }

    public function getContens()
    {
        return file_get_contents(ROOT.$this->path);
    }

    public function real()
    {
        return ROOT.$this->path;
    }

    public function raw()
    {
        return $this->path;
    }



}
