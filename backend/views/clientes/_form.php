<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

    <div class="col-sm-4"><?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'cedula')->textInput() ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'telefono')->textInput() ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?></div>

    
   <!--  //$form->field($model, 'auth_key')->textInput(['maxlength' => true]) 

    //$form->field($model, 'access_token')->textInput(['maxlength' => true]) 

    //$form->field($model, 'activate')->textInput() 

    //$form->field($model, 'status')->textInput() 

    //$form->field($model, 'created_at')->textInput() 

    //$form->field($model, 'updated_at')->textInput() 

    //$form->field($model, 'role')->textInput() 
 -->
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
