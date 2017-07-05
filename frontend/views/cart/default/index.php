<?php
use frontend\widgets\AddToCartBtn;
use frontend\widgets\BuyButton;
use frontend\widgets\DeleteButton;
use frontend\widgets\ChangeCount;
use frontend\widgets\ChangeOptions;
use yii\helpers\Url;
use frontend\widgets\CartInformer;


$this->title = yii::t('common', 'Корзина');
?>
<?= $this->renderFile('@frontend/views/partial/left.php'); ?>

<div class = "col-md-10 main-content">
    <div class = "constructor-page">
        <!-- breadcrumb begin -->
        <ol class = "breadcrumb text-left">
            <li><a href = "/">Главная</a></li>
            <li class = "active"><i class = "fa fa-angle-double-right"></i>Корзина</li>
        </ol>
        <!-- breadcrumb end -->


        <!-- constructor begin -->
        <div class = "basket clearfix">
            <!-- order begin -->

            <h1><?= yii::t('common', 'Корзина'); ?></h1>

            <div class = "order clearfix  ">
                <?php foreach($elements as $cart_key => $element) {
                    $product= $element->getModel();
                    $images = $product->getImages();
                    $image_html = isset($images[0]) ? '<img src="'.$images[0]->getUrl('174x').'">' : '<img src="img/consctructor-img.png">';
                    $classes = $key % 3 == 0 ? "col-md-4" : "col-md-4 hidden-xs hidden-sm";
                ?>
                <div class = "order-main clearfix ">
                    <div class = "order-img pull-left">
                        <?=$image_html?>
                    </div>
                    <div class = "order-des pull-right">
                        <div class = "order__title order__name">
                            <?=$product->getCartName();?> <span><?= $product->getField('collection')?></span>
                            <!-- <a href = "#" class = "order-close">asdasd</a> -->

                                <?=DeleteButton::widget([
                                    'model' => $element,
                                    'text' => '',
                                    'lineSelector' => '.order-main'
                                ]);?>



                        </div>
                        <div class = "order-text clearfix">
                            <div class = "description pull-left">
                                <ul>
                                    <li>Артикул: <span><?=$product->getField('sku')?></span></li>
                                    <li>Состав: <span>40%хб-60%пэ</span></li>
                                    <li>Цвет: <span>черн/крас</span></li>
                                    <li>Статус: <span>под заказ</span></li>
                                    <li>Рост: <span>164</span></li>
                                    <li>Размер: <span>44</span></li>
                                    <li>Длина: <span>65 см.</span></li>
                                    <li>Ширина: <span>70 см.</span></li>
                                </ul>
                            </div>
                            <div class = "order-quantity pull-left">
                                <div class = "wrapper">
                                    <span class = "quantity-text">Количество</span>
                                    <div class = "quantity-item">
                                        <select class = "selectpicker" title = "1 шт.">
                                            <option>1 шт.</option>
                                            <option>2 шт.</option>
                                            <option>3 шт.</option>
                                            <option>4 шт.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class = "order-price pull-right">Итого: <?=$product->getCartPrice()?> р.</div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="order-total">
                    <?=CartInformer::widget(['htmlTag' => 'h4']); ?>
                </div>
                <?= \Yii::$app->user->isGuest ? \frontend\widgets\GuestOrderForm::widget() : \frontend\widgets\ClientOrderForm::widget()?>


            </div>



            <!--
            <div class = "basket-btn">
                <a  href="<?= Url::to(['/catalog/list']) ?>"class="btn con-shop"> Продолжить покупки </a>

                <a  href="<?= Url::to(['/cart/confirm']) ?>" class="btn contents-btn"> Оформить заказ </a>

            </div>
            -->
            <!-- order end -->
        </div>
        <!-- constructor end -->



        <!--

        <div class="cart">
            <h1><?= yii::t('cart', 'Cart'); ?></h1>
            <?php foreach($elements as $element) { ?>
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <strong><?=$element->getModel()->getCartName();?> (<?=$element->getModel()->getCartPrice();?> р.)</strong>
                        <?=ChangeOptions::widget(['model' => $element, 'type' => 'radio']); ?>
                    </div>
                    <div class="col-lg-4 col-xs-4">
                        <?=ChangeCount::widget(['model' => $element]);?>
                    </div>
                    <div class="col-lg-2 col-xs-2">
                        <?=DeleteButton::widget(['model' => $element, 'lineSelector' => '.row']);?>
                    </div>
                </div>
            <?php } ?>
            <div class="total">
                <?=CartInformer::widget(['htmlTag' => 'h3']); ?>
            </div>
        </div>
        -->

    </div>


</div>







