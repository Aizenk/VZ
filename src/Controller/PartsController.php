<?php

namespace VZ\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use VZ\Lib\Core\AbstractController;
use VZ\Lib\Render\PageRenderer;
use VZ\Model\FileUploadModel;

class PartsController extends AbstractController
{
    public function __construct()
    {
        $this->addGetRoute('/parts/load', 'load');
        $this->addPostRoute('/parts/load', 'loadPost');
    }

    public function load()
    {
        return (new PageRenderer)->render('parts\load.phtml');
    }

    public function loadPost()
    {
        $request = $this->getRequest();
        /** @var UploadedFile $file */

        $file = $request->files->get('file');

        if ($file) {
            FileUploadModel::createFromUploadedFile($file);
            $moved = $file->move('upload');

            return new RedirectResponse('/parts/load');
        }

        throw new \Exception('file error');
    }

}
