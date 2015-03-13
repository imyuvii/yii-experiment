<?php
/* @var $this RewardPartnerController */
/* @var $model rewardPartner */

$this->breadcrumbs=array(
	'Reward Partners'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List rewardPartner', 'url'=>array('index')),
	array('label'=>'Create rewardPartner', 'url'=>array('create')),
	array('label'=>'Update rewardPartner', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete rewardPartner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage rewardPartner', 'url'=>array('admin')),
);
?>

<h1>View rewardPartner #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'organizationName',
		'contactNo',
		'partnerType',
		'city',
		'area',
		'category',
		'emailId',
		'password',
		'firstName',
		'lastName',
		'gender',
	),
)); ?>
