<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inmuebles */

$this->title = $model->idInmuebles;
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idInmuebles], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idInmuebles], [
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
            'idInmuebles',
            'nombre',
            'descripcion',
            'cant_dormitorios',
            'cant_banios',
            'mts_totales',
            'mts_edificados',
            'cochera:boolean',
            'patio:boolean',
            'cant_pisos',
            'garantia',
            'tipo_operacion',
            'direccion',
            'tipoinmueble_idtipoinmueble',
            'Barrios_idBarrios',
            'cordx',
            'cordy',
            'Clientes_idClientes',
        ],
    ]) ?>

</div>
