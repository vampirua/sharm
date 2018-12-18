<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')

);


return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [


        'admin' => [
            'class' => 'nullref\admin\Module',
            'controllerMap' => [
                'main' => [
                    'class' => 'backend\modules\admin\controllers\MainController'
                ]
            ]
        ],

        'product' => [
            'class' => 'backend\modules\product\Module',
        ],

        'category' => [
            'class' => 'nullref\category\Module',
        ],
        'vendor' => [
            'class' => 'backend\modules\vendor\Module',
        ],
        'positionn' => [
            'class' => 'backend\modules\position\Module',
        ],
        'catalog' => [
            'class' => 'backend\modules\catalog\Module',
        ],
        'order' => [
            'class' => 'backend\modules\order\Module',
        ],
        'color' => [
            'class' => 'backend\modules\color\Module',
        ],
        'statusproduct' => [
            'class' => 'backend\modules\statusproduct\Module',
        ],
        'statusorder' => [
            'class' => 'backend\modules\statusorder\Module',
        ],

    ],
    'components' => [
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'my_application_cart',
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'registration/<action:\w+>' => 'user/registration/<action:\w+>',
                'catalog/<action:\w+>' => 'catalog/default/<action>',
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => ['class' => 'yii\i18n\PhpMessageSource'],
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],


    ],

    'params' => $params,
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'uploads',
                'name' => 'uploads'
            ],
            'watermark' => [
                'source' => __DIR__ . '/logo.png', // Path to Water mark image
                'marginRight' => 5,          // Margin right pixel
                'marginBottom' => 5,          // Margin bottom pixel
                'quality' => 95,         // JPEG image save quality
                'transparency' => 70,         // Water mark image transparency ( other than PNG )
                'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200         // Target image minimum pixel size
            ]
        ]
    ],
];
