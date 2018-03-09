<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 18.02.2018
 * Time: 23:36
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class Subscribe extends Model
{
    public $email;

    public function rules()
    {
        return [
            [ ['email'], 'required'],
            [ ['email'], 'email'],
        ];
    }

    public function save() {

        $sql = "INSERT INTO {{subscriber}} (email) VALUES ('{$this->email}') ";

        return Yii::$app->db->createCommand($sql)->execute();

    }
}