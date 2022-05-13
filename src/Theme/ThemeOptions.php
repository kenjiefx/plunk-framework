<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Theme;
use GuzzleHttp\Psr7\Uri;

class ThemeOptions
{

    private array $options = [];
    private array $stack = [];

    public function __construct(
        private Uri $uri,
        )
    {
        $this->parse();
    }

    private function parse()
    {
        parse_str($this->uri->getQuery(),$this->options);
    }

    public function __call($name, $arguments){
        $this->toStack($name);
        if ($this->inStack(['get',$name])) {
            return $this->options($name);
        }
        return $this;
    }

    private function options(
        string $option
        )
    {
        try {
            if (!isset($this->options[$option]))
                throw new \Exception('Theme not supplied');

            $this->emptyStack();

            return $this->options[$option];

        } catch (\Exception $e) {
            /**
             * @TODO Exceptions
             */
            exit();
        }
    }

    private function toStack(
        string $func
        )
    {
        array_push($this->stack,$func);
        return $this;
    }

    private function inStack(
        array $stackOptions
        )
    {
        return $stackOptions === $this->stack;
    }

    private function emptyStack()
    {
        $this->stack = [];
    }





}
