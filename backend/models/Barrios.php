<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Barrios".
 *
 * @property integer $idBarrios
 * @property string $nombre
 *
 * @property Departamento[] $departamentos
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
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasMany(Departamento::className(), ['Barrios_idBarrios' => 'idBarrios']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmuebles::className(), ['Barrios_idBarrios' => 'idBarrios']);
    }
}
