<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InmueblesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inmuebles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',
            'cant_dormitorios',
            'cant_banios',
            // 'mts_totales',
            // 'mts_edificados',
            // 'cochera:boolean',
            // 'patio:boolean',
            // 'cant_pisos',
            // 'garantia',
            // 'tipo_operacion',
            // 'direccion',
            // 'id_tipoinmueble',
            // 'id_Barrio',
            // 'cordx',
            // 'cordy',
            // 'file',
            // 'user_id',
            // 'cant_imagenes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
