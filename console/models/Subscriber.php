<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2018
 * Time: 19:48
 */

namespace console\models;

use Yii;

class Subscriber
{
    public static function getList()
    {

        $sql = 'SELECT * FROM `subscriber`';
        return Yii::$app->db->createCommand($sql)->queryAll();

    }
}