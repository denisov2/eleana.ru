<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;

use frontend\widgets\AddToCartBtn;
use frontend\widgets\BuyButton;
use frontend\widgets\DeleteButton;
use frontend\widgets\ChangeCount;
use frontend\widgets\ChangeOptions;

use pistol88\order\widgets\OneClick;

/* @var $this yii\web\View */
/* @var $sort yii\data\Sort */
/* @var $product pistol88\shop\models\Product */
$title = $category === null ? 'Каталог' : $category->name;
$this->title = Html::encode($title);
?>

<?= $this->renderFile('@frontend/views/partial/left.php'); ?>

<div class="col-md-10 main-content">
    <div class="content catalog">
        <h1 class="text-left"><?= Html::encode($title) ?></h1>

        <?= $this->renderFile('@frontend/views/partial/filter.php'); ?>

        <?= $this->renderFile('@frontend/views/partial/sort.php'); ?>





        <?php


        foreach ($products as $key => $product) {

            $images = $product->getImages();
            $image_html = isset($images[0]) ? '<img src="' . $images[0]->getUrl('174x') . '">' : '<img src="/img/tovar2.jpg">';
            $classes = $key % 3 == 0 ? "col-md-4 clear-fix" : "col-md-4 hidden-xs hidden-sm";
            //$classes = $key % 3 == 2 ? $classes . " clearfix" : $classes;

            ?>

            <div class="<?= $classes ?>">
                <div class="product">
                    <div class="product-head">
                        <p><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"> <?= $product->name ?></a>
                        </p>

                        <div class="product-name text-red text-uppercase"><?= $product->getField('collection'); ?></div>
                        <div class="code text-center pull-right">
                            Код товара:
                            <span><?= $product->getField('sku'); ?></span>
                        </div>
                    </div>
                    <div class="product-img">
                        <?= $image_html ?>
                    </div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Артикул:</td>
                            <td><?= $product->getField('sku'); ?></td>
                        </tr>
                        <tr>
                            <td>Состав:</td>
                            <td><?=implode(', ', $product->getOption(4));?></td>
                        </tr>
                        <tr>
                            <td>Цвет:</td>
                            <td>Белый</td>
                        </tr>
                        <tr>
                            <td>Cтатус:</td>
                            <td>Под заказ <i class="fa fa-info-circle" aria-hidden="true"></i></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="price-block clearfix">
                        <div class="old pull-left"><?= round($product->price) ?> руб.</div>
                        <div class="new pull-right"><span class="big"><?= round($product->price) ?></span> руб</div>
                    </div>
                    <?php // AddToCartBtn::widget(['product_id' => $product->id, 'options' => ['class' => 'add_cart', 'type' => 'button']]) ?>
                    <?= BuyButton::widget([
                        'model' => $product,
                        'text' => 'Заказать',
                        'htmlTag' => 'a',
                        'cssClass' => '  '
                    ]) ?>
                    <? //ChangeCount::widget(['model' => $product]);?>
                    <? //DeleteButton::widget(['model' => $product]);?>
                    <? // OneClick::widget(['model' => $product]);?>

                </div>
            </div>


        <?php } ?>

        <div class="row hidden-xs">
            <div class="col-xs-12">


                <?= \yii\widgets\LinkPager::widget([
                    'pagination' => $pages,
                    'prevPageLabel' => '&lt; Предыдущая',
                    'nextPageLabel' => 'Следующая &gt;',
                   // 'disableCurrentPageButton' => true


                ]) ?>

                <div class="row"> 
                    Сортировка: <?= $sort->link('shop_price.price', ['label'=>'По цене']) ." | ".$sort->link('name', ['label'=>'По алфавиту'])  ?>
                </div>

            </div>
        </div>
    </div>
</div>




