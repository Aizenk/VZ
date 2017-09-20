<?php

namespace VZ\Repository;

use VZ\Entity\Text;
use VZ\Lib\Orm\DatabaseRepository;

class TextsRepository extends DatabaseRepository
{
    protected $table = 'texts';

    public static function getEntityClassName()
    {
        return Text::class;
    }

}