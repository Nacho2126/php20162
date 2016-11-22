<?php
namespace common\models;
use Yii;
use Yii\helper\ArrayHelper;
use dektrium\user\models\User as BaseUser;
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
            $role = $auth->getRole('sales');
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
}