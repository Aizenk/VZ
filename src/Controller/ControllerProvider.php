<?php

namespace VZ\Controller;

use Silex\Application;

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

    private function cntr(Application $app)
    {

        $app->get('/blog', function () {
            $output = '';
            $blogPosts = array(
                1 => array(
                    'date' => '2011-03-29',
                    'author' => 'igorw',
                    'title' => 'Using Silex',
                    'body' => '...',
                ),
            );

            foreach ($blogPosts as $post) {
                $output .= $post['title'];
                $output .= '<br />';
            }

            return $output;
        });
    }

}