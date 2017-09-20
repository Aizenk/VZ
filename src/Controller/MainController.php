<?php

namespace VZ\Controller;

use VZ\Lib\Core\AbstractController;
use VZ\Lib\Render\PageRenderer;
use VZ\Repository\TextsRepository;

class MainController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('/', 'main');
        $this->addGetRoute('/blog', 'blog');
        $this->addGetRoute('/info', 'info');
        $this->addGetRoute('/test', 'test');
    }

    public function blog()
    {
        return (new PageRenderer)->render('main\index.phtml');
    }

    public function test()
    {
        $val = TextsRepository::instance()->findOneById(8);
        
        return $val->getText();
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
