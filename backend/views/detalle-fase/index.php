<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleFaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Fases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-fase-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detalle Fase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_df',
            'fecha_e',
            'fecha_s',
            'fecha_cambioF',
            'fase_id',
            // 'estado_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
