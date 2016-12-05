<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\UsuarioController;
use backend\controllers\BarriosController;
use backend\controllers\TipoinmuebleController;
/* @var $this yii\web\View */
/* @var $model backend\models\Inmuebles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmuebles-form">

    <?php $form = ActiveForm::begin([
         "method" => "post",
         "enableClientValidation" => true,
         "options" => ["enctype" => "multipart/form-data"],
         ]);
    ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cant_dormitorios')->textInput() ?>

    <?= $form->field($model, 'cant_banios')->textInput() ?>

    <?= $form->field($model, 'mts_totales')->textInput() ?>

    <?= $form->field($model, 'mts_edificados')->textInput() ?>

    <?= $form->field($model, 'cochera')->checkbox() ?>

    <?= $form->field($model, 'patio')->checkbox() ?>

    <?= $form->field($model, 'cant_pisos')->textInput() ?>

    <?= $form->field($model, 'garantia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_operacion')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
    <br>
    <input type="button" id="buscar" value="Buscar en GoogleMaps">
    <article id="map_article">
    </article>
    <br>
    <?= $form->field($model, 'id_tipoinmueble')->dropdownList(TipoInmuebleController::findAll(), ['prompt' => Yii::t('app', 'Seleccione el tipo de Inmueble')]) ?>

    <?= $form->field($model, 'id_Barrio')->dropdownList(BarriosController::findAll(), ['prompt' => Yii::t('app', 'Seleccione una Departamento')]) ?>

    <?= $form->field($model, 'cordx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cordy')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'user_id')->dropdownList(UsuarioController::findAll(), ['prompt' => Yii::t('app', 'Seleccione una Cliente')]) ?>
    
    <?= $form->field($model, 'precio')->textInput() ?>

    <h4>Subir archivos</h4>

    <?= $form->field($model, 'file[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>  
   

    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    

    
    <?php ActiveForm::end(); ?>
</div>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdqKB2KhL1D9HxiGCdYiS5GNnB9dMghi4&callback=initMap">
  </script> 