<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 02.03.2017
 * Time: 18:07
 */

namespace backend\controllers;

class MenuController extends \yii\web\Controller {
    public function actionIndex()
    {
        return $this->render('index');
    }
}