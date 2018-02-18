<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 18.02.2018
 * Time: 0:21
 */

namespace console\models;

use Yii;


class Employee
{
    public static function getDataForSalaryEmail() {

        $sql ='SELECT name, last_name, salary, email FROM `employee`';

        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}