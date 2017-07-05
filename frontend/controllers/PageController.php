<?php

namespace frontend\controllers;

use \yii\web\Controller;
use common\models\Page;

class PageController extends Controller
{
    public function actionShow($slug)
    {
        $model = Page::find()->where(['slug'=>$slug])->one();


        //return $model->title;



        return $this->render('show', ['model' => $model,]);
    }
}
