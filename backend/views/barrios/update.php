<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Barrios */

$this->title = 'Update Barrios: ' . $model->idBarrios;
$this->params['breadcrumbs'][] = ['label' => 'Barrios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idBarrios, 'url' => ['view', 'id' => $model->idBarrios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barrios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
