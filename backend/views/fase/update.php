<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fase */

$this->title = 'Update Fase: ' . $model->id_fase;
$this->params['breadcrumbs'][] = ['label' => 'Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fase, 'url' => ['view', 'id' => $model->id_fase]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
