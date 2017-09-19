<?php

namespace VZ\Controller;

use Silex\Application;
use VZ\Lib\Core\AbstractController;

class ControllerProvider
{
    public static function registerAllControllers(Application $app)
    {
        foreach (static::getControllers() as $controllerName) {
            /** @var $controller AbstractController */
            $controller = new $controllerName;
            $controller->registerRoutes($app);
        }
    }

    private static function getControllers()
    {
        return [
            MainController::class,
            SettingsController::class,
        ];
    }
}
