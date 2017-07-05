<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 02.03.2017
 * Time: 18:02
 */


namespace common\models;

use Yii;
use kartik\tree\models\Tree;


class Menu extends Tree
{
    /**
     * @inheritdoc
     */

    const MENU_TYPE_INTERNAL = 1;
    const MENU_TYPE_PAGE = 2;
    const MENU_TYPE_PRODUCT = 3;
    const MENU_TYPE_CATEGORY = 4;


    public static function tableName()
    {
        return 'menu';
    }

    static public function getMenuTypes(){

        return [
            self::MENU_TYPE_INTERNAL => 'Внешняя ссылка',
            self::MENU_TYPE_PAGE => 'Страница',
            self::MENU_TYPE_PRODUCT => 'Продукт',
            self::MENU_TYPE_CATEGORY => 'Категория',
        ];
    }

    public function rules()
    {


        $rules = parent::rules();

        $rules['descriptionRequired']   = [ 'description' , 'required'];
        $rules[] = ['item_type', 'safe'];
        $rules[] = ['item_id', 'safe'];

        return $rules;


    }

    /**
     * Override isDisabled method if you need as shown in the
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
    public function isDisabled()
    {
        if ( 2==4 ) {
            return true;
        }
        return parent::isDisabled();
    }
}