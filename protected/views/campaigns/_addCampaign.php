<?php
/**
 * Created by PhpStorm.
 * User: Yuvraj
 * Date: 3/8/2015
 * Time: 7:50 PM
 */

// echo $myValue;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Campaign</h4>
</div>
<form action="#" class="form-horizontal" id="firstForm" style="margin-top: 20px;">
    <div class="wizard-forms" id="form0">
        <div class="form-body">
            <div class="form-group error-group hide-this">
                <lable class="Metronic-alerts alert alert-danger" id="errorMessage"></lable>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Location</label>
                <div class="col-md-4">
                    <?php echo CHtml::dropDownList('firstStep[pickUpSpots]','',ServiceHelper::getAreas(),array(
                        "class"=>"form-control",
                        "multiple"=>"multiple",
                        "id"=>"location"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Budget</label>
                <div class="col-md-4">
                    <?php echo CHtml::dropDownList('firstStep[budget]','',array(
                        1000=>1000,
                        2000=>2000,
                        4000=>4000,
                        5000=>5000
                    ),array(
                        "class"=>"form-control"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Campaign Duration</label>
                <div class="col-md-4">
                    <div class="input-group input-medium date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <input class="form-control hasDatepicker" id="firstStep_startDate" type="text" value="04/26/2015" name="firstStep[startDate]">
                        <span class="input-group-addon">to </span>
                        <input class="form-control hasDatepicker" id="firstStep_endDate" type="text" value="04/26/2015" name="firstStep[endDate]">
                    </div>
                    <span class="help-block">Select date range </span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php
                echo CHtml::hiddenField('firstStep[userToken]',Yii::app()->session['userToken']);
                echo CHtml::hiddenField('firstStep[rewardPartnerId]',Yii::app()->session['rewardPartnerId']);
                echo CHtml::button("Next", array(
                    'class'=>'btn btn-primary',
                    'id'=>'ajaxLink'
                ));
            ?>
        </div>
    </div>
</form>
<script type="text/javascript">
    jQuery('#ajaxLink').click(function(){
        jQuery.ajax({
            type:'post',
            url:'<?php echo CController::createUrl('campaigns/create') ?>',
            data:jQuery("#firstForm").serialize(),
            success:function(response){
                try{
                    var data = jQuery.parseJSON(response);
                    if(data.result==false){
                        unBlockThisElement("#campaignData");
                        errorMessage('error',data.errorDescription,data.errorCode);
                    }
                } catch (e){
                    jQuery("#campaignData").html(response);
                }
            },
            error:function(response){
                //console.log('error')
            },
            beforeSend:function(){
                blockThisElement("#campaignData");
            }
        });
    });
</script>





