<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipoinmueble".
 *
 * @property integer $idtipoinmueble
 * @property string $nombre
 * @property string $tipoinmueblecol
 *
 * @property Inmuebles[] $inmuebles
 */
class Tipoinmueble extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoinmueble';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'tipoinmueblecol'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipoinmueble' => 'Idtipoinmueble',
            'nombre' => 'Nombre',
            'tipoinmueblecol' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmuebles::className(), ['tipoinmueble_idtipoinmueble' => 'idtipoinmueble']);
    }
}
