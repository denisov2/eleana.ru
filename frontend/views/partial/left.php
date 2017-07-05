<?php

use yii\helpers\Html;
use yii\helpers\Url;
use dvizh\shop\models\Category;


$categories = Category::find( [] )->all();


?>


<div class="col-md-2 aside hidden-xs hidden-sm">
    <ul class="list-unstyled aside-menu">
        <li>
            <a class="collapse-link" role="button" data-toggle="collapse" href="#menu1" aria-expanded="true"
               aria-controls="collapseExample">
                КАТАЛОГ
            </a>
            <div class="collapse in" id="menu1">
                <ul>
            <?php
                if ($categories) :
                    foreach($categories as $category) :
                        if ( $category->parent_id ) continue;
                         if( Yii::$app->controller->route == 'catalog/list' && Yii::$app->request->get('id') == $category->id )  $active = "active";
                         else $active = "";
                        ?>

                        <li class="<?=$active?>"><a href="<?=Url::to(['/catalog/list', 'id'=>$category->id]) ?>"><?= $category->name ?></a></li>

            <?php
                endforeach;
            endif;

            ?>
                </ul>
            </div>
        </li>
        <li><a href="<?=Url::to(['/page/show', 'slug'=>'new']) ?>" class="collapse-link">НОВИНКИ</a></li>
        <li><a href="<?=Url::to(['/page/show', 'slug'=>'sale']) ?>" class="collapse-link">АКЦИИ</a></li>
        <li>
            <a class="collapse-link" role="button" _data-toggle="collapse" href="<?=Url::to(['/page/show', 'slug'=>'tables']) ?>"
               aria-expanded="false" aria-controls="collapseExample">
                РАЗМЕРНЫЕ ТАБЛИЦЫ <i class="fa fa-angle-down"></i>
            </a>

            <div class="collapse" id="menu2">
                <ul>
                    <li><a href="#">Униформа</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a class="collapse-link clearfix" role="button" _data-toggle="collapse" href="<?=Url::to(['/page/show', 'slug'=>'prices']) ?>"
               aria-expanded="false" aria-controls="collapseExample">
                ФОТО-ПРАЙСЫ <i class="fa fa-angle-down"></i>
            </a>

            <div class="collapse" id="menu3">
                <ul>
                    <li><a href="#">Униформа</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="widget hidden-sm hidden-xs">
        <div class="img-block">
            <img class="img-responsive" src="/img/widget.jpg" alt="Foto">
        </div>
        <div class="widgrt-name">Фото-студиЯ</div>
        <div class="line"></div>
        <p>Tota accusata mel an. Vel viris mollis id. Cetero maiorum officiis est ne, mei an minimum
            tractatos, omnium ocurreret vix ei.</p>
    </div>
    <div class="widget hidden-sm hidden-xs">
        <div class="img-block">
            <img class="img-responsive" src="/img/widget.jpg" alt="Foto">
        </div>
        <div class="widgrt-name">ДИЗАЙН-студиЯ</div>
        <div class="line"></div>
        <p>Tota accusata mel an. Vel viris mollis id. Cetero maiorum officiis est ne, mei an minimum
            tractatos, omnium ocurreret vix ei. </p>
    </div>
</div>
