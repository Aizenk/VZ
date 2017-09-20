<?php

namespace VZ\Lib\Orm;

use VZ\Lib\Core\VZ;
use VZ\Lib\Exceptions\OverrideException;

abstract class DatabaseRepository
{
    protected $entityClass;
    protected $table;

    private function __construct()
    {
    }

    public static function instance()
    {
        return new static;
    }

    /**
     * @return string
     */
    public static function getEntityClassName()
    {
        throw new OverrideException();
    }

    public function findOneById($id)
    {
        $sb = new SearchBuilder($this->table);
        $sb->addCondition(sprintf("t.id = %d", $id));

        $st = VZ::instance()->getDbConnection()->executeQuery($sb->getSQL());
        $val = $st->fetchAll();
        $className = (static::getEntityClassName());

        return new $className($val);
    }

}