<?php

namespace VZ\Entity;

use VZ\Lib\Orm\DatabaseEntity;

/**
 * Class Text
 * @package VZ\Entity
 * asd
 *
 * @property int $id
 * @property string $text
 */
class Text extends DatabaseEntity
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Text
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Text
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

}