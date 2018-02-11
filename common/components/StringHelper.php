<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10.02.2018
 * Time: 22:51
 */

namespace common\components;

use Yii;

class StringHelper
{
    private $limit;

    public function __construct()
    {
        $this->limit = Yii::$app->params['shortTextLimit'];
    }

    /**
     * @param string $string
     * @param null $limit
     * @return string
     */
    public function getShort(string $string, $limit = null)
    {
        if($limit === null) {
            $limit = $this->limit;
        }

        return substr($string, 0, $limit);
    }
}