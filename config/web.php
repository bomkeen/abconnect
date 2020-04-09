<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
     'language'=>'th_TH',
   //'name'=>' <img style="height:40px; margin-top:12px;" src="./img/budget.png"> invoice',
    'name'=>'AB Minicommerce',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
         'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bgOdUZI_ZNpNG6eGP0nDoQcQZVAbfZ_G',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 657567576,
            'enableSession' => true,
            'autoRenewCookie' => true
        
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
         'markdown' => [
            'class' => 'kartik\markdown\Module',
            // the controller action route used for markdown editor preview
                   'previewAction' => '/markdown/parse/preview',

                   // the controller action route used for downloading the markdown exported file
                   'downloadAction' => '/markdown/parse/download',

                   // the list of custom conversion patterns for post processing
                   'customConversion' => [
                       '<table>' => '<table class="table table-bordered table-striped">'
                   ],

                   // whether to use PHP SmartyPantsTypographer to process Markdown output
                   'smartyPants' => true,
        ],
         'datecontrol' =>  [
             'class' => '\kartik\datecontrol\Module',
          //   'displayTimezone' => 'Asia/Bangkok',
        //     'saveTimezone'=>'UTC',
         ]
        
        ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
