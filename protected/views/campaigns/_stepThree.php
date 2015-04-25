<?php
/**
 * Created by PhpStorm.
 * User: Yuvraj
 * Date: 4/26/2015
 * Time: 12:16 AM
 */
?>
<div class="wizard-forms" id="form2">
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
        <?php
        echo CHtml::textField('_id',$campaignId);
        echo CHtml::textField('userToken',Yii::app()->session['userToken']);
        echo CHtml::textField('couponType',1);
        echo CHtml::fileField('image','',array(
            "class"=>"form-control"
        ));
        echo CHtml::Button("Previous",
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