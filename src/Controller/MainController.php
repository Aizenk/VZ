<?php

namespace VZ\Controller;

use VZ\Entity\Text;
use VZ\Lib\Core\AbstractController;
use VZ\Lib\Orm\Dispatcher;
use VZ\Lib\Render\PageRenderer;
use VZ\Model\TextModel;

class MainController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('/', 'main');
        $this->addGetRoute('/blog', 'blog');
        $this->addGetRoute('/info', 'info');
        $this->addGetRoute('/test', 'test');
        $this->addGetRoute('/create-text', 'createText');
    }

    public function createText()
    {
        $text = $this->getRequest()->get('text');
        $res = TextModel::create($text);
        var_export($res);
        return 'ok!';
    }

    public function blog()
    {
        return (new PageRenderer)->render('main\index.phtml');
    }

    public function test()
    {
        $res = TextModel::create('textttt', true);
        var_export($res);

        die;

        return 'ok!';
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
