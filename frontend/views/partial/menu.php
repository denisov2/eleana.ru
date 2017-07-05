<?php

use yii\helpers\Html;
use yii\helpers\Url;
use dvizh\shop\models\Category;


$pages = \common\models\Page::findAll([9, 5 ,7  ,8 , 13 , 11]);


?>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
        <?php  foreach ($pages as $page ) {
            $rote = \Yii::$app->controller->route;
            $slug = \Yii::$app->request->getQueryParam('slug');
            $class = $rote == 'page/show' && $slug == $page->slug ? ' class="active" ' : '';

            ?>


<!--            <li class="active"><a href="<?= Url::to(['/page/show', 'slug' => 'new']) ?>">О компании</a>        </li> -->



            <li <?= $class ?> ><a href="<?= Url::to(['/page/show', 'slug' => $page->slug]) ?>"><?= $page->title ?></a></li>

        <?php } ?>
        <li><a class="border-none" href="<?= Url::to(['/page/show', 'slug' => 'contacts']) ?>">Контакты</a>
        </li>
        <li class="hidden-xs hidden-sm">
            <a class="ask-question" data-toggle="modal" href="#ask"><button class="btn border-none">Задать вопрос</button></a>
        </li>
    </ul>
    <div class="line"></div>
    <ul class="nav navbar-nav visible-xs visible-sm">
        <li class="footer-link"><a href="#">Портфолио</a></li>
        <li><a class="footer-link" href="#">Авторское право</a></li>
        <li><a class="footer-link" href="#">Условия возврата</a></li>
        <li><a class="footer-link border-none" href="#">Дополнительная информация</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
        <li><a href="#">RU</a></li>
        <li><a href="https://translate.google.com/translate?hl=en&sl=ru&tl=en&u=<?=Url::to('', true );?>">EN</a></li>
    </ul>
</div>
<!-- /.navbar-collapse -->