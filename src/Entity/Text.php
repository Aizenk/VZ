<?php

namespace VZ\Entity;

use VZ\Lib\Orm\ActiveRecord;
use VZ\Lib\Orm\ActiveRecordInterface;

/**
 * Class Text
 * @package VZ\Entity
 * asd
 *
 * @property int $id
 * @property string $text
 * @property bool $is_active
 * @method  static $this findOneById($id)
 */
class Text extends ActiveRecord implements ActiveRecordInterface
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'texts';
    }

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

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * @param bool $is_active
     * @return Text
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
        return $this;
    }
}
