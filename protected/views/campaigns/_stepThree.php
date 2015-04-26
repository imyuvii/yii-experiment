<?php
/**
 * Created by PhpStorm.
 * User: Yuvraj
 * Date: 4/26/2015
 * Time: 12:16 AM
 */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Campaign - Step 3</h4>
</div>
<form method="POST" class="form-horizontal" id="stepThreeForm" enctype="multipart/form-data" style="margin-top: 20px;">
    <div class="wizard-forms">
        <div class="form-body" style="text-align: center;">
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 elements">
                    <?php
                        echo CHtml::button('Use Share Hero coupon code',array(
                            "class"=>"btn btn-circle yellow",
                            "onclick"=>"selectThisButton(1,this);"
                        ));

                        echo CHtml::fileField('file','',array(
                            "class"=>"",
                            "id"=>"customCodes",
                            "style"=>"display:none;"
                        ));
                    ?>

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 elements">
                    <?php echo CHtml::button('Use custom coupon codes',array(
                        "class"=>"btn btn-circle yellow",
                        "onclick"=>"selectThisButton(2,this);"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 elements">
                    <?php echo CHtml::link('Download sample file','javascript:void(0)')?>
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
            <?php
            echo CHtml::hiddenField('_id',$campaignId);
            echo CHtml::hiddenField('userToken',Yii::app()->session['userToken']);
            echo CHtml::hiddenField('couponType',1,array('id'=>'couponType'));
            echo CHtml::Button("Previous",
                array(
                    'class'=>'btn btn-default',
                    'onclick'=>'formWizard(1);'
                ));
            ?>
            <?php echo CHtml::submitButton ("Submit",
                array(
                    'class'=>'btn btn-primary',
                ));
            ?>
        </div>
    </div>
</form>
<script>
    function selectThisButton(value,thisElement){
        jQuery("#couponType").val(value);
        if(value==1){
            jQuery("#customCodes").css('display','none');
        } else {
            jQuery("#customCodes").css('display','block');
        }
    }
    jQuery("#stepThreeForm").ajaxForm({
        url: '<?php echo $url = Yii::app()->params['serviceUrl'] ?>updateCouponCodeFile',
        success: function(response) {
            if(response.result==true){
                jQuery.ajax({
                    type:'POST',
                    url:'<?php echo Yii::app()->createUrl('campaigns/stepFourth'); ?>',
                    /*data:{
                        '_id':response.data._id
                    },*/
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