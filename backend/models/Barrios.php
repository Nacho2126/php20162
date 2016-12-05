<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Barrios".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_Departamento
 *
 * @property Departamento $idDepartamento
 * @property Inmuebles[] $inmuebles
 */
class Barrios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Barrios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'id_Departamento'], 'required'],
            [['id_Departamento'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['id_Departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_Departamento' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'id_Departamento' => 'Id  Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'id_Departamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmuebles::className(), ['id_Barrio' => 'id']);
    }
}
