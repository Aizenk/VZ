<?php

namespace VZ\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use VZ\Entity\FileUpload;
use VZ\Lib\Orm\ActiveRecord;

class FileUploadModel extends ActiveRecord
{
    public static function createFromUploadedFile(UploadedFile $file)
    {
        $rec = new FileUpload();

        return $rec
            ->setOriginalFileName($file->getClientOriginalName())
            ->setFileName($file->getFilename())
            ->setSize($file->getSize())
            ->save();
    }
}
