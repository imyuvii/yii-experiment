<?php
/* @var $this CampaignsController */

$this->breadcrumbs=array(
	'Campaigns',
	'Current'
);
?>
<div class="portlet box">
	<div class="portlet-body">
		<div class="tabbable-line">
			<ul class="nav nav-tabs ">
				<li class="active"><?php echo CHtml::link('Current','javascript:void(0)'); ?></li>
				<li><?php echo CHtml::link('Scheduled',array('campaigns/scheduled')); ?></li>
				<li><?php echo CHtml::link('Previous',array('campaigns/previous')); ?></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_15_3">
					<!-- BEGIN CAMPAIGN -->
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<?php  echo CHtml::ajaxButton ("Add Campaign",
								CController::createUrl('campaigns/add'),
								array(
									'update' => '#campaignData',
									'beforeSend' =>'function(){
										$("#addCampaign").modal("show")
									}',
									'type'=>'POST',
                        			'data'=> 'js:{"formNo": 0}'
								),
								array(
									'class'=>'pull-right btn btn-circle green',
									'data-toggle'=>'modal',
									'data-target'=>'#addCampaign'
								));
							?>
							<!-- Button trigger modal -->
							<!-- Modal -->
							<div class="modal fade" id="addCampaign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div id="campaignData" class="modal-body" style="padding: 0px;">

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="portlet light bg-inverse" onmouseover="showActions(this)" onmouseout="hideActions(this)">
						<div class="portlet-title">
							<div class="caption font-purple-plum">
								<i class="icon-speech font-purple-plum"></i>
								<span class="caption-subject bold uppercase"> Campaign 1</span>
								<!--<span class="caption-helper">right click inside the box</span>-->
							</div>
							<div class="actions" style="display: none;">
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-pencil"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-trash"></i>
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="context" data-toggle="context" data-target="#context-menu">
								<div style="width: 160px; float: left;">
									<img style="border: 1px solid #ddd; padding: 4px;" src="http://www.placehold.it/150x100/EFEFEF/AAAAAA&amp;text=no+image" alt="">
								</div>
								<div class="col-md-6">
									Duis mollis, est non <br/>
									Duis mollis, est non
								</div>
								<div class="pull-right">
									<a href="#" class="pull-right btn btn-circle default yellow-stripe disabled">In Review</a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- END CAMPAIGN -->
					<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption font-purple-plum">
								<i class="icon-speech font-purple-plum"></i>
								<span class="caption-subject bold uppercase"> Campaign 2</span>
								<!--<span class="caption-helper">right click inside the box</span>-->
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-pencil"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-trash"></i>
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="context" data-toggle="context" data-target="#context-menu">
								<p>
									Duis mollis, est non
									<a href="#" class="pull-right btn btn-circle default green-stripe disabled">Active</a>
								</p>
							</div>
						</div>
					</div>
					<!-- End -->
					<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption font-purple-plum">
								<i class="icon-speech font-purple-plum"></i>
								<span class="caption-subject bold uppercase"> Campaign 3</span>
								<!--<span class="caption-helper">right click inside the box</span>-->
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-pencil"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-trash"></i>
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="context" data-toggle="context" data-target="#context-menu">
								<p>
									Duis mollis, est non
									<a href="#" class="pull-right btn btn-circle default green-stripe disabled">Active</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
