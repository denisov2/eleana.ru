<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 22.03.2017
 * Time: 16:05
 */

namespace frontend\widgets;

use yii\base\Widget;
use yii\base\View;
use yii\helpers\Html;
use yii\helpers\Url;

use Yii;

class AddToCartBtn extends Widget
{
    public $product_id;
    public $inTheCart_text = 'Убрать';
    public $addToCart_text = 'В корзину';
    public $options = [];

    public function run()
    {
        $this->options['class'] .= ' addToCartBtn';

        if (Yii::$app->cart->isInCollection($this->product_id))
            $this->options['class'] .= ' added';


        $js = "
        $('.addToCartBtn').on('click', function(e)
            {
                var btn = $(this);
                e.preventDefault();

                $.ajax({
                    url: (btn.hasClass('added') ? '" . Url::to(['cart/remove']) . "' : '" . Url::to(['cart/add']) . "') + '?product_id=' + btn.attr('href'),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data)
                    {


                        if(data.result)
                        {
                            btn.toggleClass('added');
                            $.ajax({
                                url: '" . Url::to(['cart/list']) . "',
                                type: 'GET',
                                dataType: 'json',
                                success: function(data)
                                {

                                    $('div.bag #cart-header-count').html(data.result.length);

                                    $('.cartBtn .itemsCount').html(data.result.length);
                                    $('.cartBtn h4').remove();
                                    var cart = $('.cartList ul');
                                    cart.empty();
                                    data.result.forEach(function logArrayElements(element, index, array)
                                    {
                                        console.log('В корзине есть: ' + index + ' | ' + element.title + ' | Цена ' + element.price);
                                        cart.append($(\"<li></li>\").html(element.title));
                                    });


                                    $('div.bag #cart-header-sum').html(data.total);
                                    // вызываем модальное окно с корзиной
                                    if (btn.hasClass('added')) {
                                        var product = data.result [ 0 ];

                                        $('span#cart-modal-product-title').html(product.title);
                                        $('span#cart-modal-product-model').html(product.model);
                                        $('span#cart-modal-product-code').html(product.code);
                                        $('span#cart-modal-product-sku').html(product.sku);
                                        $('span#cart-modal-product-price').html(product.price);

                                         console.log('Последнее добавление: '  + product.title + ' | Цена ' + product.price);

                                        $('div.modal#bag').modal('show');
                                    }
                                }
                            });

                            ;

                        }
                    }
                });




         });";

        $this->getView()->registerJs($js);


        /*

        */
        return '<div class="btn bye text-uppercase btn-red btn-block">'.

        Html::a(
            '<span><i class="fa fa-check"></i>' . Yii::t('common', $this->inTheCart_text) . '</span><span><i class="fa fa-shopping-cart"></i>' . Yii::t('common', $this->addToCart_text) . '</span>',
            $this->product_id,//Url::to(['cart/ajaxAddProduct', 'product_id' => $this->product_id]),
            $this->options
        )
        .'</div>';
        /*
        return Html::a(
            '<span><i class="fa fa-check"></i>' . Yii::t('common', $this->inTheCart_text) . '</span><span><i class="fa fa-shopping-cart"></i>' . Yii::t('common', $this->addToCart_text) . '</span>',
            $this->product_id,//Url::to(['cart/ajaxAddProduct', 'product_id' => $this->product_id]),
            $this->options
        );
        */


    }
}

?>
