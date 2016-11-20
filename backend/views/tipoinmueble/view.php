<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoinmueble */

$this->title = $model->idtipoinmueble;
$this->params['breadcrumbs'][] = ['label' => 'Tipoinmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoinmueble-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idtipoinmueble], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idtipoinmueble], [
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
            'idtipoinmueble',
            'nombre',
            'tipoinmueblecol',
        ],
    ]) ?>

</div>
