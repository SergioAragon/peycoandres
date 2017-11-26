<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\models\Clasificacion;
use backend\models\Color;
use backend\models\Materiales;
use backend\models\Estado;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">

    <div class="col-sm-4"><?= $form->field($model, 'id_producto')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?></div>

    

    <div class="col-sm-4"><?= $form->field($model, 'cod_clasifi')->DropDownList(
                                  ArrayHelper::map( Clasificacion::find()->all(), 'id_clasifi', 'descripcion' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'dimension_producto')->textInput(['maxlength' => true]) ?></div>

    
    <div class="col-sm-4"><?= $form->field($model, 'imgfile')->fileInput() ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'unidades')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'estado_id')->DropDownList(
                                  ArrayHelper::map( Estado::find()->all(), 'id_estado', 'descripcion' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'color_id[]')->DropDownList(
                                  ArrayHelper::map( Color::find()->all(), 'id_color', 'nombre' ),
                                  [
                                            'prompt' => 'seleccione',
                                            'multiple' => true
                                            // 'onchange'=>'
                                             //$.post("index.php?r=color/list&id_color='.'"+$(this).val(), function(data){
                                              //  $("select#models-contact").html(data);
                                             //});'

                                             //['options' =>[$id => ['selected' => true]]]
                                            

                                  ]
                                  );  ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'cantidad_color')->textInput(['maxlength' => true]) ?></div>
    
    <div class="col-sm-4"><?= $form->field($model, 'materiales_id')->DropDownList(
                                  ArrayHelper::map( Materiales::find()->all(), 'id_mate', 'nombre' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?></div>
    
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

