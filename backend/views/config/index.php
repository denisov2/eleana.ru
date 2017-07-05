<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


//use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Настройки сайта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">


    <p>
        <?= Html::a('Добавить настройку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'val',
            'label',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
    <h3>Загрузить лого</h3></p>
    <p>
        <?php $form = ActiveForm::begin([
            'action' => ['config/upload-logo'],
            'options' => [
                'enctype' => 'multipart/form-data',
            ]
        ]) ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <button>Submit</button>
        <?php ActiveForm::end() ?>
    </p>
    <p>
    <h3>Текущее лого</h3></p>
    <p>
        <img src="<?= \Yii::$app->config->logo ?>" width="200px" height="auto"/>
    </p>
</div>
