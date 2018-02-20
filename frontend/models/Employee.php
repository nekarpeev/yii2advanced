<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 18.02.2018
 * Time: 20:39
 */

namespace frontend\models;

use yii\base\Model;

class Employee extends Model
{
    const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
    const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

    public $first_name;
    public $last_name;
    public $middle_name;
    public $salary;
    public $email;

    public function scenarios()
    {
        return [
            self::SCENARIO_EMPLOYEE_REGISTER => ['first_name', 'last_name', 'middle_name', 'email'],
            self::SCENARIO_EMPLOYEE_UPDATE => ['first_name', 'last_name', 'middle_name']
        ];
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email'], 'required'],
            [['first_name'], 'string', 'min' => 2],
            [['last_name'], 'string', 'min' => 3],
            [['email'], 'email'],

            [['middle_name'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE]//Обязательно поля только для сценария SCENARIO_EMPLOYEE_UPDATE
        ];
    }

    public function save() {
        return true;
    }
}