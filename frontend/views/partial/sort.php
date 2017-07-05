<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 16.03.2017
 * Time: 16:05
 */
use Yii\helpers\Url;
$price_sort_selected = \Yii::$app->request->get('sort') || \Yii::$app->request->get('sort')=='shop_price.price' ? " selected " : "";
$category_id = \Yii::$app->request->get('id');

$products_on_page_config  = \Yii::$app->params['products_on_page'];

//var_dump($products_on_page_config); die();

$products_on_page_default  = \Yii::$app->params['products_on_page_default'];
?>
<div class="sort">
    <div class="row">
        <div class="col-md-7 text-left">
            <span class="sort-text hidden-md hidden-sm hidden-xs">Сортировать по: </span>
            <div class="big-select">
                <select name="name" class="form-control selectpicker"  onchange="document.location=this.options[this.selectedIndex].value">
                    <option value="<?=Url::to(['catalog/list', 'id' => $category_id,  'sort' => '-shop_price.price']);?>">Цене (от дорогих к дешовым)</option>
                    <option <?=$price_sort_selected?> value="<?=Url::to(['catalog/list', 'id' => $category_id,  'sort' => 'shop_price.price']);?>">  Цене (от дешовых к дорогим)</option>
                </select>
            </div>
        </div>
        <div class="col-md-5 text-right hidden-sm hidden-xs">
            <span class="sort-text hidden-md">Товаров на странице: </span>
            <div class="small-select">
                <select name="name" class="form-control selectpicker"  onchange="document.location=this.options[this.selectedIndex].value">
                    <?php
                    if (\Yii::$app->request->get('page_size') && in_array(\Yii::$app->request->get('page_size'), \Yii::$app->params['products_on_page']))
                        $selected_page_size = \Yii::$app->request->get('page_size');
                    else
                        $selected_page_size = $products_on_page_default;

                        foreach($products_on_page_config as $key=>$param) {
                        $selected =  $key == $selected_page_size ? " selected " : "";
                        ?>
                    <option <?=$selected?> value="<?=Url::to(['catalog/list', 'id' => $category_id,  'page_size' => $key]);?>"><?=$param?></option>
                    <? } ?>
                </select>
            </div>
        </div>
    </div>
</div>
