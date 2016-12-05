<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Inmuebles".
 *
 * @property integer $id
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
 * @property integer $id_tipoinmueble
 * @property integer $id_Barrio
 * @property string $cordx
 * @property string $cordy
 * @property string $file
 * @property integer $user_id
 * @property integer $cant_imagenes
 *
 * @property Favoritos[] $favoritos
 * @property Usuario $user
 * @property Barrios $idBarrio
 * @property Inmuebles $idTipoinmueble
 * @property Inmuebles[] $inmuebles
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
            [['nombre', 'descripcion', 'id_tipoinmueble', 'id_Barrio', 'user_id'], 'required'],
            [['cant_dormitorios', 'cant_banios', 'mts_totales', 'mts_edificados', 'cant_pisos', 'id_tipoinmueble', 'id_Barrio', 'user_id', 'cant_imagenes'], 'integer'],
            [['cochera', 'patio'], 'boolean'],
            [['precio'], 'double'],
            [['nombre'], 'string', 'max' => 255],
            [['descripcion'], 'string', 'max' => 5000],
            [['garantia', 'tipo_operacion', 'direccion', 'cordx', 'cordy'], 'string', 'max' => 45],
            [['file'], 'file','extensions'=>'jpg,png','maxFiles'=>9],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['id_Barrio'], 'exist', 'skipOnError' => true, 'targetClass' => Barrios::className(), 'targetAttribute' => ['id_Barrio' => 'id']],
            [['id_tipoinmueble'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoinmueble::className(), 'targetAttribute' => ['id_tipoinmueble' => 'id']],
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
            'descripcion' => 'Descripcion',
            'cant_dormitorios' => 'Cantidad Dormitorios',
            'cant_banios' => 'Cantidad Banios',
            'mts_totales' => 'Metros Totales',
            'mts_edificados' => 'Metros Edificados',
            'cochera' => 'Cochera',
            'patio' => 'Patio',
            'cant_pisos' => 'Cantidad Pisos',
            'garantia' => 'Garantia',
            'tipo_operacion' => 'Tipo Operacion',
            'direccion' => 'Direccion',
            'id_tipoinmueble' => 'Tipoinmueble',
            'id_Barrio' => 'Barrio',
            'cordx' => 'Cordx',
            'cordy' => 'Cordy',
            'file[]' => 'File',
            'user_id' => 'Usuario',
            'cant_imagenes' => 'Cant Imagenes',
            'precio'=> 'Precio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favoritos::className(), ['id_Inmueble' => 'id']);
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
    public function getIdBarrio()
    {
        return $this->hasOne(Barrios::className(), ['id' => 'id_Barrio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoinmueble()
    {
        return $this->hasOne(Tipoinmueble::className(), ['id' => 'id_tipoinmueble']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmuebles::className(), ['id' => 'id']);
    }
}
