<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\ClientesController;
use backend\controllers\BarriosController;
use backend\controllers\TipoinmuebleController;

/* @var $this yii\web\View */
/* @var $model app\models\Inmuebles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmuebles-form">

    <?php $form = ActiveForm::begin(); ?>

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
    <?= $form->field($model, 'tipoinmueble_idtipoinmueble')->dropdownList(TipoInmuebleController::findAll(), ['prompt' => Yii::t('app', 'Seleccione el tipo de Inmueble')]) ?>

    <?= $form->field($model, 'Barrios_idBarrios')->dropdownList(BarriosController::findAll(), ['prompt' => Yii::t('app', 'Seleccione una Departamento')]) ?>

    <?= $form->field($model, 'cordx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cordy')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'Clientes_idClientes')->dropdownList(ClientesController::findAll(), ['prompt' => Yii::t('app', 'Seleccione una Cliente')]) ?>
    
    <h4>Subir archivos</h4>

    <?php $form = ActiveForm::begin([
         "method" => "post",
         "enableClientValidation" => true,
         "options" => ["enctype" => "multipart/form-data"],
         ]);
    ?>
    <?= $form->field($model, "file")->fileInput(['multiple' => true]) ?>

    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php $form->end() ?>

    
    <?php ActiveForm::end(); ?>

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVcvukh6sDH3sPIqDiK787_k7-EH8E6oU&callback=initMap"
    async defer></script>
</script>