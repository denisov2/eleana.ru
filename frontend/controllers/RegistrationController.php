<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace frontend\controllers;

use dektrium\user\Finder;
use dektrium\user\models\RegistrationForm;
use dektrium\user\models\ResendForm;
use dektrium\user\models\User;
use dektrium\user\traits\AjaxValidationTrait;
use dektrium\user\traits\EventTrait;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use frontend\models\LegalRegistrationForm;
use frontend\models\EntrepreneurRegistrationForm;
use frontend\models\IndividualRegistrationForm;
use Yii;

use \dektrium\user\controllers\RegistrationController as BaseRegistrationController;

/**
 * RegistrationController is responsible for all registration process, which includes registration of a new account,
 * resending confirmation tokens, email confirmation and registration via social networks.
 *
 * @property \dektrium\user\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationController extends BaseRegistrationController
{
    const EVENT_BEFORE_REGISTER_1 = 'beforeRegister1';
    const EVENT_BEFORE_REGISTER_2 = 'beforeRegister2';
    const EVENT_BEFORE_REGISTER_3 = 'beforeRegister3';

    const EVENT_AFTER_REGISTER_1 = 'afterRegister1';
    const EVENT_AFTER_REGISTER_2 = 'afterRegister2';
    const EVENT_AFTER_REGISTER_3 = 'afterRegister3';

    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model1 = new LegalRegistrationForm();
        $model2 = new EntrepreneurRegistrationForm();
        $model3 = new IndividualRegistrationForm();

        $event1 = $this->getFormEvent($model1);
        $event2 = $this->getFormEvent($model2);
        $event3 = $this->getFormEvent($model3);

        $this->trigger(self::EVENT_BEFORE_REGISTER_1, $event1);
        $this->trigger(self::EVENT_BEFORE_REGISTER_2, $event2);
        $this->trigger(self::EVENT_BEFORE_REGISTER_3, $event3);

        $this->performAjaxValidation($model1);
        $this->performAjaxValidation($model2);
        $this->performAjaxValidation($model3);

        $legal_registration = null;
        $entrepreneur_registration = null;
        $individual_registration = null;

        if ($model1->load(\Yii::$app->request->post()) && $model1->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER_1, $event1);
            $legal_registration = true;
        }

        if ($model2->load(\Yii::$app->request->post()) && $model2->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER_2, $event2);
            $entrepreneur_registration = true;
        }

        if ($model3->load(\Yii::$app->request->post()) && $model3->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER_3, $event3);
            $individual_registration = true;
        }

        if (Yii::$app->request->isPost) {
            if ($legal_registration || $entrepreneur_registration || $individual_registration) {
                return $this->render('/message', [
                    'title' => Yii::t('user', 'Your account has been created'),
                    'module' => $this->module,
                ]);
            } else
                Yii::$app->getSession()->setFlash('error', Yii::t('common', 'Произошла ошибка при заполнении профиля. Испрашьте неправильные данные и повторите попытку.'));
        }

        return $this->render('register', [
            'model1' => $model1,
            'model2' => $model2,
            'model3' => $model3,
            'module' => $this->module,
        ]);
    }


}
