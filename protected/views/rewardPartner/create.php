<?php
/* @var $this RewardPartnerController */
/* @var $model rewardPartner */

$this->breadcrumbs=array(
	'Reward Partners'=>array('index'),
	'Create',
);
$this->menu=array(
	array('label'=>'List rewardPartner', 'url'=>array('index')),
	array('label'=>'Manage rewardPartner', 'url'=>array('admin')),
);
?>
<?php
$this->renderPartial('_form', array(
	//'model'=>$model,
	'errorCode'=>$errorCode,
	'errorDescription'=>$errorDescription
));
?>