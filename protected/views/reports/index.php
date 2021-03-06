<?php
/* @var $this ReportsController */

$this->breadcrumbs=array(
	'Reports',
);
?>


<div class="row">
	<div class="col-md-12">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet light">
			<div class="portlet-body">
				<form action="#" class="form-horizontal" style="margin-top: 20px;">
					<div class="form-body">
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<?php echo CHtml::dropDownList('Location','',array(
									"Ahmedabad"=>"Ahmedabad",
									"Gandhinagar"=>"Gandhinagar"
								),array(
									"class"=>"form-control"
								)); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<div style="margin-left: 104px;" class="input-group input-medium date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
									<?php
									$this->widget('zii.widgets.jui.CJuiDatePicker', array(
										'name' => 'from',
										'value' => date('d-m-Y'),
										'options'=>array(
											'dateFormat'=>'d-m-yy',
										),
										'htmlOptions' => array(
											"class"=>"form-control"
										),
									));
									?>
									<span class="input-group-addon">to </span>
									<?php
										$this->widget('zii.widgets.jui.CJuiDatePicker', array(
											'name' => 'to',
											'value' => date('d-m-Y'),
											'options'=>array(
												'dateFormat'=>'d-m-yy',
											),
											'htmlOptions' => array(
												"class"=>"form-control"
											),
										));
									?>
								</div>
								<span style="margin-left: 104px;" class="help-block">Select date range </span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<?php echo CHtml::dropDownList('campaign','',array(
									"Campaign1"=>"Campaign1",
									"Campaign2"=>"Campaign2"
								),array(
									"class"=>"form-control",
									"empty"=>"Select Campaign"
								)); ?>
							</div>
						</div>
					</div>
				</form>
				<div class="panel panel-default">
					<div class="panel-heading">
						Download Report
					</div>
					<div class="panel-body" style="text-align: center;">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 elements">
								<a href="#" class="btn btn-lg blue">
									Download Excel <i class="fa fa-file-excel-o"></i>
								</a>
							</div>
						</div>
						<div class="row"><p>&nbsp;</p></div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3 elements">
								<a href="#" class="btn btn-lg blue">
									Download PDF <i class="fa fa-file-pdf-o"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END ALERTS PORTLET-->
	</div>
</div>