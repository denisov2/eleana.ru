<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $model
 * @property string $sku
 * @property string $slug
 * @property string $description
 * @property integer $category_id
 * @property string $price
 * @property string $price_big
 * @property string $code
 *
 * @property Image[] $images
 * @property OrderItem[] $orderItems
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord implements \pistol88\cart\interfaces\CartElement
//class Product extends \yii\db\ActiveRecord implements CartPositionInterface
{
    // use CartPositionTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ],
            'seo' => [
                'class' => 'pistol88\seo\behaviors\SeoFields',
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['price'], 'number'],
            [['price_big'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['model'], 'string', 'max' => 255],
            [['sku'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'price' => 'Price',
        ];
    }

    /**
     * @return Image[]
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    public function getPreview()
    {
        $images = $this->images;
        if ($images)
            return $images[0]->getUrl();
        else
            return Image::getDefaultPreview();
    }

    public function getShortTitle($length = 40)
    {
        mb_internal_encoding("UTF-8");
        return strlen($this->title) > $length ? mb_substr($this->title, 0, $length - 3) . '...' : $this->title;
    }

    //****** Реализация интерфейса для корзины ********//

    public function getCartId()
    {
        return $this->id;
    }

    public function getCartName()
    {
        return $this->title;
    }

    public function getCartPrice()
    {
        return $this->price;
    }

    //Опции продукта для выбора при добавлении в корзину
    public function getCartOptions()
    {
        return [
            '1' => [
                'name' => 'Цвет',
                'variants' => ['1' => 'Красный', '2' => 'Белый', '3' => 'Синий'],
            ],
            '2' => [
                'name' => 'Размер',
                'variants' => ['4' => 'XL', '5' => 'XS', '6' => 'XXL'],
            ]
        ];
    }
    //..

}
