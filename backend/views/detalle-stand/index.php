<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleStandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Stands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-stand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detalle Stand', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ds',
            'detalleMP_id',
            'producto_id',
            'estado_id',
            'precio_total',
            // 'cantidades',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
