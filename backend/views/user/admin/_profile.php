<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $user
 * @var common\models\Profile $profile
 */
?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php


$form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?= $form->field($profile, 'first_name') ?>
<?= $form->field($profile, 'last_name') ?>
<?= $form->field($profile, 'father_name') ?>
<?= $form->field($profile, 'phone') ?>
<?= $form->field($profile, 'fax') ?>
<?= $form->field($profile, 'address_fact') ?>
<?= $form->field($profile, 'address_legal') ?>
<?= $form->field($profile, 'legal_name') ?>
<?= $form->field($profile, 'ogrn') ?>
<?= $form->field($profile, 'inn') ?>
<?= $form->field($profile, 'kpp') ?>
<?= $form->field($profile, 'contact_name') ?>


<?= $form->field($profile, 'public_email') ?>
<?= $form->field($profile, 'website') ?>
<?= $form->field($profile, 'location') ?>
<?= $form->field($profile, 'gravatar_email') ?>
<?= $form->field($profile, 'bio')->textarea() ?>

<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
