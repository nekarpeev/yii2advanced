<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 18.02.2018
 * Time: 20:39
 */

namespace frontend\controllers;

use Yii;
use frontend\models\Employee;
use yii\web\Controller;
use frontend\models\example\Human;
use frontend\models\example\Animal;

class EmployeeController extends Controller
{
    public function actionIndex() {

        $employee1 = new Employee();
        $employee1->first_name = 'Nikita';
        $employee1->last_name = 'Karpeev';
        $employee1->middle_name = 'Evgen';
        $employee1->salary = 40000;

        print_r($employee1->getAttributes());
    }

    public function actionTest() {

        $human1 = new Human();
        $animal1 = new Animal();

        $human1->walk();
        echo '<br>';
        $animal1->walk();

    }

    public function actionRegister() {

        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_REGISTER;
        $formData = Yii::$app->request->post();

        if( Yii::$app->request->isPost) {

            $model->attributes = $formData;

            if( $model->validate() && $model->save() ) {
                Yii::$app->session->setFlash('success', 'Registered!');
            }
        }

        return $this->render('register.php', [
         'model' => $model
        ]);
    }

        public function actionUpdate() {

            $model = new Employee();
            $model->scenario = Employee::SCENARIO_EMPLOYEE_UPDATE;
            $formData = Yii::$app->request->post();

            if( Yii::$app->request->isPost) {

                $model->attributes = $formData;

                if( $model->validate() && $model->save() ) {
                    Yii::$app->session->setFlash('success', 'Data updated!');
                }
            }

        return $this->render('update.php' , [
            'model' => $model
        ]);
    }

}