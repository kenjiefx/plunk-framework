<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App;

#[\Attribute]
class MyAttribute
{

    public function __construct(
        private int $value
        )
    {
        echo $value;
    }
}
