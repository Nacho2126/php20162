<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\DepartamentoController;
/* @var $this yii\web\View */
/* @var $model backend\models\Barrios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barrios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'id_Departamento')->dropdownList(DepartamentoController::findAll(), ['prompt' => Yii::t('app', 'Seleccione una Departamento')]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
