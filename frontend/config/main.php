<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'Eleana Design - Дизайн с иголочки!',
    'basePath' => dirname(__DIR__),
    'sourceLanguage' => 'ru',
    'language' => 'ru',


    'bootstrap' => ['log', 'config'],
    'homeUrl' => '/',
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'layout' => 'eleana-main',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/'
        ],
        /*
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        */
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        /*
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'my_application_cart',
        ],


        'cart' => [
            'class' => 'frontend\components\Cart',
        ],
        */



        //...


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/',
            'rules' => [
                'search' => 'site/search',
                'page/<slug:\w+>'=>'page/show',

            ],
        ],

        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
                    '@dvizh/cart/views' => '@app/views/cart'
                ],
            ],
        ],

        'assetManager' => [
            'linkAssets' => true,
        ],


    ],
    'modules' => [
        'user' => [
            // following line will restrict access to admin controller from frontend application
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
        ],


    ],
    'params' => $params,
];
