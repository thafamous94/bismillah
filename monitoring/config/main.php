<?php

use kartik\datecontrol\Module;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-monitoring',
    'name'=> $params['nama_sistem'],
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'monitoring\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'asesor' => [
            'class' => 'monitoring\modules\asesor\Asesor',
        ],
        'eksekutif' => [
            'class' => 'monitoring\modules\eksekutif\Eksekutif',
            'modules'=>[
                'eksekutif-prodi' => [
                    'class' => 'monitoring\modules\eksekutif\modules\prodi\Prodi',
                ],
                'eksekutif-fakultas'=>[
                    'class'=>'monitoring\modules\eksekutif\modules\fakultas\Fakultas'
                ],
                'eksekutif-institusi' => [
                    'class' => 'monitoring\modules\eksekutif\modules\institusi\Institusi',
                ],
            ]
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd MMMM yyyy',
                Module::FORMAT_TIME => 'HH:mm:ss',
                Module::FORMAT_DATETIME => 'dd MMMM yyyy HH:mm:ss',
            ],
            'saveTimezone' => 'Asia/Jakarta',
            'displayTimezone' => 'Asia/Jakarta',
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
                Module::FORMAT_TIME => 'php:U',
                Module::FORMAT_DATETIME => 'php:U',
            ],


            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'profile' => [
            'class' => 'common\modules\profile\Profile'
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-monitoring',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-monitoring', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the monitoring
            'name' => 'advanced-monitoring',
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
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' =>[
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],

        'assetManager'=>[
            'bundles'=>[
                'yii\bootstrap4\BootstrapAsset'=>[
                    'sourcePath' => '@common/assets/metronic/assets',

                    'css'=>['css/demo1/style.bundle.css']
                ]
            ]
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login',
            'site/error',
            'site/logout',
            'datecontrol/*',
            'grid/*'
//            'admin/*',
//            'debug/*',
//            'sertifikat/*',
//            'sertifikat-perguruan-tinggi/*',
//            'sertifikat/*',
//            'sertifikat-prodi/*'
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    'params' => $params,
];
