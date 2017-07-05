<?php
namespace common\models;

use yii;

use dvizh\order\models\Order as BaseOrder;



class Order extends BaseOrder
{

    public function attributeLabels()
    {
        return [
            'id' => yii::t('order', 'ID'),
            'client_name' => yii::t('common', 'Ваше имя'),
            'shipping_type_id' => yii::t('common', 'Доставка'),
            'delivery_time_date' => yii::t('order', 'Delivery date'),
            'delivery_time_hour' => yii::t('order', 'Delivery hour'),
            'delivery_time_min' => yii::t('order', 'Delivery minute'),
            'delivery_type' => yii::t('order', 'Delivery time'),
            'payment_type_id' => yii::t('common', 'Тип платежа'),
            'comment' => yii::t('common', 'Комментарий к заказу'),
            'phone' => yii::t('common', 'Телефон'),
            'promocode' => yii::t('order', 'Promocode'),
            'date' => yii::t('order', 'Date'),
            'email' => yii::t('order', 'Email'),
            'payment' => yii::t('order', 'Paid'),
            'status' => yii::t('order', 'Status'),
            'time' => yii::t('order', 'Time'),
            'user_id' => yii::t('order', 'User ID'),
            'count' => yii::t('order', 'Count'),
            'cost' => yii::t('order', 'Cost'),
            'base_cost' => yii::t('order', 'Base cost'),
            'seller_user_id' => yii::t('order', 'Seller'),
            'address' => yii::t('order', 'Address'),
            'organization_id' => yii::t('order', 'organization'),
            'is_assigment' => yii::t('order', 'Assigment'),
            'is_deleted' => yii::t('order', 'Deleted'),
        ];
    }
}
