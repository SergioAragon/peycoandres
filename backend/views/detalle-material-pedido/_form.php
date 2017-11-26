<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pedido;
use app\models\Materiales;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleMaterialPedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-material-pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_id')->DropDownList(
                                  ArrayHelper::map( Materiales::find()->all(), 'id_mate', 'nombre' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pedido_id')->DropDownList(
                                  ArrayHelper::map( Pedido::find()->all(), 'id_pedido', 'tipo_stand' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
