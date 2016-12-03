<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Inmuebles".
 *
 * @property integer $idInmuebles
 * @property string $nombre
 * @property string $descripcion
 * @property integer $cant_dormitorios
 * @property integer $cant_banios
 * @property integer $mts_totales
 * @property integer $mts_edificados
 * @property boolean $cochera
 * @property boolean $patio
 * @property integer $cant_pisos
 * @property string $garantia
 * @property string $tipo_operacion
 * @property string $direccion
 * @property integer $tipoinmueble_idtipoinmueble
 * @property integer $Barrios_idBarrios
 * @property string $cordx
 * @property string $cordy
 * @property integer $user_id
 * @property string $imagen
 *
 * @property Favoritos[] $favoritos
 * @property Tipoinmueble $tipoinmuebleIdtipoinmueble
 * @property Barrios $barriosIdBarrios
 * @property Clientes $user_id
 */
class Inmuebles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'Inmuebles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'tipoinmueble_idtipoinmueble', 'Barrios_idBarrios', 'user_id'], 'required'],
            [['cant_dormitorios', 'cant_banios', 'mts_totales', 'mts_edificados', 'cant_pisos', 'tipoinmueble_idtipoinmueble', 'Barrios_idBarrios', 'user_id'], 'integer'],
            [['cochera', 'patio'], 'boolean'],
            [['nombre'], 'string', 'max' => 255],
            [['descripcion'], 'string', 'max' => 5000],
            [['garantia', 'tipo_operacion', 'direccion', 'cordx', 'cordy'], 'string', 'max' => 45],
            [['file'], 'file','extensions'=>'jpg,png','maxFiles'=>10],
            [['tipoinmueble_idtipoinmueble'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoinmueble::className(), 'targetAttribute' => ['tipoinmueble_idtipoinmueble' => 'idtipoinmueble']],
            [['Barrios_idBarrios'], 'exist', 'skipOnError' => true, 'targetClass' => Barrios::className(), 'targetAttribute' => ['Barrios_idBarrios' => 'idBarrios']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInmuebles' => 'Id Inmuebles',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'cant_dormitorios' => 'Cantidad Dormitorios',
            'cant_banios' => 'Cantidad Banios',
            'mts_totales' => 'Metros Totales',
            'mts_edificados' => 'Metros Edificados',
            'cochera' => 'Cochera',
            'patio' => 'Patio',
            'cant_pisos' => 'Cantidad de Pisos',
            'garantia' => 'Garantia',
            'tipo_operacion' => 'Tipo Operacion',
            'direccion' => 'Direccion',
            'tipoinmueble_idtipoinmueble' => 'Tipoinmueble',
            'Barrios_idBarrios' => 'Barrios',
            'cordx' => 'Cordenada X',
            'cordy' => 'Cordenada Y',
            'file[]' => 'File',
            'user_id' => 'Clientes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favoritos::className(), ['Inmuebles_idInmuebles' => 'idInmuebles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoinmuebleIdtipoinmueble()
    {
        return $this->hasOne(Tipoinmueble::className(), ['idtipoinmueble' => 'tipoinmueble_idtipoinmueble']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarriosIdBarrios()
    {
        return $this->hasOne(Barrios::className(), ['idBarrios' => 'Barrios_idBarrios']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientesIdClientes()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'user_id']);
    }
}
