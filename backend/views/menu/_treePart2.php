<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 02.03.2017
 * Time: 18:36
 */

?>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group field-menu-name required">
                <?= $form->field($node, 'item_type')->dropDownList(\common\models\Menu::getMenuTypes()); ?>

                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group field-menu-name required">
                <?php
                $products = \common\models\Product::find()->all();
                $products_items = \yii\helpers\ArrayHelper::map($products,'id','title');
                $params = ['prompt' => 'Выберите продукт'];
                echo $form->field($node, 'item_id')->dropDownList($products_items, $params);
                ?>
                <div class="help-block"></div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="form-group field-menu-id">
                <?= $form->field($node, 'description')->textArea(); ?>
                <div class="help-block"></div>
            </div>
        </div>
    </div>

