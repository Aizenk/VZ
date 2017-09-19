<?php

namespace VZ\Lib\Core;

use Silex\Application;
use VZ\Controller\ControllerProvider;

class VZ
{
    private $silex;

    public static function instance()
    {
        return new static();
    }

    private function __construct()
    {
    }

    public function run()
    {
        $this->silex = new Application();
        $this->silex['debug'] = true;
        ControllerProvider::registerAllControllers($this->silex);
        $this->silex->run();
    }

    public function getSilex()
    {
        return $this->silex;
    }
}
