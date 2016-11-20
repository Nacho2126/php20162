<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Favoritos */

$this->title = 'Update Favoritos: ' . $model->Clientes_idClientes;
$this->params['breadcrumbs'][] = ['label' => 'Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Clientes_idClientes, 'url' => ['view', 'Clientes_idClientes' => $model->Clientes_idClientes, 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favoritos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
