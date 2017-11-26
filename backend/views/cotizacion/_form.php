<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Clientes;
use backend\models\Producto;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cotizacion')->textInput() ?>

    <?= $form->field($model, 'cliente_id')->DropDownList(
                                  ArrayHelper::map( Clientes::find()->all(), 'id_clientes', 'numero_documento' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?>

    <?= $form->field($model, 'producto_id[]')->DropDownList(
                                  ArrayHelper::map( Producto::find()->all(), 'id_producto', 'nombre' ),
                                  [
                                            'prompt'=>'seleccione',
                                            'multiple'=>true

                                  ]
                                  );  ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
