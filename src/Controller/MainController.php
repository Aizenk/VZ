<?php

namespace VZ\Controller;

use VZ\Lib\Core\AbstractController;

class MainController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('/blog', 'main');
        $this->addGetRoute('/info', 'info');
    }

    public function main()
    {
        return 100;
    }

    public function info()
    {
        $request = $this->getRequest();

        return $request->get('foo', 'put foo into the address line like http://vz/info?foo=100');
    }
}
