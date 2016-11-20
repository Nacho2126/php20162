<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Departamento".
 *
 * @property integer $idDepartamento
 * @property string $nombre
 *
 * @property Barrios[] $barrios
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
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarrios()
    {
        return $this->hasMany(Barrios::className(), ['Departamento_idDepartamento' => 'idDepartamento']);
    }
}
