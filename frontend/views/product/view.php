<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Image;
use yii\helpers\Markdown;
use yii\helpers\Url;
use frontend\widgets\BuyButton;
use \yii\widgets\ActiveForm;
use frontend\widgets\AddToCartBtn;

/* @var $this yii\web\View */
/* @var $model dvizh\shop\models\Product */
/* @var $order_custom_size frontend\models\OrderCustomSize */

if(!$title = $model->seo->title) {
    $title = "Купить {$model->name} в магазине «Eleana.ru»";
}

if(!$description = $model->seo->description) {
    $description = 'Страница '.$model->name;
}

if(!$keywords = $model->seo->keywords) {
    $keywords = '';
}

$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $description,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $keywords,
]);

$images = $model->images;
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => ['/']];
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['catalog/list']];
$this->params['breadcrumbs'][] = $this->title;



$js = <<<JS
     $( "#order-custom-size" ).click( function ( e ) {


        $( "#custom-size-form-custom_length").val( 'Длинна: ' + $( "#size-length" ).val() );
        $( "#custom-size-form-custom_width").val( 'Ширина: ' + $( "#size-width" ).val() );

     });
JS;
$this->registerJs($js, yii\web\View::POS_READY);


?>

<?= $this->renderFile('@frontend/views/partial/left.php'); ?>



