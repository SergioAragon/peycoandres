<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materiales */

$this->title = 'Update Materiales: ' . $model->id_mate;
$this->params['breadcrumbs'][] = ['label' => 'Materiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mate, 'url' => ['view', 'id' => $model->id_mate]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materiales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
