<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleFase */

$this->title = 'Update Detalle Fase: ' . $model->id_df;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_df, 'url' => ['view', 'id' => $model->id_df]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-fase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
