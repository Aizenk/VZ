<?php

namespace VZ\Controller;

use VZ\Lib\Core\AbstractController;
use VZ\Lib\Render\PageRenderer;

class MainController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('/', 'main');
        $this->addGetRoute('/blog', 'blog');
        $this->addGetRoute('/info', 'info');
    }

    public function blog()
    {
        return (new PageRenderer)->render('main\index.phtml');
    }

    public function main()
    {
        return (new PageRenderer)->render('main\index.phtml');
    }

    public function info()
    {
        $request = $this->getRequest();

        return $request->get('foo', 'put foo into the address line like http://vz/info?foo=100');
    }
}
