<?php

namespace VZ\Core;

use Symfony\Component\HttpFoundation\Request;

class Application
{

    private $request;

    public static function instance()
    {
        return new static();
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

    public function run()
    {
        $this->getControllerName();
    }

    private function getControllerName()
    {
        
    }
}
