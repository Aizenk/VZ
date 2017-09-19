<?php

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('VZ\\', __DIR__ . DIRECTORY_SEPARATOR . 'src');

\VZ\Lib\Core\VZ::instance()->run();