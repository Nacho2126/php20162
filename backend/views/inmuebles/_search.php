<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InmueblesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmuebles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'cant_dormitorios') ?>

    <?= $form->field($model, 'cant_banios') ?>

    <?php // echo $form->field($model, 'mts_totales') ?>

    <?php // echo $form->field($model, 'mts_edificados') ?>

    <?php // echo $form->field($model, 'cochera')->checkbox() ?>

    <?php // echo $form->field($model, 'patio')->checkbox() ?>

    <?php // echo $form->field($model, 'cant_pisos') ?>

    <?php // echo $form->field($model, 'garantia') ?>

    <?php // echo $form->field($model, 'tipo_operacion') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'id_tipoinmueble') ?>

    <?php // echo $form->field($model, 'id_Barrio') ?>

    <?php // echo $form->field($model, 'cordx') ?>

    <?php // echo $form->field($model, 'cordy') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'cant_imagenes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
