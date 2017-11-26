<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */

$this->title = $model->id_cotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cotizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cotizacion], [
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
            'id_cotizacion',
            'cliente_id',
            'producto_id',
            'fecha',
        ],
    ]) ?>

</div>
