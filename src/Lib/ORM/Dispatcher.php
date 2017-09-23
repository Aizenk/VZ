<?php

namespace VZ\Lib\Orm;

use VZ\Lib\Core\VZ;

class Dispatcher
{
    private function __construct()
    {
    }

    public static function instance()
    {
        return new static;
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getConnection()
    {
        return VZ::instance()->getDbConnection();
    }
}