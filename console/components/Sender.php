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

class Sender
{
    public static function run($subscribers, $news_list)
    {

        foreach ($subscribers as $subscriber) {
            $result = Yii::$app->mailer->compose('/mailer/newsList', [
                'news_list' => $news_list
            ])
                ->setFrom('nekarpeev@yandex.ru')
                ->setTo($subscriber['email'])
                ->setSubject('Тема сообщения')
                ->send();

            var_dump($result);
        }

        News::changeStatusAfterSend($news_list);

        return count($subscribers);
    }
}