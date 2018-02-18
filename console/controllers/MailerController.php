<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2018
 * Time: 18:41
 */

namespace console\controllers;

use console\components\SenderSub;
use console\models\News;
use console\models\Subscriber;
use yii\console\Controller;

class MailerController extends Controller
{
    public function actionSend()
    {
        $news_list = News::getList();
        $subscribers = Subscriber::getList();

        $count = SenderSub::run($subscribers, $news_list);

        Console::output("\nEmails sent: {$count}");

    }
}