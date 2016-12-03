<?php

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;
use backend\models\Barrios;



class BarriosController extends ActiveController
{
    public $modelClass = 'backend\models\Barrios';

    /*public function actions()
    {
        $actions = parent::actions();
        unset($actions['view']);
        return $actions;
    }

    public function actionView($id){
    	// $inmueble = new Inmuebles();
    	//var_dump($inmueble->primaryKey());die;
    	return Barrios::find()->where(['idBarrios' => $id])->one();
    }*/ 

}
?>