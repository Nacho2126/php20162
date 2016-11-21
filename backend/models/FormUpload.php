<?php
 
namespace app\models;
use yii\base\model;
use yii\web\UploadedFile;

class FormUpload extends model{
  
    public $file;

    public function rules()
    {
        return [
            ['file', 'file', 
             'skipOnEmpty' => true,
             'uploadRequired' => 'No has seleccionado ningún archivo', //Error
             'maxSize' => 1024*1024*1, //1 MB
             'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
             'minSize' => 10, //10 Bytes
             'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
             'extensions' => 'jpg, png',
             'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
             'maxFiles' => 4,
             'tooMany' => 'El máximo de archivos permitidos son {maxFiles}', //Error
             ],
        ]; 
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->file as $file) {
                $file->saveAs('uploads/inmuebles/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}

