<?php
return [
    'language' => 'es',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
          'i18n' => [
        'translations' => [
            'frontend*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@common/messages',
            ],
            'backend*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@common/messages',
            ],
        ],
    ],


        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
	    'user' => [
		'class' => 'dektrium\user\Module',
        'admins' => ['jmrsm01'],
        /*'modelMap' => [
                'User' => 'common\models\User',
                'RegistrationForm' => 'common\models\RegistrationForm',
            ]*/
	    ],
	],
    /*'authClientCollection' => [
        'class'   => \yii\authclient\Collection::className(),
        /*'clients' => [
            'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
        ],
    ],*/

];
