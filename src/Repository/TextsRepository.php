<?php

namespace VZ\Repository;

use VZ\Entity\Text;
use VZ\Lib\Orm\ActiveRecord;

/**
 * Class TextsRepository
 * @package VZ\Repository
 * asd
 *
 * @method Text findOneById($id)
 */
class TextsRepository
{
    protected $table = 'texts';

    public static function getEntityClassName()
    {
        return Text::class;
    }

}