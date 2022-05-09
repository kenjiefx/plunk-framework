<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\View;
use Kenjiefx\PlunkFramework\Theme\ThemeEntity;
use GuzzleHttp\Psr7\Uri;

class View {

    private array $params = [];

    public function __construct(
        private Uri $uri,
        private ThemeEntity $theme
        )
    {
        $this->parse($uri);
    }

    private function parse()
    {
        parse_str($this->uri->getQuery(),$this->params);
        $this->theme();
    }

    public function theme()
    {
        try {
            if (!isset($this->params['theme']))
                throw new \Exception('Theme not supplied');
            $this->theme->set($this->params['theme']);
            return $this->params['theme'];
        } catch (\Exception $e) {
            /**
             * @TODO Exceptions
             */
        }
    }

    public function path()
    {
        return $this->theme->getPath();
    }

}
