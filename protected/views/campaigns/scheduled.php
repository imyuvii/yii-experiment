<?php
/* @var $this CampaignsController */

$this->breadcrumbs=array(
    'Campaigns',
    'Scheduled',
);
?>
<div class="portlet box">
    <div class="portlet-body">
        <div class="tabbable-line">
            <ul class="nav nav-tabs ">
                <li><?php echo CHtml::link('Current',array('campaigns/current')); ?></li>
                <li class="active"><?php echo CHtml::link('Scheduled','javascript:void(0)'); ?></li>
                <li><?php echo CHtml::link('Previous',array('campaigns/previous')); ?></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_15_3">
                    <p>
                        Howdy, I'm in Section 3.
                    </p>
                    <p>
                        Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>