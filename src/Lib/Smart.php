<?php

namespace Vz\Lib;

class Smart
{
    protected $data = array();
    protected $dataDiff = array();

    /**
     * @param array $data
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        if (isset($this->dataDiff[$name])) {
            return $this->dataDiff[$name];
        }

        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        return null;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->dataDiff[$name] = $value;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return !$this->data ? [] : $this->data;
    }

    /**
     * @return array
     */
    public function getDataDiff()
    {
        return $this->dataDiff;
    }

    /**
     * @param $aData
     * @return $this
     */
    public function setDataDiff($aData)
    {
        $this->dataDiff = $aData;
        return $this;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return array_merge($this->getData(), $this->getDataDiff());
    }

    /**
     * @return $this
     */
    public function flushDataDiff()
    {
        $this->dataDiff = array();
        return $this;
    }
}
