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
	    ],
	],

];
