<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $id
 * @property string $name
 * @property string $val
 * @property string $label
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'val', 'label'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Параметр', // Уникальное имя параметра для кодера
            'val' => 'Значение', // Размер значения можно увеличить
            'label' => 'Название' // Человекопонятное названия для админа/контент-менеджера
        ];
    }
}
