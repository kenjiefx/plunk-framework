<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Builders\Engine;

class GlobalsConstructor {

    private array $data = [];

    public function addFeed(
        array $feed
        )
    {
        $this->data['feed'] = [
            'name' => $feed['context'],
            'data' => $feed['feed']
        ];
    }

    public function addTheme(
        string $name
        )
    {
        $this->data['theme']['name'] = $name;
        $this->data['theme']['path'] = $this->toSafePath(ROOT)."/themes/{$name}";
    }

    public function addTarget(
        string $targetPath
        )
    {
        $this->data['theme']['target'] = $targetPath;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function toSafePath(
        string $path
        )
    {
        return str_replace('\\', '/', $path);
    }


}
