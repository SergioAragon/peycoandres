<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleMaterialPedido */

$this->title = $model->id_dmp;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Material Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-material-pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_dmp], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_dmp], [
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
            'id_dmp',
            'material_id',
            'cantidad',
            'costo',
            'pedido_id',
        ],
    ]) ?>

</div>
