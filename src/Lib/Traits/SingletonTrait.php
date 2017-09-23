<?php

namespace VZ\Lib\Traits;

trait SingletonTrait
{
    private function __construct()
    {
    }

    public static function instance()
    {
        return new static;
    }
}