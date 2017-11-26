<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDocumento */

$this->title = 'Update Tipo Documento: ' . $model->id_tipodoc;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipodoc, 'url' => ['view', 'id' => $model->id_tipodoc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
