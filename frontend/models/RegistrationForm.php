<?php


namespace frontend\models;

use common\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use common\models\User;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * Add a new field
     * @var string
     */
    public $name;
    public $repeat_password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();

        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];

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
        $labels['name'] = \Yii::t('common', 'Имя');
        $labels['repeat_password'] = 'Повторите пароль';
        return $labels;
    }

    /**
     * @inheritdoc
     */
    public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'name' => $this->name,
        ]);
        $user->setProfile($profile);
    }
}