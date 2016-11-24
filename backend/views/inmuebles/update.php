<?php

use yii\helpers\Html;
use backend\assets\InmuebleAsset;
/* @var $this yii\web\View */
/* @var $model app\models\Inmuebles */

$this->title = 'Update Inmuebles: ' . $model->idInmuebles;
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idInmuebles, 'url' => ['view', 'id' => $model->idInmuebles]];
$this->params['breadcrumbs'][] = 'Update';
InmuebleAsset::register($this);
?>
<div class="inmuebles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
