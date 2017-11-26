<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion */

$this->title = 'Update Clasificacion: ' . $model->id_clasifi;
$this->params['breadcrumbs'][] = ['label' => 'Clasificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_clasifi, 'url' => ['view', 'id' => $model->id_clasifi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clasificacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
