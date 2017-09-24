<?php

namespace VZ\Controller;

use VZ\Lib\Core\AbstractController;
use VZ\Lib\Render\PageRenderer;

class PartsController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('/parts', 'index');
    }

    public function index()
    {
        return (new PageRenderer)->render('parts\index.phtml');
    }

}
