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

class SenderSub
{
    public static function run(array $subscribers, array $news_list)
    {

        foreach ($subscribers as $subscriber) {
            $result = Yii::$app->mailer->compose('/mailer/newsList', [
                'news_list' => $news_list
            ])
                ->setFrom('nekarpeev@yandex.ru')
                ->setTo($subscriber['email'])
                ->setSubject('Рассылка новостей')
                ->send();

            var_dump($result);
        }

        News::changeStatusAfterSend($news_list);

        return count($subscribers);
    }
}