<?php

namespace VZ\Lib\Core;


use Silex\Application;

abstract class AbstractController
{
    protected $routes = [];

    /**
     * @return Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    protected function getRequest()
    {
        return VZ::instance()->getRequest();
    }

    protected function addGetRoute($url, $methodName)
    {
        $this->addRoute('get', $url, $methodName);
    }

    protected function addPostRoute($url, $methodName)
    {
        $this->addRoute('post', $url, $methodName);
    }

    protected function addRoute($method, $url, $methodName)
    {
        $this->routes[] = new Route($url, $method, [$this, $methodName]);
    }

    public function registerRoutes(Application $app)
    {
        foreach ($this->getRoutes() as $route) {
            if ($route->getMethod() === 'get') {
                $app->get($route->getUrl(), $route->getCallback());
            } else {
                $app->post($route->getUrl(), $route->getCallback());
            }
        }
    }
}