<?php


namespace backend\controllers;

use yii\web\Controller;
use common\models\HtmlHelpers;
use backend\models\Departamentos;

class DependentDropdownController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionDepartamento($id){
        echo HtmlHelpers::dropDownList(Departamentos::className(), 'barrio_id', $id, 'departamento_id', 'departamento');
    }

}