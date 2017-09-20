<?php

namespace VZ\Lib\Orm;

abstract class DatabaseEntity
{
    protected $data;

    public function asArray()
    {
        return $this->data;
    }

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;

    }

    public function __get($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }
}