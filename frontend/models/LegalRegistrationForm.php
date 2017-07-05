<?php


namespace frontend\models;

use common\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use common\models\User;

class LegalRegistrationForm extends BaseRegistrationForm
{
    /* @var integer */
    public $phone;

    /* @var string */
    public $address_fact;

    /* @var string */
    public $address_legal;

    /* @var string */
    public $legal_name;

    /* @var integer */
    public $ogrn;

    /* @var integer */
    public $inn;

    /* @var string */
    public $kpp;

    /* @var string */
    public $contact_name;

    /* @var integer */
    public $fax;

    /* @var string */
    public $repeat_password;

    public function formName()
    {
        return 'LegalRegistrationForm';
    }


    public function rules()
    {
        $rules = parent::rules();

        $rules['required'] = [['phone', 'address_fact', 'legal_name', 'ogrn', 'inn', 'address_legal', 'kpp', 'contact_name', 'fax'], 'required'];

        $rules[] = [['contact_name',  'address_fact', 'legal_name',  'address_legal' ], 'string', 'max' => 255];
        $rules[] = ['kpp', 'string', 'max' => 9];
        $rules[] = [['phone', 'ogrn', 'inn', 'fax'], 'number'];

        $rules[] = ['repeat_password', 'required'];
        $rules[] = ['repeat_password', 'compare', 'compareAttribute' => 'password'];

        return $rules;
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['address_fact'] = \Yii::t('common', 'Фактический адрес');
        $labels['address_legal'] = \Yii::t('common', 'Юридический адрес');
        $labels['legal_name'] = \Yii::t('common', 'Юридическое название');
        $labels['ogrn'] = \Yii::t('common', 'ОГРН');
        $labels['inn'] = \Yii::t('common', 'ИНН');
        $labels['kpp'] = \Yii::t('common', 'КПП');
        $labels['contact_name'] = \Yii::t('common', 'Контактное лицо (ФИО)');
        $labels['fax'] = \Yii::t('common', 'Факс');
        $labels['phone'] = \Yii::t('common', 'Телефон');

        $labels['repeat_password'] = 'Повторите пароль';
        return $labels;
    }

    /**
     * @inheritdoc
     */
    public function loadAttributes(\dektrium\user\models\User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setScenario(Profile::SCENARIO_LEGAL_REGISTRATION);
        $profile->attributes = $this->attributes;

        $user->setProfile($profile);
    }


}