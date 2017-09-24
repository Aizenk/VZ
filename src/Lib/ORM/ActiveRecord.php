<?php

namespace VZ\Lib\Orm;

use VZ\Lib\Smart;
use VZ\Lib\Utilities\ArrayHelper;

/**
 * Class ActiveRecord
 * @package VZ\Lib\Orm
 * @method static tableName()
 */
abstract class ActiveRecord extends Smart
{
    public function isNewRecord()
    {
        return empty($this->id);
    }

    public function save()
    {
        var_export('i want to save: ');
        var_export($this->getDataDiff());

        if ($this->isNewRecord()) {
            return $this->insert($this->asArray());
        } else {
            return $this->update($this->id, $this->getDataDiff());
        }
    }

    public function insert($data)
    {
        if (!ArrayHelper::isAssociative($data, true)) {
            throw new \LogicException('not associative');
        }

        $placeHolders = array_map(
            function ($val) {
                return ':' . $val;
            },
            array_keys($data)
        );

        $keysExpression = implode(', ', array_keys($data));
        $valuesExpression = implode(', ', $placeHolders);
        $tpl = "INSERT INTO %s (%s) VALUES (%s)";
        $sql = sprintf($tpl, static::tableName(), $keysExpression, $valuesExpression);
        $st = Dispatcher::instance()->getConnection()->prepare($sql);
        $mock = new Smart($data);

        foreach ($data as $paramName => $value) {
            $st->bindParam($paramName, $mock->$paramName);
        }

        $st->execute();

        return $st->rowCount();
    }

    public function update($id, $data)
    {
        $setExpressions = [];

        foreach ($data as $field => $value) {
            if (is_bool($value)) {
                $value = ($value === true) ? 'TRUE' : 'FALSE';
            } else if (is_string($value)) {
                $value = "'" . $value . "'";
            }

            $setExpressions[] = "{$field} = {$value}";
        }
        $setExpression = implode(', ', $setExpressions);
        $preg = "UPDATE %s SET %s WHERE id={$id}";
        $sql = sprintf($preg, static::tableName(), $setExpression);

        echo($sql);
        return Dispatcher::instance()->getConnection()->exec($sql);

    }

    public function delete($id)
    {

    }

    /**
     * @param $alias
     * @return Query
     */
    public
    static function createQueryBuilder($alias = 't')
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

    /**
     * @param array $data
     * @return ActiveRecord
     */
    public static function findOneByFields(array $data)
    {
        if (!ArrayHelper::isAssociative($data)) {
            throw new \LogicException('not associative');
        }

        $qb = self::createQueryBuilder();
        foreach ($data as $paramName => $value) {
            $qb->addCondition("t.{$paramName} = {$value}");
        }

        $data = static::findBySql($qb->getSQL());

        if ($data) {
            return new static(reset($data));
        }

        return null;
    }

    /**
     * @param array $data
     * @return ActiveRecord[]
     */
    public static function findByFields(array $data)
    {
        if (!ArrayHelper::isAssociative($data)) {
            throw new \LogicException('not associative');
        }

        $qb = self::createQueryBuilder();
        foreach ($data as $paramName => $value) {
            $qb->addCondition("t.{$paramName} = {$value}");
        }

        $data = static::findBySql($qb->getSQL());

        if ($data) {
            return static::populate($data);
        }

        return null;
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

    private static function populate($data)
    {
        return array_map(
            function ($val) {
                return new static($val);
            },
            $data
        );
    }
}
