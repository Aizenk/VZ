<?php

namespace VZ\Lib\Render;

class PageRenderer
{
    const TPL_DIR = 'src' . DIRECTORY_SEPARATOR . 'Views';

    public function render($template, $data = [], $layout = null)
    {
        $handle = fopen(static::TPL_DIR . DIRECTORY_SEPARATOR . $template, 'r');
        $data = fread($handle, 1000);

        return $data;
    }
}