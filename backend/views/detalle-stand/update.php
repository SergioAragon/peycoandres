<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleStand */

$this->title = 'Update Detalle Stand: ' . $model->id_ds;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Stands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ds, 'url' => ['view', 'id' => $model->id_ds]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-stand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
