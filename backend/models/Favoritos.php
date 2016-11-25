<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Favoritos".
 *
 * @property integer $Inmuebles_idInmuebles
 * @property string $idFavorito
 * @property integer $user_id
 *
 * @property Inmuebles $inmueblesIdInmuebles
 * @property Usuario $user
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
            [['Inmuebles_idInmuebles', 'idFavorito', 'user_id'], 'required'],
            [['Inmuebles_idInmuebles', 'user_id'], 'integer'],
            [['idFavorito'], 'string', 'max' => 45],
            [['Inmuebles_idInmuebles'], 'exist', 'skipOnError' => true, 'targetClass' => Inmuebles::className(), 'targetAttribute' => ['Inmuebles_idInmuebles' => 'idInmuebles']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Inmuebles_idInmuebles' => 'Inmuebles Id Inmuebles',
            'idFavorito' => 'Id Favorito',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmueblesIdInmuebles()
    {
        return $this->hasOne(Inmuebles::className(), ['idInmuebles' => 'Inmuebles_idInmuebles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'user_id']);
    }
}
