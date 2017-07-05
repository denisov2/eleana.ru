<?php
namespace frontend\widgets;

use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class CartInformer extends \yii\base\Widget
{

    public $text = NULL;
    public $offerUrl = NULL;
    public $cssClass = NULL;
    public $htmlTag = 'span';
	public $showOldPrice = true;

    public function init()
    {
        parent::init();

        \dvizh\cart\assets\WidgetAsset::register($this->getView());

        if ($this->offerUrl == NULL) {
            $this->offerUrl = Url::toRoute(["/cart/default/index"]);
        }

        if ($this->text === NULL) {
            $this->text = 'Итого в корзине {c} товар(а) на сумму {p}';
        }
        
        return true;
    }


    public function run()
    {
        $cart = yii::$app->cart;

        if($this->showOldPrice == false | $cart->cost == $cart->getCost(false)) {
            $this->text = str_replace(['{c}', '{p}'],
                ['<span class="dvizh-cart-count text-red">'.$cart->getCount().'</span>', '<strong class="dvizh-cart-price text-red">'.$cart->getCostFormatted().'</strong>'],
                $this->text
            );
        } else {
            $this->text = str_replace(['{c}', '{p}'],
                ['<span class="dvizh-cart-count  text-red">'.$cart->getCount().'</span>', '<strong class="dvizh-cart-price  text-red"><s>'.round($cart->getCost(false)).'</s>'.$cart->getCostFormatted().'</strong>'],
                $this->text
            );
        }

        return Html::tag($this->htmlTag, $this->text, [
            'href' => $this->offerUrl,
            'class' => "dvizh-cart-informer {$this->cssClass}",
        ]);
    }
}
