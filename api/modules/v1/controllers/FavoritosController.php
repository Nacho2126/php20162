<?php

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;
use backend\models\Favoritos;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\web\HttpException;


class FavoritosController extends ActiveController
{
    public $modelClass = 'backend\models\Favoritos';
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }
    public function auth($username, $password)
    {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = User::findByUsername($username);
        if(!$username || !$password || !$user)
            //return false;
            //OR
            throw new UserException( "There is an error!" );
        if ($user->validatePassword($username, $password)) 
            return $user;
        else
            //return false;
            //OR
            throw new HttpException( 500, "Error en username or password!" );
    }

}
?>