<?php
/**
 * Created by PhpStorm.
 * User: Yuvraj
 * Date: 4/13/2015
 * Time: 12:14 AM
 */
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Campaign - Step 2</h4>
</div>
<form method="POST" class="form-horizontal" id="stepTwoForm" enctype="multipart/form-data" style="margin-top: 20px;">
    <div class="wizard-forms">
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-4 control-label">Title</label>
                <div class="col-md-4">
                    <?php echo CHtml::textField('title','',array(
                        "class"=>"form-control",
                        "placeholder"=>"Enter Title"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Image</label>
                <div class="col-md-4">
                    <?php echo CHtml::fileField('image','',array(
                        "class"=>"form-control"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Offer Duration</label>
                <div class="col-md-4">
                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <input class="form-control hasDatepicker" id="startDate" type="text" value="04/26/2015" name="startDate">                        <span class="input-group-addon">to </span>
                        <input class="form-control hasDatepicker" id="endDate" type="text" value="04/26/2015" name="endDate">                    </div>
                    <!-- /input-group -->
                    <span class="help-block">Select date range </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Medal</label>
                <div class="col-md-4">
                    <?php echo CHtml::dropDownList('medal','',array(
                        50=>50,
                        100=>100,
                        200=>200,
                        500=>'500+'
                    ),array(
                        "class"=>"form-control"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Terms & Conditions</label>
                <div class="col-md-4">
                    <?php echo CHtml::textArea('TermAndCondition','',array(
                        "class"=>"form-control",
                        "placeholder"=>"Max 100 Characters",
                        "rows"=>"3"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Description</label>
                <div class="col-md-4">
                    <?php echo CHtml::textArea('description','',array(
                        "class"=>"form-control",
                        "placeholder"=>"Max 100 Characters",
                        "rows"=>"3"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Category</label>
                <div class="col-md-4">
                    <?php
                        echo CHtml::dropDownList('categoryId','',json_decode(ServiceHelper::getCategories()),array(
                            'multiple'=>'multiple',
                        ));
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Max reward coupons/user</label>
                <div class="col-md-4">
                    <?php echo CHtml::textField('redeemCount','',array(
                        "class"=>"form-control",
                        "placeholder"=>"Input 0 for unlimited"
                    )); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php
                echo CHtml::hiddenField('_id',$campaignId);
                echo CHtml::hiddenField('userToken',Yii::app()->session['userToken']);
                //echo CHtml::hiddenField('rewardPartnerId',Yii::app()->session['rewardPartnerId']);
            ?>
            <?php echo CHtml::Button("Previous",
                array(
                    'class'=>'btn btn-default',
                    'onclick'=>'formWizard(0);'
                ));
            ?>
            <?php echo CHtml::submitButton("Next",
                array(
                    'class'=>'btn btn-primary',
                    'id'=>'stepTwoAjaxLink',
                    'onclick'=>'blockThisElement("#campaignData");'
                ));
            ?>
            <?php /*  echo CHtml::ajaxButton ("Next",
                    CController::createUrl('campaigns/add'),
                    array(
                        'update' => '#campaignData',
                        'type'=>'POST',
                        'data'=> 'js:{"formNo": 2}'
                    ),
                    array(
                        'class'=>'btn btn-primary'
                    )); */
            ?>
        </div>
    </div>
    </div>
</form>
<script type="text/javascript">
    //unBlockThisElement("#campaignData");
    jQuery( "#startDate").datepicker();
    jQuery( "#endDate").datepicker();
    //beforeSubmit
    jQuery("#stepTwoForm").ajaxForm({
        url: '<?php echo $url = Yii::app()->params['serviceUrl'] ?>updateReward',
        success: function(response) {
            if(response.result==true){
                jQuery.ajax({
                    type:'POST',
                    url:'<?php echo Yii::app()->createUrl('campaigns/stepThree'); ?>',
                    data:{
                        '_id':response.data._id
                    },
                    success:function(resp){
                        jQuery("#campaignData").html(resp);
                    },
                    beforeSend:function(){
                        blockThisElement("#campaignData");
                    }
                });
            } else {
                unBlockThisElement("#campaignData");
                errorMessage('error',response.errorDescription,response.errorCode);
            }
        },
        beforeSubmit:function(){
            blockThisElement("#campaignData");
        }
    });
</script>