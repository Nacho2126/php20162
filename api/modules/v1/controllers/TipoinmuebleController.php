<?php

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;
use backend\models\Tipoinmueble;



class TipoinmuebleController extends ActiveController
{
    public $modelClass = 'backend\models\Tipoinmueble';

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