<div class="col-md-10 main-content">
    <div class="card-page">
        <!-- breadcrumb begin -->
        <ol class="breadcrumb text-left">
            <li><a href="index.html">Главная</a></li>
            <li class="active"><i class="fa fa-angle-double-right"></i>Куртка поворская</li>
        </ol>
        <!-- breadcrumb end -->

        <?= \frontend\widgets\Alert::widget() ?>;

        <!-- card begin -->
        <div class="card clearfix">
            <!-- media title begin -->
            <div class="card__info--title media--title hidden-lg">
                <div class="title-wrapper clearfix">
                    <div class="info-left">
                        <?= $model->name ?>
                        <p><?= $model->name ?></p>
                    </div>
                </div>
            </div>
            <!-- media-title end -->
            <!-- card__slider begin -->


            <div class="card__slider pull-left">
                <?php
                $images = $model->getImages();
                if ($images) {

                    ?>
                    <!-- carousel begin -->
                    <div id="carousel-example-generic" class="carousel slide card-carousel"
                         data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php foreach ($images as $key => $image) { ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?= $key ?>" class="active">
                                    <img src="<?= $image->getUrl(); ?>" alt="product">
                                </li>
                            <?php } ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach ($images as $key => $image) { ?>
                                <div class="item <?= $key == 0 ? "active" : "" ?>">
                                    <img src="<?= $image->getUrl() ?>" alt="product">
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- carousel end -->
                    <?php

                } ?>
            </div>
            <!-- card__slider end -->

            <!-- card__info begin -->
            <div class="card__info pull-right">
                <div class="card__info--wrapper">
                    <div class="card__info--title">
                        <div class="title-wrapper clearfix">
                            <div class="info-left">
                                <?= $model->name ?>
                                <p><?= $model->name ?></p>
                            </div>
                            <div class="info-right info-code"><?= $model->code ?></div>
                        </div>
                    </div>
                    <div class="card__info--des">
                        <p>Артикул: <span class="des-code"><?= $model->getField('sku'); ?></span></p>

                        <div class="des-price">



                            <p class="price-before">Цена (до 50 размера): <span><?= round ( $model->getPrice() ) ?> р.</span></p>

                            <p class="price-from">Цена (от 52 размера): <span><?= round ( $model->getPrice() ) ?> р.</span></p>
                        </div>
                        <p class="des-status">Cтатус: <span>Под заказ</span><a href="#"><i
                                    class="fa fa-info-circle" aria-hidden="true"></i></a></p>
                        <span class="des-text">При 100% предоплате срок изготовления 14-28 дней</span>
                    </div>
                    <!-- card__info-option begin -->
                    <div class="card__info--option">
                        <form>
                            <div class="form-wrapper clearfix">
                                <div class="card__selection pull-left">
                                    <div class="selection-item">
                                        <span class="item-value">Цвет</span>
                                        <select class="selectpicker" title="- Выберите значение -"
                                                multiple>
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                            <option>Onions</option>
                                        </select>
                                    </div>
                                    <div class="selection-item">
                                        <? //\frontend\widgets\Choice::widget(['model' => $model]);?>

                                        <span class="item-value">Длина</span>
                                        <select class="selectpicker" title="- Выберите значение -"
                                                multiple>
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                            <option>Onions</option>
                                        </select>
                                    </div>
                                    <div class="selection-item">
                                        <span class="item-value">Ширина</span>
                                        <select class="selectpicker" title="- Выберите значение -"
                                                multiple>
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                            <option>Onions</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- card__size begin -->
                                <div class="card__size pull-right">
                                    <div class="size-title">Нет вашего размера?</div>
                                    <div class="size-item">
                                        <label for="size-length">Укажите длину</label>
                                        <input type="text" id="size-length">
                                    </div>
                                    <div class="size-item">
                                        <label for="size-width">Укажите ширину</label>
                                        <input type="text" id="size-width">
                                    </div>
                                    <span class="size-text">Стоимость товара расчитывается  индивидуально</span>


                                    <a data-toggle="modal" href="#custom-size"><button id="order-custom-size" class="btn reg">Заказать просчет</button></a>
                                </div>
                                <!-- card__size end -->
                            </div>
                    </div>
                    <!-- card__buy begin -->




                    <div class="card__buy">
                        <?= BuyButton::widget([
                            'model' => $model,
                            'text' => '<i class="fa fa-shopping-cart fa-2x"></i>Добавить в корзину',
                            'htmlTag' => 'a',
                            'cssClass' => ' fa fa-shopping-cart fa-2x '
                        ]) ?>

                        <!-- <a href="#" class="btn"><i class="fa fa-shopping-cart fa-2x"></i>Добавить в
                            корзину</a> -->
                        <a href="<?= Url::to(['product/constructor', 'id' => $model->id ]) ?>" class="print"><i class="fa fa-print fa-2x"
                                                     aria-hidden="true"></i></a>
                    </div>
                    <!-- card__buy end -->
                    </form>
                </div>
                <!-- card__info-option end -->
                <div class="card__info--more">
                    <div class="more-title" id="more-title-js">
                        Дополнительная информация
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                    <div class="more-text" id="more-text-js">
                        <p>Заказать <a href="#">ВЫШИВКУ</a> на изделие</p>

                        <p>Как правильно выбрать <a href="#">размер</a></p>

                        <p>Памятка по <a href="#">УХОДУ</a> за изделием</p>
                    </div>
                </div>
            </div>
            <!-- card__info end -->

            <!-- card__characteristics begin -->
            <div class="card__characteristics">
                <div class="characteristics--title" id="characteristics-title-js">
                    Технические характеристики
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </div>




                <ul class="characteristics--list" id="characteristics-text-js">


                    <?php

                    if($filters = $model->getOptions()) {?>
                        <?php foreach($filters as $filter_name => $filter_values) { ?>
                            <li><?=$filter_name;?>: <span><?=implode(', ', $filter_values);?></span></li>
                        <?php } ?>
                    <?php } ?>

                    <li>Застежки: <span>Пукли</span></li>
                    <li>Длина рукава: <span>Короткий</span></li>
                    <li>Пол: <span>Женский</span></li>
                    <li>Профессия: <span>Повар</span></li>
                    <li>Стиль: <span>Классический</span></li>
                    <li>Класс: <span>Standart</span></li>
                    <li>Плотность: <span>120 гр.</span></li>
                    <li>Организация: <span>Общепит</span></li>
                </ul>
            </div>
            <!-- card__characteristics end -->

            <!-- card__product begin -->
            <div class="card__product">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card__product--title">К этому товару можно подобрать следующие
                            изделия
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product">
                            <div class="product-head">
                                <p>Куртка поварская </p>

                                <div class="product-name text-red text-uppercase">АНДРЕ</div>
                                <div class="code text-center pull-right">
                                    Код товара:
                                    <span>00070</span>
                                </div>
                            </div>
                            <div class="product-img">
                                <img class="center-block" src="/img/product.jpg" alt="Product">
                            </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Артикул:</td>
                                    <td>КП 031-1</td>
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
                                    <td>Под заказ <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="price-block clearfix">
                                <div class="old pull-left">2 000 руб.</div>
                                <div class="new pull-right"><span class="big">1 890</span> руб</div>
                            </div>
                            <div class="btn bye text-uppercase btn-red btn-block"><i
                                    class="fa fa-shopping-cart"></i>КУПИТЬ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product">
                            <div class="product-head">
                                <p>Куртка поварская </p>

                                <div class="product-name text-red text-uppercase">АНДРЕ</div>
                                <div class="code text-center pull-right">
                                    Код товара:
                                    <span>00070</span>
                                </div>
                            </div>
                            <div class="product-img">
                                <img class="center-block" src="/img/product.jpg" alt="Product">
                            </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Артикул:</td>
                                    <td>КП 031-1</td>
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
                                    <td>Под заказ <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="price-block clearfix">
                                <div class="old pull-left">2 000 руб.</div>
                                <div class="new pull-right"><span class="big">1 890</span> руб</div>
                            </div>
                            <div class="btn bye text-uppercase btn-red btn-block"><i
                                    class="fa fa-shopping-cart"></i>КУПИТЬ
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product">
                            <div class="product-head">
                                <p>Куртка поварская </p>

                                <div class="product-name text-red text-uppercase">АНДРЕ</div>
                                <div class="code text-center pull-right">
                                    Код товара:
                                    <span>00070</span>
                                </div>
                            </div>
                            <div class="product-img">
                                <img class="center-block" src="/img/product.jpg" alt="Product">
                            </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Артикул:</td>
                                    <td>КП 031-1</td>
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
                                    <td>Под заказ <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="price-block clearfix">
                                <div class="old pull-left">2 000 руб.</div>
                                <div class="new pull-right"><span class="big">1 890</span> руб</div>
                            </div>
                            <div class="btn bye text-uppercase btn-red btn-block"><i
                                    class="fa fa-shopping-cart"></i>КУПИТЬ
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card__product end -->
            </div>
            <!-- card end -->
        </div>
    </div>
</div>

<div class="modal fade" id="custom-size">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Расчет индивидуальной стоимости <br>(нестандартный размер)</h4>
            </div>
            <div class="modal-body">
                <div class="card__info--title">
                    <div class="title-wrapper clearfix">
                        <div class="info-left">
                            <p><?= $model->name ?>
                            <?= $model->getField('collection'); ?></p>
                        </div>
                        <div class="info-right info-code"><?= $model->code ?></div>
                    </div>
                </div>
                <div class="card__info--des">
                    <p>Артикул: <span class="des-code"><?= $model->getField('sku'); ?></span></p>

                    <p class="des-status">Cтатус: <span>Под заказ</span><a href="#"><i
                                class="fa fa-info-circle" aria-hidden="true"></i></a></p>
                    <span class="des-text">При 100% предоплате срок изготовления 14-28 дней</span>
                </div>



                    <?php $form = ActiveForm::begin([
                        'id' => 'registration-form-1',
                        'enableClientValidation' => true,
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                        'validateOnType' => true,
                        'options' => [],
                        'fieldConfig' => [

                            'template' => '<div class="form-group">{input}{error}</div>',

                            //'template' => '{label}<div class="col-sm-8">{input}{error}</div>',
                            //'errorOptions' => ['class' => 'help-block help-block-error', 'style' => 'margin-bottom:0px;'],
                        ],
                    ]); ?>

                    <?= $form->field($order_custom_size, 'custom_length')->textInput(['placeholder' => 'Укажите длинну']) ?>
                    <?= $form->field($order_custom_size, 'custom_width')->textInput(['placeholder' => 'Укажите ширину']) ?>
                    <?= $form->field($order_custom_size, 'name')->textInput(['placeholder' => 'Ваше имя']) ?>
                    <?= $form->field($order_custom_size, 'email')->textInput(['placeholder' => 'email']) ?>
                    <?= $form->field($order_custom_size, 'phone')->textInput(['placeholder' => 'Телефон']) ?>


                    <button type="submit" class="btn btn-red">Заказать просчет</button>
                    <?php ActiveForm::end(); ?>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>