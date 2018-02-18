<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 17.02.2018
 * Time: 23:59
 */

namespace console\controllers;

use console\components\SenderEmployee;
use console\models\Employee;
use yii\console\Controller;

class MailerEmployeeController extends Controller
{
    public function actionSend()
    {
        $current_date = date('d.m.Y');
        $employees = Employee::getDataForSalaryEmail();

        $count = SenderEmployee::run($employees, $current_date);

        $text = '- Рассылка от ' . $current_date . ' произошла успешно';
        $fp = fopen("D:/ospanel/domains/yii2advanced/console/employeesSend.txt", "a");

        fwrite($fp, $text . ';' . "\n");
        fclose($fp);

    }
}