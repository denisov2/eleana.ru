<?php

namespace frontend\controllers;

// use common\models\Category;
//use common\models\Product;

use dvizh\shop\models\product\ProductSearch;
use dvizh\shop\models\Product;
use dvizh\shop\models\Category;


use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\data\Sort;
use yii\helpers\Url;

class CatalogController extends \yii\web\Controller
{
        public $defaultAction = 'list';

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionList($id = null)
    {
        /** @var Category $category */
        $category = null;
        if ($id) $category = Category::findOne(['id' => $id]);

        // $categories = Category::find()->indexBy('id')->orderBy('id')->all();


        $sort = new Sort([
            'attributes' => [
                'shop_price.price' => [
                    'label' => 'По цене',
                ],
                'name' => [
                    'label' => 'По названию',
                ],
            ],
            'defaultOrder' => ['shop_price.price' => SORT_DESC]
        ]);

        $filters = [];
        //$city_id = \Yii::$app->request->get('city');
        //$filters = ['city_id' => $city_id];

        if ($category) $filters['category_id'] = $category->id;


        $productsQuery = Product::find()->joinWith(['prices'])->andWhere('shop_price.type_id=1')->andFilterWhere($filters);
        //  $productsQuery = Product::find()->filterWhere($filters );


        $countQuery = clone ($productsQuery);


        if (\Yii::$app->request->get('page_size') && in_array(\Yii::$app->request->get('page_size'), \Yii::$app->params['products_on_page']))
            $defaultPageSize = \Yii::$app->request->get('page_size');
        else
            $defaultPageSize = \Yii::$app->params['products_on_page_default'];

        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => $defaultPageSize
        ]);

        $products = $productsQuery->orderBy($sort->orders)->offset($pages->offset)->limit($pages->limit)
            ->all();


        return $this->render('list', [
            'products' => $products,
            'category' => $category,
            'pages' => $pages,
            'sort' => $sort,
            //'menuItems' => $this->getMenuItems($categories, isset($category->id) ? $category->id : null),
        ]);

    }

    public function actionView()
    {
        return $this->render('view');
    }

    /**
     * @param Category[] $categories
     * @param int $activeId
     * @param int $parent
     * @return array
     */
    private function getMenuItems($categories, $activeId = null, $parent = null)
    {
        $menuItems = [];
        foreach ($categories as $category) {
            if ($category->parent_id === $parent) {
                $menuItems[$category->id] = [
                    'active' => $activeId === $category->id,
                    'label' => $category->name,
                    'url' => ['catalog/list', 'id' => $category->id],
                    'items' => $this->getMenuItems($categories, $activeId, $category->id),
                ];
            }
        }
        return $menuItems;
    }


    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param Category[] $categories all categories
     * @param int $categoryId id of category to start search with
     * @param array $categoryIds
     * @return array $categoryIds
     */
    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        foreach ($categories as $category) {
            if ($category->id == $categoryId) {
                $categoryIds[] = $category->id;
            } elseif ($category->parent_id == $categoryId) {
                $this->getCategoryIds($categories, $category->id, $categoryIds);
            }
        }
        return $categoryIds;
    }
}
