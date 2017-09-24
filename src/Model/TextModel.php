<?php

namespace VZ\Model;

use VZ\Entity\Text;

class TextModel
{
    public static function create($text, $active = true)
    {
        $rec = new Text();
        $rec
            ->setText($text)
            ->setIsActive($active);

        return $rec->save();
    }
}