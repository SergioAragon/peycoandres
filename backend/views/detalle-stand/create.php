<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetalleStand */

$this->title = 'Create Detalle Stand';
$this->params['breadcrumbs'][] = ['label' => 'Detalle Stands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-stand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
