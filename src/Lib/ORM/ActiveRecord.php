<?php

namespace VZ\Lib\Orm;

use VZ\Lib\Smart;

/**
 * Class ActiveRecord
 * @package VZ\Lib\Orm
 * @method static tableName()
 */
abstract class ActiveRecord extends Smart
{
    public function isNewRecord()
    {
        return true;
    }

    public function save()
    {
        if ($this->isNewRecord()) {
            $this->insert($this->asArray());
        } else {
            $this->update($this->id, $this->asArray());
        }

        var_export('i want to save: ');
        var_export($this->getDataDiff());
    }

    public function insert($data)
    {

    }

    public function update($id, $data)
    {

    }

    public function delete($id)
    {

    }

    /**
     * @param $alias
     * @return Query
     */
    public static function createQueryBuilder($alias = 't')
    {
        return new Query(static::tableName(), $alias);
    }

    /**
     * @param $id
     * @return ActiveRecord
     */
    public static function findOneById($id)
    {
        $qb = self::createQueryBuilder();
        $qb->addCondition("t.id = {$id}");

        $data = static::findBySql($qb->getSQL());

        return new static(reset($data));
    }

    public static function findBySql($sql, $params = [])
    {
        $st = Dispatcher::instance()->getConnection()->executeQuery($sql);

        return $st->fetchAll();

    }

    public function params($params)
    {
        $this->params = $params;

        return $this;
    }

    protected static function findByCondition($condition)
    {
        $query = static::createQueryBuilder();

        foreach ($condition as $item) {
            $query->addCondition($item);
        }

        return static::findBySql($query->getSQL());
    }
}
