<?php


namespace frontend\models;

use pistol88\shop\models\Product;
use yii\base\Model;
use common\models\User;
use Yii;

class OrderCustomSize extends Model
{
    /**
     * @var string User email address
     */
    public $email;

    /**
     * @var string Username
     */
    public $name;

    /**
     * @var string Password
     */
    public $phone;

    /**
     * @var string Custom Length
     */
    public $custom_length;

    /**
     * @var string Custom Width
     */
    public $custom_width;


    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['name', 'phone', 'email'], 'required'],
            ['email', 'email'],
            [['custom_length', 'custom_width'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'phone' => 'Телефон',
            'name' => 'Имя',
            'custom_length' => 'Длинна',
            'custom_width' => 'Ширина'
        ];
    }

    /**
     * @inheritdoc
     */
    public function formName()
    {
        return 'custom-size-form';
    }

    /**
     * Registers a new user account. If registration was successful it will set flash message.
     *
     * @return bool
     */
    public function registerCustomOrder($product_id)
    {
        if (!$this->validate()) {
            return false;
        }

        //TODO: Отправка email мэнеджеру

        $product = Product::findOne($product_id);

        if ($ordersEmail = yii::$app->getModule('order')->ordersEmail) {

            Yii::$app->mailer->compose()
                ->setTextBody('заказ на настандартные размеры заказ на настандартные размеры ')
                ->setHtmlBody(sprintf("<p>заказ на настандартные размеры заказ на настандартные размеры </p><p>%s, %s</p>", $this->custom_length, $this->custom_width))
                ->setTo(\Yii::$app->getModule('order')->ordersEmail)
                ->setFrom('eleana@foxauto.xyz')
                ->setSubject(sprintf("Заказ на настандартные размеры. Товар %s [%s]",$product->name, $product->getField('collection') ) )
                ->send();

        }


        Yii::$app->session->setFlash(
            'info',
            'Ваш заказ принят, наши менеджеры свяжутся с вами в ближайшее время.'

        );

        return true;
    }


}
