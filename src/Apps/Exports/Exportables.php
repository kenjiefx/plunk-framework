<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Exports;

class Exportables implements \Iterator {

    private $position = 0;
    private $objects = [];

    public function __construct() {
        $this->position = 0;
    }

    public function push(
        object $entity
        )
    {
        array_push($this->objects,$entity);
    }

    public function rewind(): void {
        $this->position = 0;
    }

    public function current() {
        
        return $this->objects[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next(): void {
        ++$this->position;
    }

    public function valid(): bool {
        return isset($this->objects[$this->position]);
    }

}
