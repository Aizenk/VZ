<?php

namespace VZ\Controller;

class MainController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('/blog', 'main');
    }

    public function main()
    {
        return 100;
    }

}
