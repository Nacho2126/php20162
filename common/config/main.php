<?php
return [
    'language' => 'es',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        /*'authClientCollection' => [
        'class'   => 'yii\authclient\Collection::className()',
        'facebook' => [
                'class'        => 'dektrium\user\clients\Facebook',
                'clientId'     => '1196216720447894',
                'clientSecret' => '923d56895e0ae6c96acb226122f4d6aa',
            ],
        ],*/
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
    

];
