<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fase-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fase',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
