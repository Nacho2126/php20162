<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Favoritos */

$this->title = 'Update Favoritos: ' . $model->Inmuebles_idInmuebles;
$this->params['breadcrumbs'][] = ['label' => 'Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Inmuebles_idInmuebles, 'url' => ['view', 'Inmuebles_idInmuebles' => $model->Inmuebles_idInmuebles, 'idFavorito' => $model->idFavorito, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favoritos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
