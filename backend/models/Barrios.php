<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Barrios".
 *
 * @property integer $idBarrios
 * @property string $nombre
 * @property integer $Departamento_idDepartamento
 *
 * @property Departamento $departamentoIdDepartamento
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
    public $departamento_id;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['Departamento_idDepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['Departamento_idDepartamento' => 'idDepartamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBarrios' => 'Id Barrios',
            'nombre' => 'Nombre',
            'Departamento_idDepartamento' => 'Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentoIdDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['idDepartamento' => 'Departamento_idDepartamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmuebles::className(), ['Barrios_idBarrios' => 'idBarrios']);
    }
    
}
