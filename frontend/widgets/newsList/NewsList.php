<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 21.02.2018
 * Time: 1:12
 */

namespace frontend\widgets\newsList;

use Yii;
use yii\base\Widget;
use frontend\models\Test;

class NewsList extends Widget
{
    public $showLimit = null;

    public function run() {

        $limit = Yii::$app->params['maxNewsInList'];
        if($this->showLimit) {
            $limit = $this->showLimit;
        }

        $list = Test::getNewsList($limit);
        return $this->render('newsBlock', [
            'list' => $list
        ]);
    }
}