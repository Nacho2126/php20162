<?php

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;
use backend\models\Departamento;



class DepartamentosController extends ActiveController
{
    public $modelClass = 'backend\models\Departamento';

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