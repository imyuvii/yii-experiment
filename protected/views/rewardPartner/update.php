<?php
/* @var $this RewardPartnerController */
/* @var $model rewardPartner */

$this->breadcrumbs=array(
	'Reward Partners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List rewardPartner', 'url'=>array('index')),
	array('label'=>'Create rewardPartner', 'url'=>array('create')),
	array('label'=>'View rewardPartner', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage rewardPartner', 'url'=>array('admin')),
);
?>

<h1>Update rewardPartner <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>