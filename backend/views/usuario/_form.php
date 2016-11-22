<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirmed_at')->textInput() ?>

    <?= $form->field($model, 'unconfirmed_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blocked_at')->textInput() ?>

    <?= $form->field($model, 'registration_ip')->textInput(['maxlength' => true]) ?>
    <?php
    $hoy = getdate();
    
    ?>
    <?= $form->field($model, 'created_at')->textInput(['readonly' => true, 'value' => $hoy[0]]) ?>
    

    <?= $form->field($model, 'updated_at')->textInput(['readonly' => true, 'value' => $hoy[0]])?>

    <?= $form->field($model, 'updated_at')->textInput(['readonly' => true, 'value' => 0])?>

    <?= $form->field($model, 'ci_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prioridad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario_atencion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
