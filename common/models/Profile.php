<?php
namespace common\models;

use dektrium\user\models\Profile as BaseProfile;

class Profile extends BaseProfile
{
    /*
     *  * This is the model class for table "profile".
     *
     * @property integer $user_id
     * @property string  $full_name
     * @property string  $first_name
     * @property string  $last_name
     * @property string  $father_name
     * @property string  $public_email
     * @property string  $gravatar_email
     * @property string  $gravatar_id
     * @property string  $location
     * @property string  $website
     * @property string  $bio
     * @property string  $timezone
     * @property string  $card_number
     * @property string  $phone
     * @property User    $user
     *
     */
    const SCENARIO_SOCIAL = 'social';
    const SCENARIO_LEGAL_REGISTRATION = 'legal_registration';
    const SCENARIO_ENTREPRENEUR_REGISTRATION = 'entrepreneur_registration';
    const SCENARIO_INDIVIDUAL_REGISTRATION = 'individual_registration';
    const SCENARIO_ADMIN_UPDATE = 'admin_update';
    const SCENARIO_ADMIN_UPDATE_DISCOUNT = 'admin_update_discount';

    public static function tableName()
    {
        return '{{profile}}';
    }


    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][] = 'first_name';

        $scenarios['update'][] = 'first_name';

        $scenarios['register'][] = 'address_fact';
        $scenarios['register'][] = 'address_legal';
        $scenarios['register'][] = 'legal_name';
        $scenarios['register'][] = 'ogrn';
        $scenarios['register'][] = 'inn';
        $scenarios['register'][] = 'kpp';
        $scenarios['register'][] = 'contact_name';
        $scenarios['register'][] = 'fax';
        $scenarios['register'][] = 'phone';

        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'address_fact';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'address_legal';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'legal_name';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'ogrn';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'inn';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'kpp';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'contact_name';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'fax';
        $scenarios[self::SCENARIO_LEGAL_REGISTRATION][] = 'phone';

        $scenarios[self::SCENARIO_ENTREPRENEUR_REGISTRATION][] = 'first_name';
        $scenarios[self::SCENARIO_ENTREPRENEUR_REGISTRATION][] = 'last_name';
        $scenarios[self::SCENARIO_ENTREPRENEUR_REGISTRATION][] = 'father_name';
        $scenarios[self::SCENARIO_ENTREPRENEUR_REGISTRATION][] = 'inn';
        $scenarios[self::SCENARIO_ENTREPRENEUR_REGISTRATION][] = 'phone';

        $scenarios[self::SCENARIO_INDIVIDUAL_REGISTRATION][] = 'first_name';
        $scenarios[self::SCENARIO_INDIVIDUAL_REGISTRATION][] = 'last_name';
        $scenarios[self::SCENARIO_INDIVIDUAL_REGISTRATION][] = 'father_name';
        $scenarios[self::SCENARIO_INDIVIDUAL_REGISTRATION][] = 'address_fact';
        $scenarios[self::SCENARIO_INDIVIDUAL_REGISTRATION][] = 'phone';

        $scenarios[self::SCENARIO_SOCIAL][] = 'first_name';

        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['first_name', 'last_name', 'father_name', 'inn' , 'phone',
                                                    'address_fact' ,'address_legal', 'legal_name', 'ogrn',
                                                    'kpp', 'contact_name', 'fax',
                                                    'public_email', 'gravatar_email', 'location', 'website', 'timezone', 'bio', ];

        $scenarios[self::SCENARIO_ADMIN_UPDATE_DISCOUNT] = ['discount'];

        return $scenarios;
    }


    public function attributeLabels()
    {
        $labels =  parent::attributeLabels();

        $labels['father_name'] =  \Yii::t('common', 'Отчество');
        $labels['public_email'] =  \Yii::t('common', 'Email (публичный)');
        $labels['gravatar_email'] =  \Yii::t('common', 'Gravatar email');
        $labels['location'] =  \Yii::t('common', 'Расположение');
        $labels['website'] =  \Yii::t('common', 'Сайт');
        $labels['timezone'] =  \Yii::t('common', 'Временная зона');
        $labels['bio'] = \Yii::t('common', 'Биография');
        $labels['address_fact'] = \Yii::t('common', 'Фактический адрес');
        $labels['address_legal'] = \Yii::t('common', 'Юридический адрес');
        $labels['legal_name'] = \Yii::t('common', 'Юридическое название');
        $labels['ogrn'] = \Yii::t('common', 'ОГРН');
        $labels['inn'] = \Yii::t('common', 'ИНН');
        $labels['kpp'] = \Yii::t('common', 'КПП');
        $labels['contact_name'] = \Yii::t('common', 'Контактное лицо (ФИО)');
        $labels['fax'] = \Yii::t('common', 'Факс');
        $labels['phone'] = \Yii::t('common', 'Телефон');

        /*
        $labels['first_name'] =  \Yii::t('common', 'Имя');
        $labels['last_name'] =  \Yii::t('common', 'Фамилия');
        $labels['father_name'] =  \Yii::t('common', 'Отчество');
        $labels['public_email'] =  \Yii::t('common', 'Email (публичный)');
        $labels['gravatar_email'] =  \Yii::t('common', 'Gravatar email');
        $labels['location'] =  \Yii::t('common', 'Расположение');
        $labels['website'] =  \Yii::t('common', 'Сайт');
        $labels['timezone'] =  \Yii::t('common', 'Временная зона');
        $labels['bio'] = \Yii::t('common', 'Биография');
        $labels['address_fact'] = \Yii::t('common', 'Фактический адрес');
        $labels['address_legal'] = \Yii::t('common', 'Юридический адрес');
        $labels['legal_name'] = \Yii::t('common', 'Юридическое название');
        $labels['ogrn'] = \Yii::t('common', 'ОГРН');
        $labels['inn'] = \Yii::t('common', 'ИНН');
        $labels['kpp'] = \Yii::t('common', 'КПП');
        $labels['contact_name'] = \Yii::t('common', 'Контактное лицо (ФИО)');
        $labels['fax'] = \Yii::t('common', 'Факс');
        $labels['phone'] = \Yii::t('common', 'Телефон');
        */
        return $labels;
    }

    public function getFullName() {

        return $this->last_name . ' ' . $this->first_name  . ' ' . $this->father_name;
    }
    public function getName() {

        return $this->last_name . ' ' . $this->first_name  . ' ' . $this->father_name;
    }




}