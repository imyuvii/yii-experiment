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
<form action="#" class="form-horizontal" style="margin-top: 20px;">
    <div id="form0" style="display: <?php echo ($formNo==0)?'block':'none'; ?>;">
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-4 control-label">Location</label>
                <div class="col-md-4">
                    <?php echo CHtml::dropDownList('Location','',array(
                        "Ahmedabad"=>"Ahmedabad",
                        "Gandhinagar"=>"Gandhinagar"
                    ),array(
                        "class"=>"form-control"
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Budget</label>
                <div class="col-md-4">
                    <?php echo CHtml::dropDownList('budget','',array(
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
                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <?php echo CHtml::textField("startDate","",array("class"=>"form-control")); ?>
                        <span class="input-group-addon">to </span>
                        <?php echo CHtml::textField("endDate","",array("class"=>"form-control")); ?>
                    </div>
                    <!-- /input-group -->
                    <span class="help-block">Select date range </span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo CHtml::ajaxButton ("Next",
                CController::createUrl('campaigns/add'),
                array(
                    'update' => '#campaignData',
                    'type'=>'POST',
                    'data'=> 'js:{"formNo": 1}'
                ),
                array(
                    'class'=>'btn btn-primary'
                ));
            ?>
        </div>
    </div>


    <div id="form1" style="display: <?php echo ($formNo==1)?'block':'none'; ?>;">
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-4 control-label">Title</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Enter text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Campaign Duration</label>
            <div class="col-md-4">
                <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                    <input type="text" class="form-control" name="from">
                    <span class="input-group-addon">to </span>
                    <input type="text" class="form-control" name="to">
                </div>
                <!-- /input-group -->
                <span class="help-block">Select date range </span>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-4 control-label">Title</label>
                <div class="col-md-4">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-4 control-label">Category</label>
                <div class="col-md-4">
                    <?php echo CHtml::dropDownList('budget','',json_decode(ServiceHelper::getCategories()),array(
                        "class"=>"form-control"
                    )); ?>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-4 control-label">Maximum reward coupons par user (Input 0 for unlimited)</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Enter text">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php  echo CHtml::ajaxButton ("Previous",
                CController::createUrl('campaigns/add'),
                array(
                    'update' => '#campaignData',
                    'type'=>'POST',
                    'data'=> 'js:{"formNo": 0}'
                ),
                array(
                    'class'=>'btn btn-default'
                ));
            ?>
            <?php  echo CHtml::ajaxButton ("Next",
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
    <div id="form2" style="display: <?php echo ($formNo==2)?'block':'none'; ?>;">
        <div class="form-body">
            <div class="form-group">
                <div class="col-md-4">
                    <button type="button" class="btn btn-circle yellow">Use Share Hero coupon code</button>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <div class="col-md-4">
                    <button type="button" class="btn btn-circle yellow">Use custom coupon codes</button>
                </div>
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <div class="col-md-4">
                    <a href="javascript:void(0);">Download sample file</a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php  echo CHtml::ajaxButton ("Previous",
                CController::createUrl('campaigns/add'),
                array(
                    'update' => '#campaignData',
                    'type'=>'POST',
                    'data'=> 'js:{"formNo": 1}'
                ),
                array(
                    'class'=>'btn btn-default'
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