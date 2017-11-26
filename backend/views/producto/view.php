<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_producto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_producto], [
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
            'id_producto',
            'nombre',
           
            'cod_clasifi',
            'dimension_producto',
            'imag_adju',
            'unidades',
            'costo',
            'estado_id',
            'color_id',
            'cantidad_color',
            'materiales_id',
        ],
    ]) ?>

</div>
