<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

 ?>

<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
					  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
							 <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
						  <?= $form->field($model, 'password')->passwordInput() ?>
						  <?= $form->field($model, 'rememberMe')->checkbox() ?>
							<button type="submit" class="btn btn-default">Login</button>
							  <?php ActiveForm::end(); ?>
						
					</div><!--/login form-->
				</div>
				
				