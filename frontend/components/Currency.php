<?php
/**
 * Created by PhpStorm.
 * User: margo
 * Date: 05.03.2017
 * Time: 20:09
 */

namespace frontend\components;

use yii\base\Component;

class Currency extends Component{

    public function getPriceCurrency($price){

        $language = \Yii::$app->language;
        $currencies = \Yii::$app->params['currency'];

        if (array_key_exists($language, $currencies)) {
            // для данного языка есть валюта
            return  [
                'price' => round ( $price * \Yii::$app->params['currency'][$language]['rate'] , 2),
                'name' => \Yii::$app->params['currency'][$language]['name']
            ];

        }
        else {
            // валюты не нашли, возвращаем то что для языка по умолчанию
            return  [
                'price' => $price,
                'name' => \Yii::$app->params['currency']['ru']['name']
            ];

        }

    }


}
?>