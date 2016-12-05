<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Inmuebles */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
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
            'id_tipoinmueble',
            'id_Barrio',
            'cordx',
            'cordy',
            'file',
            'user_id',
            'cant_imagenes',
        ],
    ]) ?>

</div>
