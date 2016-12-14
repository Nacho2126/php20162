<?php
/**
 * Created by PhpStorm.
 * User: gaston
 * Date: 12/12/16
 * Time: 07:35 PM
 */

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use backend\models\Favoritos;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\web\HttpException;


$usern="";
class UsuarioController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }
    public function auth()
    {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if(isset($_GET['username']) && isset($_GET['password'])){
            $username=$_GET['username'];
            $password=$_GET['password'];
            $user = User::findByUsername($username);
            if(!$username || !$password || !$user)
                //return false;
                //OR
                throw new UserException( "There is an error!" );
            if ($user->validatePassword($username, $password)){
                $usern=$username;
                //var_dump($usern);die;
                return $user;
            }
            else
                //return false;
                //OR
                throw new HttpException( 500, "Error en username or password!" );
        }
    }
    public function actionObtenerfavoritos(){
        
    if(isset($_GET['username'])){
        $favuser=$_GET['username'];
        $user = User::findByUsername($favuser);
        $modelfav=Favoritos::find()->where(['user_id' => $user->id]);
        //var_dump($modelfav);die;
            if (isset($modelfav)) {
                return $modelfav->asArray()->all();;
            }
        }
    }
}