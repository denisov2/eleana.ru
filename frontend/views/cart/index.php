<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$cartCollection = Yii::$app->cart->getCollection();
$total_sum = Yii::$app->cart->getTotalSum();


$this->title = 'Eleana.ru - Корзина(' . count($cartCollection) . ') - ' . $total_sum . ' р.';

?>

<?= $this->renderFile('@frontend/views/partial/left.php'); ?>

<div class="col-md-10 main-content">
    <div class="constructor-page">
        <!-- breadcrumb begin -->
        <ol class="breadcrumb text-left">
            <li><a href="index.html">Главная</a></li>
            <li class="active"><i class="fa fa-angle-double-right"></i>Корзина</li>
        </ol>
        <!-- breadcrumb end -->

        <!-- cart begin -->
        <? if ($cartCollection): ?>
        <div class="basket clearfix">
            <div class="basket-btn">
                <a  href="<?= Url::to(['/catalog/list']) ?>"class="btn con-shop"> Продолжить покупки </a>&nbsp;&nbsp;
                <a  href="<?= Url::to(['/cart/clear']) ?>"class="btn con-shop"> Очистить корзину</a>
                <a  href="<?= Url::to(['/cart/confirm']) ?>" class="btn contents-btn"> Оформить заказ </a>
                <br><br>
            </div>

            <!-- order begin -->
            <div class="order clearfix">

                    <? foreach ($cartCollection as $item): ?>
                        <div class="order-main clearfix">
                            <div class="order-img pull-left">
                                <?= Html::img($item->getPreview()) ?>
                            </div>
                            <div class="order-des pull-right">
                                <div class="order__title order__name">
                                    <a href="<?= Url::to(['/product/view', 'id' => $item->id]) ?>" target="_blank">
                                        <?= $item->title ?>
                                        <span><?= $item->model ?></span>
                                    </a>
                                    <a href="<?= Url::to(['cart/delete', 'product_id' => $item->id]) ?>" class="order-close"></a>
                                </div>
                                <div class="order-text clearfix">
                                    <div class="description pull-left">
                                        <ul>
                                            <li>Артикул: <span<?= $item->sku ?></span></li>
                                            <li>Состав: <span>40%хб-60%пэ</span></li>
                                            <li>Цвет: <span>черн/крас</span></li>
                                            <li>Статус: <span>под заказ</span></li>
                                            <li>Рост: <span>164</span></li>
                                            <li>Размер: <span>44</span></li>
                                            <li>Длина: <span>65 см.</span></li>
                                            <li>Ширина: <span>70 см.</span></li>
                                        </ul>
                                    </div>
                                    <div class="order-quantity pull-left">
                                        <div class="wrapper">
                                            <span class="quantity-text">Количество</span>

                                            <div class="quantity-item">
                                                <select class="selectpicker" title="1 шт.">
                                                    <option>1 шт.</option>
                                                    <option>2 шт.</option>
                                                    <option>3 шт.</option>
                                                    <option>4 шт.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-price pull-right">Итого: <?= round( $item->price )?> р.</div>
                                </div>
                            </div>
                        </div>
                    <? endforeach; ?>


            </div>
            <div class="basket-btn">
                <a  href="<?= Url::to(['/catalog/list']) ?>"class="btn con-shop"> Продолжить покупки </a>&nbsp;&nbsp;
                <a  href="<?= Url::to(['/cart/clear']) ?>"class="btn con-shop"> Очистить корзину</a>
                <a  href="<?= Url::to(['/cart/confirm']) ?>" class="btn contents-btn"> Оформить заказ </a>
            </div>
            <!-- order end -->
        </div>
        <!--cart end -->
        <? else: ?>
        <div class="basket clearfix">
            <h3 class="dc-not-found"><?= Yii::t('common', 'Корзина пуста') ?></h3>

        <div class="basket-btn">
            <a  href="<?= Url::to(['/catalog/list']) ?>" class="btn contents-btn pull-left"> Выбрать товары в каталоге </a>
        </div>
            </div>
        <? endif ?>





        <!-- oroginal cart

        <div class="dc-page-wrap">
            <?php // echo $this->render('/partials/page-list.php') ?>
            <div class="container">
                <div class="dc-page">
                    <h1 class="dc-page-title"><?= Yii::t('common', 'Корзина') ?></h1>
                    <? if ($cartCollection): ?>
                        <div class="dc-table styled cartTable">
                            <div class="header">
                                <div><?= Yii::t('common', 'Изображение') ?></div>
                                <div><?= Yii::t('common', 'Название') ?></div>
                                <div><?= Yii::t('common', 'В день / Залог') ?></div>
                                <div><?= Yii::t('common', 'Удалить') ?></div>
                            </div>
                            <? foreach ($cartCollection as $item): ?>
                                <div class="row">
                                    <div><?= Html::img($item->getPreview()) ?></div>
                                    <div>
                                        <a href="<?= Url::to(['/product/view', 'slug' => $item->slug]) ?>"><?= $item->title ?></a>
                                    </div>
                                    <div><?= Yii::t('common', '{price} {name}', Yii::$app->currency->getPriceCurrency($item->price)) ?>
                                        / <?= Yii::t('common', '{price} {name}', Yii::$app->currency->getPriceCurrency($item->price)) ?></div>
                                    <div><a href="<?= Url::to(['cart/delete', 'product_id' => $item->id]) ?>"><i
                                                class="fa fa-times" aria-hidden="true"></i></a></div>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <br>
                        <a href="<?= Url::to(['/cart/confirm']) ?>"
                           class="dc-btn"><?= Yii::t('common', 'Забронировать и перейти к оформлению') ?></a>
                        <a href="<?= Url::to(['/cart/clear']) ?>"
                           class="dc-btn"><?= Yii::t('common', 'Очистить корзину') ?></a>
                    <? else: ?>
                        <h3 class="dc-not-found"><?= Yii::t('common', 'Корзина пуста') ?></h3>
                        <br>
                        <a class="dc-btn dc-add-btn"
                           href="<?= Url::to(['/catalog/list']) ?>"><?= Yii::t('common', 'Выбрать товары в каталоге') ?></a>
                    <? endif; ?>
                </div>
            </div>
        </div>

         end oroginal cart -->
    </div>
</div>



