<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
use yii\helpers\Url;
?>
<?php /** @var $model \common\models\Product */ ?>
<div class="col-xs-12 well">
    <div class="col-xs-2">
        <?php
        $images = $model->images;

        if (isset($images[0])) {
            echo Html::img($images[0]->getUrl(), ['width' => '100%']);
        }
        ?>
    </div>
    <div class="col-xs-6">
        <h2><a href="<?=Url::to(['product/view' , 'id' => $model->id ]);?>">
           <?= Html::encode($model->title) ?></a></h2>
        <?= Markdown::process($model->desc) ?>
    </div>

    <div class="col-xs-4 price">
        <div class="row">
            <div class="col-xs-12">$<?= $model->price ?></div>
            <div class="col-xs-12"></div>
        </div>
    </div>
</div>