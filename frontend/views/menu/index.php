<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 02.03.2017
 * Time: 18:07
 */

use kartik\tree\TreeView;
use common\models\Menu;

echo TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => Menu::find()->addOrderBy('root, lft'),

    'nodeAddlViews' => [
        \kartik\tree\Module::VIEW_PART_2 => '@frontend/views/menu/_treePart2'
    ],


    'headingOptions' => ['label' => 'Menus'],
    'fontAwesome' => false,     // optional
    'isAdmin' => false,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'softDelete' => true,       // defaults to true
    'cacheSettings' => [
        'enableCache' => false   // defaults to true
    ]
]);