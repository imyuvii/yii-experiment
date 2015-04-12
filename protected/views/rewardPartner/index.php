<?php
/* @var $this RewardPartnerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reward Partners',
);

$this->menu=array(
	array('label'=>'Create rewardPartner', 'url'=>array('create')),
	array('label'=>'Manage rewardPartner', 'url'=>array('admin')),
);
?>

<h1>Reward Partners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
