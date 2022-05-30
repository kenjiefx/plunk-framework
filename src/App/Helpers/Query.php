<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Helpers;

class Query {

    private array $dataset = [];

    public function __construct()
    {

    }

    public function set(
        string $query
        )
    {
        parse_str($query,$this->dataset);
    }

    public function get(
        string $key
        )
    {
        return $this->dataset[$key] ?? null;
    }



}
