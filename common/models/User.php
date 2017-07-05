<?php
namespace common\models;

use dektrium\user\models\User as BaseUser;
use common\models\Order;
use common\models\Product;

class User extends BaseUser
{
    const ROLE_USER = 10;
    const ROLE_MANAGER = 20;
    const ROLE_ADMIN = 30;

    public static function tableName()
    {
        return '{{user}}';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['register'][] = 'role';
        $scenarios['connect'][] = 'role';
        $scenarios['create'][] = 'role';
        $scenarios['update'][] = 'role';
        $scenarios['settings'][] = 'role';

        return $scenarios;
    }


    public function attributeLabels()


    {

        $labels = parent::attributeLabels();
        //$labels['role'] = \Yii::t('common', 'Роли пользователей');
        $labels['role'] = 'Роль';

        return $labels;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['user_id' => 'id']);
    }

    /**
     * @return Array;
     */
    public static function getRoles(){

        return [
            self::ROLE_USER => 'Пользователь',
            self::ROLE_MANAGER => 'Менеджер',
            self::ROLE_ADMIN => 'Администратор',
        ];
    }




}