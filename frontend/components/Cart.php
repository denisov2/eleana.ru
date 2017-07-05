<?php

namespace frontend\components;

use yii\base\Component;
use yii\web\Cookie;
use Yii;

use common\models\Product;
use frontend\models\CartItem;
use frontend\models\CartCollection;

class Cart extends Component
{
    public function addItem($product_id)
    {
        $cookies = Yii::$app->request->cookies;
        if (!$cookies->has('cart_collection'))
            $cart = new CartCollection();
        else
        {
            $cart = CartCollection::findOne(intval($cookies->getValue('cart_collection')));
            if($cart === null)
                $cart = new CartCollection();
        }

        $cart->updated_at = time();
        $cart->save();

        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name'  => 'cart_collection',
            'value' => $cart->id,
        ]));

        $product = Product::findOne($product_id);

        if(!($product === null) )
        {
            $checkItem = CartItem::findOne(['product_id' => $product->id, 'cart_collection_id' => $cart->id]);
            if($checkItem === null)
            {
                $cartItem = new CartItem();
                $cartItem->product_id = $product->id;
                $cartItem->cart_collection_id = $cart->id;
                $cartItem->created_at = time();
                $cartItem->save();
                return true;
            }
        }
        return false;
    }

    public function clear()
    {
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('cart_collection'))
        {
            $cartCollectionId = intval($cookies->getValue('cart_collection'));
            CartItem::deleteAll(['cart_collection_id' => $cartCollectionId]);
        }
    }

    public function deleteItem($product_id)
    {
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('cart_collection'))
        {
            $cartCollectionId = intval($cookies->getValue('cart_collection'));
            CartItem::deleteAll(['cart_collection_id' => $cartCollectionId, 'product_id' => $product_id]);
        }
        return true;
    }

    public function getCollection()
    {
        $this->updateCollection();
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('cart_collection'))
        {
            $cartCollectionId = intval($cookies->getValue('cart_collection'));

            $getProducts = function(CartItem $object) {
                return $object->product;
            };
            $items = CartItem::find()->where(['cart_collection_id' => $cartCollectionId])->with('product')->all();
            if($items)
                return array_map($getProducts, $items);
        }
        return null;
    }

    public function getTotalSum()
    {
        $this->updateCollection();
        $cookies = Yii::$app->request->cookies;
        $total_sum = 0;
        if ($cookies->has('cart_collection'))
        {
            $cartCollectionId = intval($cookies->getValue('cart_collection'));

            $items = CartItem::find()->where(['cart_collection_id' => $cartCollectionId])->with('product')->all();


            foreach ($items as $item)  {
                $total_sum = $total_sum + $item->product->price;
            }

        }
        return $total_sum;
    }

    public function updateCollection()
    {
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('cart_collection'))
        {
            $cartCollectionId = intval($cookies->getValue('cart_collection'));
            $items = CartItem::findAll(['cart_collection_id' => $cartCollectionId]);

            if($items)
                foreach ($items as $item)
                {
                    // делаем что то с cart items
                }

                  /*
                    if(!$item->product->isFree())
                        CartItem::findOne(['cart_collection_id' => $cartCollectionId, 'product_id' => $item->product_id])->delete();
                  */
        }
    }

    public function isInCollection($product_id)
    {
        $this->updateCollection();
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('cart_collection'))
        {
            $cartCollectionId = intval($cookies->getValue('cart_collection'));
            $item = CartItem::findOne(['cart_collection_id' => $cartCollectionId, 'product_id' => $product_id]);
            if($item)
                return true;
        }
        return false;
    }
}
?>