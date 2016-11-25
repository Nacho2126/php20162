<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Favoritos */

$this->title = $model->Inmuebles_idInmuebles;
$this->params['breadcrumbs'][] = ['label' => 'Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favoritos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito, 'user_id' => $model->user_id], [
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
            'Inmuebles_idInmuebles',
            'idFavorito',
            'user_id',
        ],
    ]) ?>

</div>
