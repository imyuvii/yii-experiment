<?php
/* @var $this CampaignsController */
$actionName = Yii::app()->controller->action->id;
$this->breadcrumbs=array(
	'Campaigns',
	ucfirst($actionName)
);
?>
<?php
/*print('<pre>');
print_r(ServiceHelper::getAreas());
print('</pre>');*/
?>
<div class="portlet box">
	<div class="portlet-body">
		<div class="tabbable-line">
			<ul class="nav nav-tabs ">
				<li class="<?php echo ($actionName=='current')?'active':''; ?>">
					<?php echo CHtml::link('Current',array('campaigns/current')); ?>
				</li>
				<li class="<?php echo ($actionName=='scheduled')?'active':''; ?>">
					<?php echo CHtml::link('Scheduled',array('campaigns/scheduled')); ?>
				</li>
				<li class="<?php echo ($actionName=='previous')?'active':''; ?>">
					<?php echo CHtml::link('Previous',array('campaigns/previous')); ?>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_15_3">
					<!-- BEGIN CAMPAIGN -->
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-md-3">
							<form id="byAreaForm" action="<?php echo Yii::app()->createUrl('campaigns/byarea') ?>" method="post">
								<?php echo CHtml::dropDownList('campaignArea','',ServiceHelper::getAreas(),array(
									"class"=>"form-control chosen",
									"id"=>"locationWise",
									"onchange"=>"changeLocation(this)"
								)); ?>
							</form>
						</div>
						<div class="col-md-3"></div>
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
					<?php
					/*print('<pre>');
					print_r($data['data']);
					print('</pre>');*/
					?>
					<?php if(count($data['data'])>0){ ?>
						<?php foreach($data['data'] as $campaign){ ?>
							<div class="portlet light bg-inverse" onmouseover="showActions(this)" onmouseout="hideActions(this)">
								<div class="portlet-title">
									<div class="caption font-purple-plum">
										<i class="icon-speech font-purple-plum"></i>
										<span class="caption-subject bold uppercase"> <?php echo $campaign['title']; ?></span>
										<!--<span class="caption-helper">right click inside the box</span>-->
									</div>
									<div class="actions" style="display: block;">
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
										<?php if($campaign['image']==''){
											$image = 'http://www.placehold.it/150x100/EFEFEF/AAAAAA&amp;text=no+image';
										} else {
											$image = $campaign['image'];
										}
										$startDate = strtotime($campaign['campaignValidity']['startDate']);
										$endDate = strtotime($campaign['campaignValidity']['endDate']);
										?>
										<div style="width: 160px; float: left;">
											<img style="border: 1px solid #ddd; padding: 4px;" src="<?php echo $image; ?>" alt="">
										</div>
										<div class="col-md-6">
											<h5 class="block"><?php echo date('m/d/Y',$startDate) ?> <b>TO</b> <?php echo date('m/d/Y',$endDate) ?></h5>
											<h5 class="block">Redeemed: <?php echo $campaign['redeemCount']; ?></h5>
										</div>
										<div class="pull-right">
											<?php if($campaign['status']==2){
												echo '<a href="#" class="pull-right btn btn-circle default yellow-stripe disabled">In Review</a>';
											} else {
												echo '<a href="#" class="pull-right btn btn-circle default green-stripe disabled">Active</a>';
											} ?>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="portlet light bg-inverse" style="text-align: center;">
							<i>No Campaign found</i>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	Yii::app()->clientScript->registerCssFile(
		Yii::app()->clientScript->getCoreScriptUrl().
		'/jui/css/base/jquery-ui.css'
	);
	Yii::app()->clientScript->registerCoreScript('jquery.ui');
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bower_components/chosen/chosen.min.css');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/bower_components/chosen/chosen.jquery.min.js',CClientScript::POS_END);
?>
<script>
	function changeLocation(thisElement){
		jQuery("#byAreaForm").submit();
		//alert(jQuery(thisElement).val());
	}
</script>