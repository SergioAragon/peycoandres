<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleMaterialPedido */

$this->title = 'Update Detalle Material Pedido: ' . $model->id_dmp;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Material Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dmp, 'url' => ['view', 'id' => $model->id_dmp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-material-pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
