<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'htmlOptions'=>array(
		'class'=>'login-form'
	),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<h3 class="form-title">Sign In</h3>
	<div class="alert alert-danger display-hide">
		<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Email','autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'username',array('class'=>'text-danger help-block')); ?>
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<!--<label class="control-label visible-ie8 visible-ie9">Username</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>-->
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Password','autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'password',array('class'=>'text-danger help-block')); ?>
	</div>
	<div class="form-actions">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success uppercase')); ?>
		<?php // echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
		<?php echo CHtml::link('Forgot Password?',array('rewardPartner/forgotPassword'),array("id"=>"forget-password","class"=>"forget-password")); ?>
	</div>
	<div class="create-account">
		<p>
			<?php echo CHtml::link('Create an account',array('rewardPartner/register'),array('class'=>'uppercase')); ?>
		</p>
	</div>
<?php $this->endWidget(); ?>

