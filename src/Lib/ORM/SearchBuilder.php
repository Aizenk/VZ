<?php

namespace VZ\Lib\Orm;

class SearchBuilder
{
    private $source;
    private $alias;
    private $conditions;
    private $select = '*';
    private $joins;

    public function __construct($source, $alias = 't')
    {
        $this->source = $source;
        $this->alias = $alias;
    }

    public function addCondition($condition)
    {
        $this->conditions[] = $condition;
    }

    public function addJoin($join)
    {
        $this->joins[] = $join;
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

    private function buildQuery()
    {
        return sprintf(
            "SELECT %s %s FROM %s %s %s",
            $this->select,
            $this->getJoinExpression(),
            $this->source,
            $this->alias,
            $this->getWhereExpression()
        );
    }


}