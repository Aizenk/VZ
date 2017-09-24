<?php

namespace VZ\Lib\Render;

class PageRenderer
{
    const TPL_DIR = 'src' . DIRECTORY_SEPARATOR . 'Views';

    public function render($template, $data = [], $layout = 'common.phtml')
    {
        include(static::TPL_DIR . DIRECTORY_SEPARATOR . $layout);
        include(static::TPL_DIR . DIRECTORY_SEPARATOR . $template);
        include(static::TPL_DIR . DIRECTORY_SEPARATOR . 'footer.phtml');

        return ' ';
    }
}