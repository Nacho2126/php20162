<?php

<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use backend\controllers\InmueblesController;


class InmueblesController extends ActiveController
{
    public $modelClass = 'backend\models\Inmuebles';

    public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    /*$behaviors['authenticator'] = [
	        'class' => HttpBasicAuth::className(),
	        'class' => HttpBearerAuth::className()
	    ];*/

	    return $behaviors;
	}


    }

    public function actionObtenerInmuebles(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $model = Inmubles::findOne($id);
            if (isset($model)) {
                $result = $model->getProductosComercioStock()->with('inmuebles')->asArray()->all();
                for($i = 0; $i < count($result); $i++){
                    $result[$i]['inmuebles']['imagen'] = $this->imagenBase64($result[$i]['inmuebles']['imagen']);
                }
                return $result;
            }
        }

    }

}

?>