<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?= $form->field($model, 'tipoinmueble_idtipoinmueble')->textInput() ?>

    <?= $form->field($model, 'Barrios_idBarrios')->textInput() ?>

    <?= $form->field($model, 'cordx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cordy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Clientes_idClientes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
