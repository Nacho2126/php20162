<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace common\models;
use dektrium\user\Module;
use Yii;
use yii\base\Model;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
/**
 * Registration form collects user input on registration process, validates it and creates new User model.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationForm extends BaseRegistrationForm
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        //Tomo las reglas del padre
        $rules = parent::rules();
        //Elimino todas las reglas que tengan que ver con el username // La key en array arranca siempre con 'username'
        $f = array_filter(array_keys($rules), function ($k){ return stripos($k, "username")===false; }); 
        $result = array_intersect_key($rules, array_flip($f));
       return $result;
    }
   
}