<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipoinmueble".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $tipoinmueblecol
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
            'id' => 'ID',
            'nombre' => 'Nombre',
            'tipoinmueblecol' => 'Tipoinmueblecol',
        ];
    }
}
