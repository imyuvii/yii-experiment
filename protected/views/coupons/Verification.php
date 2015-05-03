<?php
/* @var $this CouponsController */
$this->pageTitle = 'Coupon Verifications';
$this->breadcrumbs=array(
	'Coupons'=>array('/coupons'),
	'Verification',
);
?>

<div class="portlet box">
	<div class="portlet-body">
		<?php echo CHtml::beginForm('#','post',array('class'=>'form-horizontal')); ?>
		<div class="form-body">
			<div class="form-group">
				<div class="col-md-4">
					<div class="input-group" style="text-align:left">
						<?php echo CHtml::textField('couponCode','',array(
							'placeholder'=>'Enter coupon code',
							'class'=>'form-control',
							'onkeyup'=>'validateCoupon(this);'
						)); ?>
						<span class="input-group-btn">
							<?php echo CHtml::ajaxLink('Verify','verify',array(
								'type'=>'POST',
								'success'=>'function(response){
									var obj = jQuery.parseJSON(response);
									if(obj.result == false){
										errorMessage("error",obj.errorDescription,obj.errorCode);
										jQuery("#verifyLink").html("Verify");
									} else {

									}
									console.log(obj.errorDescription);
								}',
								'beforeSend'=>'function(){
									getSpinner("#verifyLink");
								}'
							),array(
								'class'=>'btn default disabled',
								'id'=>'verifyLink'
							)); ?>
						</span>
					</div>
					<div class="help-block">
						Enter 8 characters makes the Verify button Active
					</div>
				</div>
			</div>
		</div>
		<?php echo CHtml::endForm(); ?>
		<?php
		Yii::app()->clientScript->registerScript(
			"getRedemptionList",
			"jQuery.ajax({
            	type: 'POST',
            	url: '" . Yii::app()->createUrl('coupons/redemptionList') . "',
            	success: function(html){
               		jQuery('#redeptionListContainer').html(html);
        		}
          	});
		", CClientScript::POS_READY);
		?>
		<div class="portlet">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bell-o"></i>Last 50 Redemptions
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-scrollable" id="redeptionListContainer">

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function validateCoupon(thisElement){
		console.log(jQuery(thisElement).val().length);
		if(jQuery(thisElement).val().length>7){
			jQuery("#verifyLink").removeClass('disabled');
		} else {
			jQuery("#verifyLink").removeClass('disabled');
			jQuery("#verifyLink").addClass('disabled');
		}
	}
	function getSpinner(thisElement){
		jQuery(thisElement).html('<i class="fa fa-circle-o-notch fa-spin"></i> Verifying');
	}
</script>