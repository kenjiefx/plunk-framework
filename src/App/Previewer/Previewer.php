<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Previewer;

class Previewer {

    public function setUri(
        string $queryString
        )
    {
        $this->query->set($queryString);
    }

    public function setEntity()
    {
        $target = $this->query->get('target');
        $this->ThemeEntity->setName($target)->setPath();
    }

}
