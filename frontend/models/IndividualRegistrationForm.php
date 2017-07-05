<?php


namespace frontend\models;

use common\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use common\models\User;

class IndividualRegistrationForm extends BaseRegistrationForm
{
    /* @var string */
    public $first_name;

    /* @var string */
    public $last_name;

    /* @var string */
    public $father_name;

    /* @var integer */
    public $phone;

    /* @var integer */
    public $address_fact;

    /* @var string */
    public $repeat_password;


    public function formName()
    {
        return 'IndividualRegistrationForm';
    }





    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();

        $rules['required'] = [['phone', 'first_name', 'last_name', 'father_name', 'address_fact', ], 'required'];

        $rules[] = [['first_name',  'last_name', 'father_name', 'address_fact' ], 'string', 'max' => 255];
        $rules[] = [['phone'], 'number'];

        $rules[] = ['repeat_password', 'required'];
        $rules[] = ['repeat_password', 'compare', 'compareAttribute' => 'password'];
        return $rules;
    }



    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['first_name'] = \Yii::t('common', 'Имя');
        $labels['last_name'] = \Yii::t('common', 'Фамилия');
        $labels['father_name'] = \Yii::t('common', 'Отчество');
        $labels['address_fact'] = \Yii::t('common', 'Адрес');
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
        $profile->setScenario(Profile::SCENARIO_INDIVIDUAL_REGISTRATION);
        $profile->attributes = $this->attributes;



        $user->setProfile($profile);
    }
}