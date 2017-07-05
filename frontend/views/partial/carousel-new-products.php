<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;

use dvizh\shop\models\Product;

use frontend\widgets\AddToCartBtn;
use frontend\widgets\BuyButton;
use frontend\widgets\DeleteButton;
use frontend\widgets\ChangeCount;
use frontend\widgets\ChangeOptions;
use dvizh\order\widgets\OneClick;

/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 25.04.2017
 * Time: 10:44
 */


?>
<div id="carousel2" class="carousel slide carousel-products" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="row">
                <?php

                $products = Product::find()->limit(3)->all();

                foreach ($products as $key => $product) {
                $images = $product->getImages();
                $image_html = isset($images[0]) ? '<img src="' . $images[0]->getUrl('174x') . '">' : '<img src="/img/tovar2.jpg">';
                $classes = $key % 3 == 0 ? "col-md-4" : "col-md-4 hidden-xs hidden-sm";
                ?>

                <div class=" <?=$classes?> ">
                    <div class="product">
                        <div class="product-head">
                            <p><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"> <?= $product->name ?></a></p>

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
                                <td>40%хб-60%пэ</td>
                            </tr>
                            <tr>
                                <td>Цвет:</td>
                                <td>Белый</td>
                            </tr>
                            <tr>
                                <td>Cтатус:</td>
                                <td>Под заказ <i class="fa fa-info-circle"
                                                 aria-hidden="true"></i></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="price-block clearfix">
                            <div class="old pull-left"><?= round ($product->price) ?> руб.</div>
                            <div class="new pull-right"><span class="big"><?= round ($product->price) ?></span> руб
                            </div>
                        </div>
                        <?= BuyButton::widget([
                            'model' => $product,
                            'text' => 'Заказать',
                            'htmlTag' => 'a',
                            'cssClass' => '  '
                        ]) ?>
                    </div>
                </div>
                <? } ?>

            </div>
        </div>
        <div class="item">
            <div class="row">
                <?php
                $products = Product::find()->limit(3)->offset(3)->all();;
                foreach ($products as $key => $product) {
                    $images = $product->getImages();
                    $image_html = isset($images[0]) ? '<img src="' . $images[0]->getUrl('174x') . '">' : '<img src="/img/tovar2.jpg">';
                    $classes = $key % 3 == 0 ? "col-md-4" : "col-md-4 hidden-xs hidden-sm";
                    ?>

                    <div class=" <?=$classes?> ">
                        <div class="product">
                            <div class="product-head">
                                <p><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"> <?= $product->name ?></a></p>

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
                                    <td>40%хб-60%пэ</td>
                                </tr>
                                <tr>
                                    <td>Цвет:</td>
                                    <td>Белый</td>
                                </tr>
                                <tr>
                                    <td>Cтатус:</td>
                                    <td>Под заказ <i class="fa fa-info-circle"
                                                     aria-hidden="true"></i></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="price-block clearfix">
                                <div class="old pull-left"><?= round ($product->price) ?> руб.</div>
                                <div class="new pull-right"><span class="big"><?= round ($product->price) ?></span> руб
                                </div>
                            </div>
                            <?= BuyButton::widget([
                                'model' => $product,
                                'text' => 'Заказать',
                                'htmlTag' => 'a',
                                'cssClass' => '  '
                            ]) ?>
                        </div>
                    </div>
                <? } ?>

            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel2" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right carousel-control" href="#carousel2" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>
</div>