<?php

namespace frontend\controllers;

use Yii;
use dvizh\shop\models\Product;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\OrderCustomSize;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */


    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $order_custom_size = new OrderCustomSize();

        if($order_custom_size->load($_POST) && $order_custom_size->validate()) {
            $order_custom_size->registerCustomOrder($id);
        }
        return $this->render('view', [
            'model' => Product::findOne(['id' => $id]),
            'order_custom_size' => $order_custom_size
        ]);

    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionConstructor($id)
    {
        return $this->render('constructor', [
            'model' => Product::findOne(['id' => $id]),
        ]);

    }

    // редактирование товара пользователем
    public function actionEdit($id)
    {

        return $this->render('edit', [
            'model' => $this->findModel($id),
        ]);

    }

    // подача жалобы на конкртеный товар
    public function actionComplain ($id)
    {

        return $this->render('edit', [
            'model' => $this->findModel($id),
        ]);

    }



    public function actionAddToCart($id)
    {
        //Любая модель
        $model = $this->findModel($id);
        //Кладем ее в корзину (в количестве 1, без опций)
        $cartElement = yii::$app->cart->put($model, 1, []);
    }


    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
