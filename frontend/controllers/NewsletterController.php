<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 18.02.2018
 * Time: 23:35
 */

namespace frontend\controllers;

use Yii;
use frontend\models\Subscribe;
use yii\web\Controller;

class NewsletterController extends Controller
{
    public function actionSubscribe() {

        $model = new Subscribe();
        $formData = Yii::$app->request->post();

        if(Yii::$app->request->isPost) {

            $model->email = $formData['email'];
            if( $model->validate() && $model->save() ) {
                Yii::$app->session->setFlash('success', 'subscribe complete!');
            }


        }

        return $this->render('subscribe',
            ['model' => $model]
        );
    }
}