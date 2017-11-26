<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetalleFase */

$this->title = 'Create Detalle Fase';
$this->params['breadcrumbs'][] = ['label' => 'Detalle Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-fase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
