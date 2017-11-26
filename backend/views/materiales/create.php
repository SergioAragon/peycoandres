<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Materiales */

$this->title = 'Create Materiales';
$this->params['breadcrumbs'][] = ['label' => 'Materiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materiales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
