<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2018
 * Time: 18:28
 */

namespace console\models;

use Yii;

class News
{
    const STATUS_NOT_SEND = 1;

    public static function getList()
    {
        $sql = 'SELECT * FROM `news` WHERE `status` = ' . self::STATUS_NOT_SEND;
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return self::prepareList($result);
    }

    public static function prepareList($result)
    {
        if (!empty($result) && is_array($result)) {

            foreach ($result as &$item) {
                $item['content'] = Yii::$app->stringHelper->getShort($item['content']);
            }
        }

        return $result;

    }

    public static function changeStatusAfterSend($news_list)
    {


        foreach ($news_list as $news) {

            Yii::$app->db->createCommand()->update('news', array(
                'status' => 2
            ), 'id = :id', array(':id' => $news['id'])
            );

        }
    }
}