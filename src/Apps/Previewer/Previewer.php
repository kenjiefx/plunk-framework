<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Previewer;

class Previewer {

    /**
     * =================================================================
     * @method setUri
     * Sets query string to the $query property of the implementing previewer
     * =================================================================
     */
    public function setUri(
        string $queryString
        )
    {
        $this->query->set($queryString);
    }

    /**
     * =================================================================
     * @method setEntity
     * Set the target to certain Theme Entity
     * =================================================================
     */
    public function setEntity()
    {
        $target = $this->query->get('target');
        $this->ThemeEntity->setName($target)->setPath();
    }

}
