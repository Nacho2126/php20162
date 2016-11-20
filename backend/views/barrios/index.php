<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarriosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barrios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barrios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Barrios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idBarrios',
            'nombre',
            'Departamento_idDepartamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
