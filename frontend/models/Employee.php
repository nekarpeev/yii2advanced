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
    public $first_name;
    public $last_name;
    public $middle_name;
    public $salary;

}