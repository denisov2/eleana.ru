<?php
/* @var $this yii\web\View */

$this->title = \Yii::$app->name;
?>
<?= $this->renderFile('@frontend/views/partial/left.php'); ?>

<div class="col-md-10 main-content">

    <?= $this->renderFile('@frontend/views/partial/carousel-home-one.php'); ?>


    <div class="content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#new" aria-controls="home" role="tab"
                                                      data-toggle="tab">НОВИНКИ</a></li>
            <li role="presentation"><a href="#stock" aria-controls="profile" role="tab" data-toggle="tab">АКЦИИ</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="new">
                <?= $this->renderFile('@frontend/views/partial/carousel-new-products.php'); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="stock">
                <?= $this->renderFile('@frontend/views/partial/carousel-sales-products.php'); ?>
            </div>
        </div>
    </div>

    <?= $this->renderFile('@frontend/views/partial/carousel-home-second.php'); ?>


</div>
