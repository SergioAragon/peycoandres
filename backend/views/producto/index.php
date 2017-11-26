<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\grid\DataColumn;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Producto', ['create'], ['class' => 'btn btn-success']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' =>function($model){

            if ($model->estado_id=='2') {
                return['class'=>'danger'];

            }elseif ($model->estado_id=='1') {
                return['class'=>'success'];
            }
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_producto',
            'nombre',
            
            'cod_clasifi',
            //'dimension_producto',
            'imag_adju',
            [
                'attribute' => 'imagen',
            'format' => 'html',       
            'value' => function ($dataProvider) {
              $url = \Yii::getAlias('@web/img/').$dataProvider->imag_adju;
            return Html::img($url, ['alt'=>'Image','width'=>'50','height'=>'40']); 
 
            }
                 ],
            //'unidades',
                 
            // 'costo',
             'estado_id',
             //'color_id',
            // 'cantidad_color',
            // 'materiales_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
