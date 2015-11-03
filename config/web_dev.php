<?php

$params = require(__DIR__ . '/params_dev.php');

$config = [
    'id' => 'app',
	// Preload the Debug Module
    'basePath' => dirname(__DIR__),
//	'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'bootstrap' => [
    	'log',
    	'debug',
    	'gii',
	],
	'language'=>'fr',
    'components' => [
		// UrlManager

		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			
			// Disable index.php
			'showScriptName' => false,
			
			// Disable r= routes
			'enablePrettyUrl' => true,
		],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'z42EIXBd1y62h-KsOmUW36HJXr67RZdp',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
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
    	'fn' => [
            'class' => 'app\components\Fn',
    	],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db_dev.php'),
    ],

	// Modules
	'modules' => [
		'debug' => [
	        'class' => 'yii\debug\Module',
	    ],
		'gii'   => [
	        'class' => 'yii\gii\Module',
			'allowedIPs' => ['127.0.0.1', '::1', '10.1.1.*', '184.163.110.10'],
	    ],
	],
    'params' => $params,
];
/*
if (YII_ENV_DEV) {
	
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
		'allowedIPs' => ['127.0.0.1', '::1', '10.1.1.*', '184.163.110.10'],
    ];
}
*/
return $config;
