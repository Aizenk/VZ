<?php

namespace VZ\Lib\Orm;

class Query
{
    public $source;
    public $alias;
    public $selectsFields = [];
    public $from;
    public $groupBy = [];
    public $joins = [];
    public $conditions = [];
    public $params = [];


    public function __construct($source, $alias = 't')
    {
        $this->source = $source;
        $this->alias = $alias;
        $this->selectsFields = ["$alias.*"];
    }

    public function setSelectFields(array $selects)
    {
        $this->selectsFields = [];

        foreach ($selects as $select => $alias) {
            if (is_numeric($select)) {
                $expr = $alias;
            } else {
                $expr = "{$select} as {$alias}";
            }

            $this->addSelectField($expr);
        }

        return $this;
    }

    public function addSelectField($select)
    {
        $this->selectsFields[] = $select;

        return $this;
    }

    public function addCondition($condition)
    {
        $this->conditions[] = $condition;
        return $this;
    }

    public function addJoin($join)
    {
        $this->joins[] = $join;
        return $this;
    }

    public function getSQL()
    {
        return $this->buildQuery();
    }

    private function getJoinExpression()
    {
        return '';
    }

    private function getWhereExpression()
    {
        $str = '';

        foreach ($this->conditions as $num => $condition) {
            if (0 === $num) {
                $str .= 'WHERE ' . $condition;
                continue;
            }

            $str .= 'AND ' . $condition;
        }

        return $str;
    }

    private function getSelectExpression()
    {
        return implode(', ', $this->selectsFields);
    }

    private function buildQuery()
    {
        return sprintf(
            "SELECT %s %s FROM %s %s %s",
            $this->getSelectExpression(),
            $this->getJoinExpression(),
            $this->source,
            $this->alias,
            $this->getWhereExpression()
        );
    }

}