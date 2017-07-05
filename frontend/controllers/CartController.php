<?php

namespace frontend\controllers;
//use common\models\Contract;
use common\models\Order;

//use common\models\OrderPaymentStatus;
//use common\models\OrderStatus;
use common\models\OrderItem;
use common\models\Product;
use yii\filters\AccessControl;

use Yii;

class CartController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['confirm'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDelete($product_id)
    {
        Yii::$app->cart->deleteItem($product_id);
        $this->redirect(['/cart/index']);
    }

    public function actionClear()
    {
        Yii::$app->cart->clear();
        $this->redirect(['/cart/index']);
    }

    public function actionAdd($product_id)
    {
        if (Yii::$app->request->isAjax)
            echo json_encode(['result' => Yii::$app->cart->addItem($product_id)]);
        elseif  ( \Yii::$app->cart->addItem($product_id) )
            echo  '2222222' ;
        else
         throw new \yii\web\BadRequestHttpException;
    }

    public function actionRemove($product_id)
    {
        if (Yii::$app->request->isAjax)
            echo json_encode(['result' => Yii::$app->cart->deleteItem($product_id)]);
        else throw new \yii\web\BadRequestHttpException;
    }

    public function actionList()
    {
        if (Yii::$app->request->isAjax) {
            $answer['result'] = [];
            $items = Yii::$app->cart->getCollection();
            foreach ($items as $key => $item) {
                $answer['result'][$key]['title'] = $item->title;
                $answer['result'][$key]['price'] = round ( $item->price);
                $answer['result'][$key]['model'] = $item->model;
                $answer['result'][$key]['code'] = $item->code;
                $answer['result'][$key]['sku'] = $item->sku;

                $images = $item->images;
                $answer['result'][$key]['image'] = count ($images) ? $images[0]->getUrl() : "/images/449daf85c71a9f8eb7c666134b1d9b95.jpg";

            };
            $answer['total']= Yii::$app->cart->getTotalSum();

            echo json_encode($answer);
        } else throw new \yii\web\BadRequestHttpException();
    }

    public function actionConfirm()
    {
        /**
         * @var Product[] $items
         */

        $items = Yii::$app->cart->getCollection();

        $order = new Order();

        foreach ($items as $cart_item) {

            $product = Product::findOne(['id' => $cart_item->id]);

            $order_item = new OrderItem();
            $order_item->product = $product;
            $order_item->quantity = 1;

            $order->orderItems[] = $order_item;

            //$order->orderItems = $item->id;
            //$order->user_id         = Yii::$app->user->id;
            //$order->period          = $item->recomended_period;
            // $order->payment_status  = OrderPaymentStatus::NOT_PAID;
            //$order->status          = OrderStatus::BOOKED;
            //$order->period          = $item->recomended_period;
        }

        $this->redirect(['/order/index']);
    }
}
