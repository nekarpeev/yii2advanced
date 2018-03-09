<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.02.2018
 * Time: 22:22
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test;


class TestController extends Controller
{

    public function actionIndex()
    {
        $limit = Yii::$app->params['maxNewsInList'];

        $list = Test::getNewsList($limit);
        return $this->render('index', [
            'list' => $list
        ]);
    }

    public function actionView($id)
    {

        $item = Test::getItem($id);

        return $this->render('view', [
            'item' => $item,
        ]);
    }

}