<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Services;
use Kenjiefx\PlunkFramework\Exceptions\Theme\NotFoundException;

class ThemeService {

    private string $theme = '';
    private string $path = '';
    private string $target = '';
    private array $feed = [];
    private string $context = '';
    private array $plugins = [];

    public function __construct()
    {

    }

    public function setTheme(
        string|null $theme
        )
    {
        try {
            $path = ROOT."/themes/{$theme}";
            if (null===$theme||!is_dir($path))
                throw new NotFoundException("Theme Not Found: {$theme}");
            $this->theme = $theme;
            $this->path = $this->toSafePath($path);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }

    }

    public function setTarget(
        string|null $target
        )
    {
        try {
            $path = $this->path.$target;
            if (null===$target||!file_exists($path))
                throw new NotFoundException("Theme Content Not Found: {$target}");
            $this->target = $this->toSafePath($path);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }

    }

    public function setSource(
        string|null $context,
        string|null $sourcePath
        )
    {
        $path = ROOT."/".$sourcePath;
        if (is_dir($path)) return $this;
        if (!file_exists($path)) return $this;
        $data = json_decode(file_get_contents($path),TRUE);
        if (empty($data))return $this;
        if (null!==$context) {
            $this->context = $context;
            $this->feed = $data;
        }
        return $this;
    }

    public function loadPlugins()
    {
        $path = $this->path.'/imports.json';
        if (file_exists($path)) {
            try {
                $plugins = json_decode(file_get_contents($path),TRUE);
                if (null===$plugins) {
                    throw new \Exception('Invalid Import JSON format');
                }
                $this->plugins = $plugins;
            } catch (\Exception $e) {
                echo $e->getMessage();
                exit();
            }

        }
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function getIndex()
    {
        return $this->path.'/index.php';
    }

    public function getSource()
    {
        return [
            'context' => $this->context,
            'feed' => $this->feed
        ];
    }

    public function toSafePath(
        string $path
        )
    {
        return str_replace('\\', '/', $path);
    }

    public function getPlugins()
    {
        return $this->plugins;
    }



}
