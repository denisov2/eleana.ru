<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'currency' => [
            'class' => 'frontend\components\Currency',
        ],

        'fileStorage' => [
            'class' => '\trntv\filekit\Storage',
            'baseUrl' => '@storageUrl/source',
            'filesystem' => function () {
                $adapter = new \League\Flysystem\Adapter\Local(dirname(dirname(__DIR__)) . '/frontend/web/images/source');
                return new League\Flysystem\Filesystem($adapter);
            },
        ],

        'cart' => [
            'class' => 'dvizh\cart\Cart',
            'currency' => 'руб', //Валюта
            'currencyPosition' => 'after', //after или before (позиция значка валюты относительно цены)
            'priceFormat' => [0, '.', ''], //Форма цены
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.ukraine.com.ua',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'eleana@foxauto.xyz',
                'password' => 'Ha4Vd5ONo78z',
                'port' => '25', // Port 25 is a very common port too
                //'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],

        'config' => [ // сам компонент прописываем
            'class' => 'common\components\Config',
        ],
    ],

    'modules' => [


        'user' => [
            'class' => \dektrium\user\Module::className(),

            'modelMap' => [
                'User' => 'common\models\User',
                'Profile' => 'common\models\Profile',
                'RegistrationForm' => 'frontend\models\RegistrationForm',

            ],
            'controllerMap' => [
                'admin' => 'backend\controllers\AdminController',
                'registration' => '\frontend\controllers\RegistrationController',

            ],

            /*
            'controllerMap' => [
                'registration' => [
                    'class' => \dektrium\user\controllers\RegistrationController::className(),
                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_REGISTER => function ($e) {
                        Yii::$app->response->redirect(array('/user/security/login'))->send();
                        Yii::$app->end();
                    }
                ],
            ],

			*/

            // you will configure your module inside this file
            // or if need different configuration for frontend and backend you may
            // configure in needed configs

            'mailer' => [
                'sender' => 'eleana@foxauto.xyz', // or ['no-reply@myhost.com' => 'Sender name']
                //'viewPath' => '@app/themes/swable/views/user/mail',

            ],


        ],


        'cart' => [
            'class' => 'dvizh\cart\Module',
        ],

        'treemanager' => [
            'class' => '\kartik\tree\Module',


        ],

        'shop' => [
            'class' => 'dvizh\shop\Module',
            'adminRoles' => ['@'],
        ],

        'order' => [
            'class' => \dvizh\order\Module::className(),

            /*
            'modelMap' => [
                'Order' => 'common\models\Order',
            ],
            */
            // 'layoutPath' => 'frontend\views\layouts',
            'successUrl' => '/page/thanks', //Страница, куда попадает пользователь после успешного заказа
           // 'ordersEmail' => 'denisov.dmitriy@gmail.com', //Мыло для отправки заказов
            'robotEmail' => 'eleana@foxauto.xyz',
            'adminRoles' => ['@'],


        ],


        'filter' => [
            'class' => 'dvizh\filter\Module',
            'adminRoles' => ['@'],
            'relationFieldName' => 'category_id',
            'relationFieldValues' =>
                function () {
                    $all_categories = \dvizh\shop\models\Category::buildTextTree();
                    //var_dump(  $all_categories );
                    return $all_categories ;
                },
        ],
        'field' => [
            'class' => 'dvizh\field\Module',
            'relationModels' => [
                'dvizh\shop\models\Product' => 'Продукты',
                'dvizh\shop\models\Category' => 'Категории',
                'dvizh\shop\models\Producer' => 'Производители',
            ],
            'adminRoles' => ['@'],
        ],
        'relations' => [
            'class' => 'dvizh\relations\Module',
            'fields' => ['code'],
        ],
        'gallery' => [
            'class' => 'dvizh\gallery\Module',
            'imagesStorePath' => dirname(dirname(__DIR__)) . '/storage/web/images/store',
            'imagesCachePath' => dirname(dirname(__DIR__)) . '/storage/web/images/cache',
            'graphicsLibrary' => 'GD',
            'placeHolderPath' => dirname(dirname(__DIR__)) . '/storage/web/images/placeHolder.png',
            'adminRoles' => ['@'],
        ],


    ],

];
