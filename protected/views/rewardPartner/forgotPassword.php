<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Forgot Password';
$this->breadcrumbs=array(
    'Forgot Password',
);
?>
<form class="forget-form" action="<?php echo Yii::app()->createUrl('rewardPartner/forgotPassword') ?>" method="post">
    <h3>Forget Password ?</h3>
    <p>
        Enter your e-mail address below to reset your password.
    </p>
    <div class="form-group">
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="forgotPassword[email]"/>
    </div>
    <div class="form-actions">
        <?php echo CHtml::link('Back',array('rewardPartner/login'),array('class'=>'btn btn-default')); ?>
        <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-success uppercase pull-right')) ?>
    </div>
</form>

