<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 18.02.2018
 * Time: 20:39
 */

namespace frontend\models;

use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;

class Employee extends Model
{
    const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
    const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

    public $first_name;
    public $last_name;
    public $middle_name;
    public $born;
    public $city;
    public $start_date;
    public $position;
    public $id_code;
    public $email;


    public function scenarios()
    {
        return [
            self::SCENARIO_EMPLOYEE_REGISTER => ['first_name', 'last_name', 'middle_name', 'born', 'city', 'start_date', 'position', 'id_code', 'email'],
            self::SCENARIO_EMPLOYEE_UPDATE => ['first_name', 'last_name', 'middle_name']
        ];
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'position', 'id_code', 'start_date', 'email'], 'required'],
            [['first_name'], 'string', 'min' => 2],
            [['last_name'], 'string', 'min' => 3],
            [['email'], 'email'],

            [['middle_name'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE],//Обязательно поля только для сценария SCENARIO_EMPLOYEE_UPDATE

            //New
            [['position', 'id_code', 'start_date'], 'required', 'on' => self::SCENARIO_EMPLOYEE_REGISTER],
            [['city'], 'integer'],
            [['position'], 'string'],
            [['born', 'start_date'], 'date', 'format' => 'php:Y-m-d'],
            [['id_code'], 'string', 'min' => 10],



        ];
    }

    public function save() {
        return true;
    }

    public function getCitiesList() {
        $sql = 'SELECT * FROM {{city}}';
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($result, 'id', 'name');
    }
}