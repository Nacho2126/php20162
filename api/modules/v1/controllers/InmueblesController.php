<?php

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;
use backend\models\Inmuebles;

use yii\filters\auth\HttpBasicAuth;

class InmueblesController extends ActiveController
{
    public $modelClass = 'backend\models\Inmuebles';

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }*/

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['view']);
        return $actions;
    }

    public function actionView($id){
    	// $inmueble = new Inmuebles();
    	//var_dump($inmueble->primaryKey());die;
    	return Inmuebles::find()->where(['id' => $id])->one();
    }
    /*public function auth($username, $password)
    {
        $user = \app\models\User::findByUsername($username);
        if(!$username or !$password or !$user)
            //return false;
            //OR
            throw new UserException( "There is an error!" );
        if ($user->validatePassword($psw)) 
            return $user;
        else
            //return false;
            //OR
            throw new UserException( "Error en username or password!" );
    }*/

}
?>