<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'id' => 'money',
    'name' => 'Money',
    'vendorPath' => HOME . 'vendor',
    'basePath' => HOME.'protected',
    'timeZone' => 'Europe/Moscow',
    'controllerNamespace' => 'controllers',
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationTable' => '_migration',
            'interactive' => false
        ]
    ],
    'modules'   => [
        'debug' => ['class' => 'yii\debug\Module','allowedIPs'=>['*']],
        'gii'   => ['class' => 'yii\gii\Module'],
    ],
    'aliases' => [
        '@web' => dirname(dirname(__DIR__)).'/public',
        '@common' => dirname(__DIR__).'',
        '@backend' => dirname(__DIR__) . '',
        '@controllers' => dirname(__DIR__) . '',
        '@bower' =>  dirname(dirname(__DIR__)) . '/vendor/bower-asset',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=money',
            'username' => 'develop',
            'password' => 'develop@box',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'f1n861g104fvf-p13f1fv1cv19731c13-[mt',
        ],
        'user' => [
            'identityClass' => 'models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['login/index']
        ],
        'session' => [
            'name' => 'SESSID',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'hashCallback' => function($path){
                $path = (is_file($path) ? dirname($path) : $path);

                return sprintf('%x', crc32($path . Yii::getVersion()));
            }
        ],
        'errorHandler' => [
            'errorAction' => 'error/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
        'authManager' => [
            'class' => 'components\AuthManager',
        ]
    ],
    'params'         => array(
        'debug'     => true,
    ),
);