<?php

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('VZ\\', __DIR__ . DIRECTORY_SEPARATOR . 'src');

$app = new Silex\Application();
$app['debug'] = true;

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

$app->run();
   