<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),  
    'controllerNamespace' => 'api\controllers',  
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => yii\web\Response::FORMAT_JSON
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => false,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                //['class' => 'yii\rest\UrlRule', 'controller' => 'autos'],
                // CRUD Controllers
                'HEAD <apiv:v\d+>/<controller:\w+>'              => '<apiv>/<controller>/Index',
                'GET <apiv:v\d+>/<controller:\w+>'               => '<apiv>/<controller>/Index',
                'HEAD <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'   => '<apiv>/<controller>/View',
                'GET <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'    => '<apiv>/<controller>/View',
                'POST <apiv:v\d+>/<controller:\w+>'              => '<apiv>/<controller>/Create', 
                'PUT <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'    => '<apiv>/<controller>/Update',
                'PATCH <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'  => '<apiv>/<controller>/Update',
                'DELETE <apiv:v\d+>/<controller:\w+>/<id:(\d)+>' => '<apiv>/<controller>/Delete',  

            ]
        ]
    ],
    'params' => $params,
];