<?php

use yii\helpers\Html;
use backend\assets\InmuebleAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\Inmuebles */

$this->title = 'Create Inmuebles';
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

InmuebleAsset::register($this);
?>
<div class="inmuebles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
