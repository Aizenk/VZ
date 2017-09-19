<?php

namespace VZ\Lib\Core;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use VZ\Controller\ControllerProvider;

class VZ
{
    private $silex;
    private $request;

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
        $this->silex->run($this->getRequest());
    }

    /**
     * @return Application
     */
    public function getSilex()
    {
        return $this->silex;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        if (is_null($this->request)) {
            return $this->request = Request::createFromGlobals();
        }

        return $this->request;
    }
}
