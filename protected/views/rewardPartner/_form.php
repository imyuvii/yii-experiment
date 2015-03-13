<?php
/* @var $this RewardPartnerController */
/* @var $model rewardPartner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reward-partner-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array(
		'class'=>'register-form'
	)
)); ?>

	<?php // echo $form->errorSummary($model); ?>
	<h3>Sign Up</h3>

	<div class="form-group">
		<?php echo $form->labelEx($model,'organizationName',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo CHtml::textField('organizationName','',array('size'=>60,'maxlength'=>100,'placeholder'=>'Company Name','class'=>'form-control placeholder-no-fix')); ?>
		<?php echo $form->error($model,'organizationName'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'firstName',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo CHtml::textField('firstName','',array('size'=>60,'maxlength'=>100,'placeholder'=>'First Name','class'=>'form-control placeholder-no-fix')); ?>
		<?php echo $form->error($model,'firstName'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lastName',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo CHtml::textField('lastName','',array('size'=>60,'maxlength'=>100,'placeholder'=>'Last Name','class'=>'form-control placeholder-no-fix')); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contactNo',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo CHtml::textField('contactNo','',array('size'=>60,'maxlength'=>100,'placeholder'=>'Contact No','class'=>'form-control placeholder-no-fix')); ?>
		<?php echo $form->error($model,'contactNo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'emailId',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo CHtml::textField('emailId','',array('size'=>60,'maxlength'=>100,'placeholder'=>'Email Id','class'=>'form-control placeholder-no-fix')); ?>
		<?php echo $form->error($model,'emailId'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<?php echo CHtml::passwordField('password','',array('size'=>60,'maxlength'=>100,'placeholder'=>'Password','class'=>'form-control placeholder-no-fix')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::link('Back',array('rewardPartner/login'),array('class'=>'btn btn-default')); ?>
		<?php echo CHtml::ajaxButton ("Register",
			CController::createUrl('rewardPartner/register'),
			array(
				//'update' => '#',
				//'beforeSend' =>'js:formValidation()',
				'type'=>'POST',
				'data'=> array(
					'formData'=>'js:function(){
						if(formValidation()){
							$("#reward-partner-form").serializeArray();
						}
					}'
				)
			),
			array(
				'class'=>'btn btn-success uppercase pull-right',
				'data-toggle'=>'modal',
				'data-target'=>'#addCampaign'
			));
		?>
		<?php // echo CHtml::submitButton($model->isNewRecord ? 'Register' : 'Save',array('class'=>'btn btn-success uppercase pull-right')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->