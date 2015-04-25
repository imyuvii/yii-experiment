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
                <lable class="label-danger" id="errorMessage"></lable>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Location</label>
                <div class="col-md-4">
                    <?php echo CHtml::dropDownList('firstStep[pickUpSpots]','',ServiceHelper::getAreas(),array(
                        "class"=>"form-control"
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
                        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'name' => 'firstStep[startDate]',
                            'value' => date('m/d/Y'),
                            'options'=>array(
                                'dateFormat'=>'m/d/yy',
                            ),
                            'htmlOptions' => array(
                                "class"=>"form-control"
                            ),
                        )); ?>
                        <span class="input-group-addon">to </span>
                        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'name' => 'firstStep[endDate]',
                            'value' => date('m/d/Y'),
                            'options'=>array(
                                'dateFormat'=>'m/d/Y',
                            ),
                            'htmlOptions' => array(
                                "class"=>"form-control"
                            ),
                        )); ?>
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
<script>
    jQuery('#ajaxLink').click(function(){
        jQuery.ajax({
            type:'post',
            url:'<?php echo CController::createUrl('campaigns/create') ?>',
            data:jQuery("#firstForm").serialize(),
            success:function(response){
                try{
                    var data = jQuery.parseJSON(response);
                    if(data.result==false){
                        jQuery(".error-group").removeClass('hide-this')
                        jQuery("#errorMessage").html(data.errorDescription);
                    }
                } catch (e){
                    jQuery("#campaignData").html(response);
                }
            },
            error:function(response){
                console.log('error')
            }
        });
    });
</script>
<?php exit; ?>



    <div class="wizard-forms" id="form2" style="display: <?php echo ($formNo==2)?'block':'none'; ?>;">
        <div class="form-body">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 elements">
                        <?php echo CHtml::button('Use Share Hero coupon code',array(
                            "class"=>"btn btn-circle yellow"
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 elements">
                        <?php echo CHtml::button('Use custom coupon codes',array(
                            "class"=>"btn btn-circle yellow"
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 elements">
                        <?php echo CHtml::link('Download sample file','javascript:void(0)')?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php /* echo CHtml::ajaxButton ("Previous",
                CController::createUrl('campaigns/add'),
                array(
                    'update' => '#campaignData',
                    'type'=>'POST',
                    'data'=> 'js:{"formNo": 1}'
                ),
                array(
                    'class'=>'btn btn-default'
                ));*/
            ?>
            <?php echo CHtml::Button("Previous",
                array(
                    'class'=>'btn btn-default',
                    'onclick'=>'formWizard(1);'
                ));
            ?>
            <?php  echo CHtml::ajaxButton ("Submit",
                CController::createUrl('campaigns/add'),
                array(
                    'update' => '#campaignData',
                    'type'=>'POST',
                    'data'=> 'js:{"formNo": 2}'
                ),
                array(
                    'class'=>'btn btn-primary'
                ));
            ?>
        </div>
    </div>
</form>