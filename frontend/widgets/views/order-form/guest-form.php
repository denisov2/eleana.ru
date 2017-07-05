<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<?php if (Yii::$app->session->hasFlash('orderError')) { ?>
    <script>
        alert('<?= Yii::$app->session->getFlash('orderError') ?>');
    </script>
<?php } ?>

<div class="order-des order-confirm">

    <div class="text-center  info info-guest">

        <div class="order__title">
            Купить как гость
        </div>
        <span>Оформляйте заказ без регистрации. Аккаунт будет создан автоматически</span>
    </div>

    <div class=" text-center  info">
        <span>Уже зарегистрированы? Введите свой логин и пароль.</span>
        <div class="clear-fix"></div>
        <?= Html::a('Войти как клиент', '/user/login', ['class' => 'btn con-shop ']); ?>
    </div>
    <div class=" text-center  info">
        <span>Зарегистрируйтесь как клиент, чтобы получить персональную СКИДКУ</span>
        <div class="clear-fix"></div>
        <?= Html::a('Зарегистрироваться', '/user/register', ['class' => 'btn contents-btn']); ?>
    </div>
    <div class="clear-fix"></div>


    <div class="pistol88_order_form">
        <?php $form = ActiveForm::begin(['action' => Url::toRoute(['/order/order/customer-create'])]); ?>

        <div style="display: none;">
            <?php if (yii::$app->has('organization') && $organization = yii::$app->organization->get()) { ?>
                <?= $form->field($orderModel, 'organization_id')->label(false)->textInput(['value' => $organization->id]) ?>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-lg-6"><?= $form->field($orderModel, 'client_name')->textInput(['required' => true]) ?></div>
            <div class="col-lg-3"><?= $form->field($orderModel, 'phone')->textInput(['required' => true]) ?></div>
            <div
                class="col-lg-3"><?= $form->field($orderModel, 'email')->textInput(['required' => true, 'type' => 'email']) ?></div>
        </div>

        <div class="row">
            <?php if ($shippingTypes) { ?>
                <div class="col-md-6 order-widget-shipping-type">
                    <?= $form->field($orderModel, 'shipping_type_id')->dropDownList($shippingTypes) ?>
                    <script>
                        shippintTypeCost = [];
                        <?php foreach($shippingTypesList as $sht) { ?>
                        shippintTypeCost[<?=$sht->id;?>] = <?=(int)$sht->cost;?>;
                        <?php } ?>
                    </script>
                </div>
            <?php } ?>

            <?php if ($paymentTypes) { ?>
                <div class="col-md-6">
                    <?= $form->field($orderModel, 'payment_type_id')->dropDownList($paymentTypes) ?>
                </div>
            <?php } ?>
        </div>

        <?php if ($fields = $fieldFind->all()) { ?>
            <div class="row order-custom-fields">
                <?php foreach ($fields as $fieldModel) { ?>
                    <div class="col-lg-12 col-xs-12 order-custom-field-<?= $fieldModel->id; ?>">
                        <?php
                        if ($widget = $fieldModel->type->widget) {
                            echo $widget::widget(['form' => $form, 'fieldModel' => $fieldModel]);
                        } else {
                            echo $form->field($fieldValueModel, 'value[' . $fieldModel->id . ']')->label($fieldModel->name)->textInput(['required' => ($fieldModel->required == 'yes')]);
                        }
                        ?>
                        <?php if ($fieldModel->description) { ?>
                            <p>
                                <small><?= $fieldModel->description; ?></small>
                            </p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12"><?= $form->field($orderModel, 'comment')->textArea() ?></div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?= Html::submitButton(Yii::t('common', 'Оформить заказ'), ['class' => 'btn contents-btn']) ?>
                <?php if ($referrer = Yii::$app->request->referrer) { ?>
                    <?= Html::a(Yii::t('common', 'Продолжить покупки'), Html::encode($referrer), ['class' => 'btn con-shop']) ?>
                <?php } ?>


            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>