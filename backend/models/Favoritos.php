<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Favoritos".
 *
 * @property integer $id_Inmueble
 * @property string $id
 * @property integer $user_id
 *
 * @property User $user
 * @property Inmuebles $idInmueble
 */
class Favoritos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Favoritos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Inmueble', 'id', 'user_id'], 'required'],
            [['id_Inmueble', 'user_id'], 'integer'],
            [['id'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['id_Inmueble'], 'exist', 'skipOnError' => true, 'targetClass' => Inmuebles::className(), 'targetAttribute' => ['id_Inmueble' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Inmueble' => 'Id  Inmueble',
            'id' => 'ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInmueble()
    {
        return $this->hasOne(Inmuebles::className(), ['id' => 'id_Inmueble']);
    }
}
