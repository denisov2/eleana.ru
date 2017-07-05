<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model common\models\LoginForm */

$this->title = $model->title;
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU',  ['position' => \yii\web\View::POS_END]);

$js = <<<JS
var myMap;

// Дождёмся загрузки API и готовности DOM.


ymaps.ready(init);

function init () {
	myMap = new ymaps.Map('map', {
		center: [55.76, 37.64], // Москва
		zoom: 10
	}, {
		searchControlProvider: 'yandex#search'
	});

};
JS;
$this->registerJs($js, \yii\web\View::POS_READY  );
?>


<?= $this->renderFile('@frontend/views/partial/left.php'); ?>


<div class="col-md-10 main-content">
    <div class="contacts-page">
        <!-- breadcrumb begin -->
        <ol class="breadcrumb text-left">
            <li><a href="index.html">Главная</a></li>
            <li class="active"><i class="fa fa-angle-double-right"></i>Контакты</li>
        </ol>
        <!-- breadcrumb end -->
        <div class="row">


            <?= $model->content ?>


        </div>
    </div>
</div>