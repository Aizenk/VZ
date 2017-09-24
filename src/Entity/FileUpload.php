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
 * @property string $file_name
 * @property string $original_file_name
 * @property string $created
 * @property int $size
 * @method  static $this findOneById($id)
 */
class FileUpload extends ActiveRecord implements ActiveRecordInterface
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'file_uploads';
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name
     * @return FileUpload
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $created
     * @return FileUpload
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalFileName()
    {
        return $this->original_file_name;
    }

    /**
     * @param string $original_file_name
     * @return FileUpload
     */
    public function setOriginalFileName($original_file_name)
    {
        $this->original_file_name = $original_file_name;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return FileUpload
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

}
