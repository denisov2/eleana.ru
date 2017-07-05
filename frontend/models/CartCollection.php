<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "CartCollections".
 *
 * @property integer $id
 * @property integer $updated_at
 */
class CartCollection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart_collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['updated_at'], 'required'],
            [['updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'updated_at' => 'Updated At',
        ];
    }
}
