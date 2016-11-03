<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Departamento".
 *
 * @property integer $idDepartamento
 * @property string $nombre
 * @property integer $Barrios_idBarrios
 *
 * @property Barrios $barriosIdBarrios
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDepartamento', 'nombre', 'Barrios_idBarrios'], 'required'],
            [['idDepartamento', 'Barrios_idBarrios'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['Barrios_idBarrios'], 'exist', 'skipOnError' => true, 'targetClass' => Barrios::className(), 'targetAttribute' => ['Barrios_idBarrios' => 'idBarrios']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDepartamento' => 'Id Departamento',
            'nombre' => 'Nombre',
            'Barrios_idBarrios' => 'Barrios Id Barrios',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarriosIdBarrios()
    {
        return $this->hasOne(Barrios::className(), ['idBarrios' => 'Barrios_idBarrios']);
    }
}
