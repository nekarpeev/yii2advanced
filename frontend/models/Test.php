<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.02.2018
 * Time: 22:32
 */

namespace frontend\models;

use Yii;


class Test
{
    /**
     * @param integer $limit
     * @return array
     * @throws \yii\db\Exception
     */
    public static function getNewsList($limit)
    {
        $limit = intval($limit);
        $sql = 'SELECT * FROM news LIMIT ' . $limit;
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        if (!empty($result) && is_array($result)) {

            foreach ($result as &$item) {
                $item['content'] = Yii::$app->stringHelper->getShort($item['content']);
            }
        }

        return $result;
    }

    /**
     * @param integer $id
     * @return array|false
     * @throws \yii\db\Exception
     */
    public static function getItem($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM news WHERE id = $id";
        $result = Yii::$app->db->createCommand($sql)->queryOne();

        return $result;

    }
}