<?php

namespace frontend\models;

use common\models\Product;
use Yii;

/**
 * This is the model class for table "CartItems".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $cart_collection_id
 * @property integer $created_at
 *
 * @property Products $product
 */
class CartItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'cart_collection_id', 'created_at'], 'required'],
            [['product_id', 'cart_collection_id', 'created_at'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'cart_collection_id' => 'Cart Collection ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
