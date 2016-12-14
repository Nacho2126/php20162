<?php
namespace common\models;
use Yii;
use Yii\helper\ArrayHelper;
use dektrium\user\models\User as BaseUser;
use dektrium\user\helpers\Password;
use backend\models\Favoritos;
/**
 * User model
 *
 */
class User extends BaseUser
{
     /** @inheritdoc */
    public function beforeSave($insert)
    {
        $this->username = $this->email;
        return parent::beforeSave($insert);
    }
    public function afterSave ( $insert, $changedAttributes ) {
        if ($insert) {

            $auth = Yii::$app->authManager;
            $role = $auth->getRole('user');
            $auth->assign($role, $this->getId());
        }
        return parent::afterSave($insert, $changedAttributes);
    }
     /** @inheritdoc */
    public function rules()
    {
        $parentRules = parent::rules();
        unset($parentRules['usernameRequired']);
        unset($parentRules['usernameMatch']);
        unset($parentRules['usernameLength']);
        return $parentRules;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
 
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public static function findByUsername($user)
    {
        return static::find()->where(['username' => $user])->one();
    }

    public function validatePassword($username, $password){
        $user = static::findByUsername($username);
        return Password::validate($password, $user->password_hash);
    }
    public function getFavoritos($username)
    {
        $user = static::findByUsername($username);
        return $user->hasMany(Favoritos::className());
    }
}