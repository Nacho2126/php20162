<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\InmueblesController;
use backend\controllers\UsuarioController;
/* @var $this yii\web\View */
/* @var $model backend\models\Favoritos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="favoritos-form">

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'id_Inmueble')->dropdownList(InmueblesController::findAll(), ['prompt' => Yii::t('app', 'Seleccione un Inmueble')]) ?>

  <?= $form->field($model, 'user_id')->dropdownList(UsuarioController::findAll(), ['prompt' => Yii::t('app', 'Seleccione un Cliente')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
