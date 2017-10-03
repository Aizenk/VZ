<?php

namespace VZ\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use VZ\Entity\Text;
use VZ\Lib\Core\AbstractController;
use VZ\Lib\Render\PageRenderer;
use VZ\Model\TextModel;

class TextsController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('texts/create', 'createText');
        $this->addGetRoute('texts/get-all', 'getAll');
    }

    public function createText()
    {
        $text = $this->getRequest()->get('text');
        $res = TextModel::create($text);

        return 'ok!';
    }

    public function getAll()
    {
        return JsonResponse::create(Text::findBySql('select * from texts'));
    }
}
