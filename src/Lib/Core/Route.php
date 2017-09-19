<?php

namespace VZ\Lib\Core;

use Silex\Application;

class Route
{
    private $route;
    private $method;
    private $callback;

    /**
     * Route constructor.
     * @param $route
     * @param $method
     * @param $callbackName
     */
    public function __construct($route, $method, $callbackName)
    {
        $this->route = $route;
        $this->method = $method;
        $this->callback = $callbackName;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getCallback()
    {
        return $this->callback;
    }

}
