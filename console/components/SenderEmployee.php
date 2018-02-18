<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2018
 * Time: 21:06
 */

namespace console\components;

use Yii;
use console\models\News;

class SenderEmployee
{

    public static function run(array $employees, $current_date)
    {

        foreach ($employees as $employee) {
            $result = Yii::$app->mailer->compose('/mailer/employee', [
                'employee' => $employee, 'current_date' => $current_date
            ])
                ->setFrom('nekarpeev@yandex.ru')
                ->setTo($employee['email'])
                ->setSubject('Начисление заработной платы')
                ->send();

            var_dump($result);
        }

        return count($employees);
    }
}