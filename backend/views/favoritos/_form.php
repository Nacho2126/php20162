<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\ClientesController;
use backend\controllers\InmueblesController;
/* @var $this yii\web\View */
/* @var $model app\models\Favoritos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="favoritos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Clientes_idClientes')->dropdownList(ClientesController::findAll(), ['prompt' => Yii::t('app', 'Seleccione una Cliente')]) ?>
    
    <?= $form->field($model, 'Inmuebles_idInmuebles')->dropdownList(InmueblesController::findAll(), ['prompt' => Yii::t('app', 'Seleccione una Inmueble')]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
