<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
//use common\models\Languages;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use common\models\Cities;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var  frontend\models\LegalRegistrationForm $model1
 * @var  frontend\models\EntrepreneurRegistrationForm $model2
 * @var  frontend\models\IndividualRegistrationForm $model3
 * @var dektrium\user\Module $module
 */


$this->title = Yii::t('common', 'Регистрация нового клиента');
$this->params['breadcrumbs'][] = $this->title;
$js = <<<JS
     $( "#tabs" ).tabs();
JS;
$this->registerJs($js, yii\web\View::POS_READY);


?>

<div class="orenda">
    <div class="container">
        <div class="row">
            <div class="orenda-block">
                <div class="orenda-hed">

                    <hr>

                </div>
                <div class="orenda-content">
                    <div class="container">


                        <div class="row">


                            <div class="registration-form-wrapper col-lg-8 col-md-8 col-sm-10  col-xs-12 col-lg-offset-2 col-md-offset-1 col-xs-12 ">

                                <div class="registration-header">
                                    <h2><?= Html::encode($this->title) ?></h2>
                                    <p>Регистрация необходима для заказа товара и доступа в личный кабинет.<br>
                                    Внимание! Пожалуйста, используйте реальные данные при регистрации, чтобы избежать проблем с приобритением товара и осуществление платежей.</p>

                                </div>
                                <div id="tabs">
                                    <ul>
                                        <li><a href="#tabs-1">Юридическое лицо</a></li>
                                        <li><a href="#tabs-2">Индивидуальный предприниматель</a></li>
                                        <li><a href="#tabs-3">Физическое лицо</a></li>
                                    </ul>
                                    <div id="tabs-1">
                                        <h4>Контактная информация</h4><br> 
                                        <div class="registration-form ">
                                            <?= \frontend\widgets\Alert::widget() ?>

                                            <?php $form = ActiveForm::begin([
                                                'id' => 'registration-form-1',
                                                'enableClientValidation' => true,
                                                'enableAjaxValidation' => true,
                                                'validateOnSubmit' => true,
                                                'validateOnChange' => true,
                                                'validateOnType' => true,
                                                'options' => ['class' => 'form-horizontal'],
                                                'fieldConfig' => [
                                                    'template' => '{label}<div class="col-sm-8">{input}{error}</div>',
                                                    'labelOptions' => ['class' => 'col-sm-4 control-label'],
                                                    'errorOptions' => ['class' => 'help-block help-block-error', 'style' => 'margin-bottom:0px;'],
                                                ],
                                            ]); ?>


                                            <?= $form->field($model1, 'legal_name') ?>

                                            <?= $form->field($model1, 'ogrn') ?>

                                            <?= $form->field($model1, 'inn') ?>

                                            <?= $form->field($model1, 'kpp') ?>

                                            <?= $form->field($model1, 'contact_name') ?>

                                            <?= $form->field($model1, 'phone') ?>

                                            <?= $form->field($model1, 'fax') ?>

                                            <?= $form->field($model1, 'address_legal') ?>

                                            <?= $form->field($model1, 'address_fact') ?>

                                            <?= $form->field($model1, 'email') ?>

                                            <?= $form->field($model1, 'username') ?>








                                            <?php if ($module->enableGeneratingPassword == false): ?>
                                                <?= $form->field($model1, 'password')->passwordInput() ?>
                                            <?php endif ?>
                                            <?= $form->field($model1, 'repeat_password')->passwordInput() ?>

                                            <button type="submit" class="btn btn-red">Регистрация</button>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                    <div id="tabs-2">
                                        <h4>Контактная информация</h4><br>
                                        <div class="registration-form ">
                                            <?= \frontend\widgets\Alert::widget() ?>

                                            <?php $form = ActiveForm::begin([
                                                'id' => 'registration-form-2',
                                                'enableClientValidation' => true,
                                                'enableAjaxValidation' => true,
                                                'validateOnSubmit' => true,
                                                'validateOnChange' => true,
                                                'validateOnType' => true,
                                                'options' => ['class' => 'form-horizontal'],
                                                'fieldConfig' => [
                                                    'template' => '{label}<div class="col-sm-8">{input}{error}</div>',
                                                    'labelOptions' => ['class' => 'col-sm-4 control-label'],
                                                    'errorOptions' => ['class' => 'help-block help-block-error', 'style' => 'margin-bottom:0px;'],
                                                ],
                                            ]); ?>

                                            <?= $form->field($model2, 'first_name') ?>
                                            <?= $form->field($model2, 'last_name') ?>
                                            <?= $form->field($model2, 'father_name') ?>
                                            <?= $form->field($model2, 'phone') ?>
                                            <?= $form->field($model2, 'inn') ?>

                                            <?= $form->field($model2, 'username') ?>
                                            <?= $form->field($model2, 'email') ?>

                                            <?php if ($module->enableGeneratingPassword == false): ?>
                                                <?= $form->field($model2, 'password')->passwordInput() ?>
                                            <?php endif ?>
                                            <?= $form->field($model2, 'repeat_password')->passwordInput() ?>
                                            <button type="submit" class="btn btn-red">Регистрация</button>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                    <div id="tabs-3">
                                        <h4>Контактная информация</h4><br>
                                        <div class="registration-form">
                                            <?= \frontend\widgets\Alert::widget() ?>

                                            <?php $form = ActiveForm::begin([
                                                'id' => 'registration-form-3',
                                                'enableClientValidation' => true,
                                                'enableAjaxValidation' => true,
                                                'validateOnSubmit' => true,
                                                'validateOnChange' => true,
                                                'validateOnType' => true,
                                                'options' => ['class' => 'form-horizontal'],
                                                'fieldConfig' => [
                                                    'template' => '{label}<div class="col-sm-8">{input}{error}</div>',
                                                    'labelOptions' => ['class' => 'col-sm-4 control-label'],
                                                    'errorOptions' => ['class' => 'help-block help-block-error', 'style' => 'margin-bottom:0px;'],
                                                ],
                                            ]); ?>

                                            <?= $form->field($model3, 'first_name') ?>
                                            <?= $form->field($model3, 'last_name') ?>
                                            <?= $form->field($model3, 'father_name') ?>
                                            <?= $form->field($model3, 'phone') ?>
                                            <?= $form->field($model3, 'address_fact') ?>

                                            <?= $form->field($model3, 'username') ?>
                                            <?= $form->field($model3, 'email') ?>

                                            <?php if ($module->enableGeneratingPassword == false): ?>
                                                <?= $form->field($model3, 'password')->passwordInput() ?>
                                            <?php endif ?>
                                            <?= $form->field($model3, 'repeat_password')->passwordInput() ?>
                                            <button type="submit" class="btn btn-red">Регистрация</button>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                </div>








                            </div>

                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p></p>

                            <p class="text-center">
                                <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
                            </p>

                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
</div>
</div>
