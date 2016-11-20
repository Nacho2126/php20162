<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Favoritos */

$this->title = $model->Clientes_idClientes;
$this->params['breadcrumbs'][] = ['label' => 'Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favoritos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Clientes_idClientes' => $model->Clientes_idClientes, 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Clientes_idClientes' => $model->Clientes_idClientes, 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Clientes_idClientes',
            'Inmuebles_idInmuebles',
            'idFavorito',
        ],
    ]) ?>

</div>
