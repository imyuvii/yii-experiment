<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<?php
		// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/path/to/your/javascript/file',CClientScript::POS_END);
		//Yii::app()->clientScript->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/font-awesome/css/font-awesome.min.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/simple-line-icons/simple-line-icons.min.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bootstrap/css/bootstrap.min.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/layout.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/themes/default.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/custom.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/components-rounded.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bower_components/toastr/toastr.css');
	?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo Yii::app()->baseUrl; ?>">
				<img src="<?php echo Yii::app()->baseUrl ?>/img/logo.png" alt="logo" class="logo-default">
			</a>
			<!--<div class="menu-toggler sidebar-toggler"></div>-->
		</div>
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
		<div class="page-top">
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown dropdown-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
							<img alt="" class="img-circle" src="<?php echo Yii::app()->baseUrl ?>/img/avatar3_small.jpg">
						<span class="username username-hide-on-mobile"><?php echo Yii::app()->session['loggedInUser']; ?></span>
							<i class="fa fa-angle-down"></i>
						</a>
						<?php
						$this->widget('zii.widgets.CMenu',array(
							'items'=>array(
								array('label'=>'<i class="icon-user"></i> My Profile', 'url'=>array('/rewardPartner/profile')),
								array('label'=>'<i class="icon-key"></i> Change Password', 'url'=>array('/locations/')),
								array('label'=>'<i class="icon-power"></i> Log out', 'url'=>array('/rewardPartner/logout')),
								//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
							),
							'encodeLabel' => false,
							'htmlOptions' => array(
								'class'=>'dropdown-menu dropdown-menu-default'
							)
						));
						?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="page-container">
		<div class="page-sidebar-wrapper">
			<div class="page-sidebar navbar-collapse collapse">
				<?php
				$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						/*array('label'=>'<i class="icon-home"></i><span class="title">Dashboard</span>', 'url'=>array('/site/index')),*/
						array('label'=>ServiceHelper::cMenuName('Verification'), 'url'=>array('/coupons/verification')),
						array('label'=>ServiceHelper::cMenuName('Campaigns'), 'url'=>array('/campaigns/current')),
						array('label'=>ServiceHelper::cMenuName('Reports'), 'url'=>array('/reports/index')),
						array('label'=>ServiceHelper::cMenuName('Locations'), 'url'=>array('/locations/index')),
						array('label'=>ServiceHelper::cMenuName('Team'), 'url'=>array('/team/index')),
						array('label'=>ServiceHelper::cMenuName('Invoices'), 'url'=>array('/invoices/index')),
						//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
					'encodeLabel' => false,
					'htmlOptions' => array(
						'class'=>'page-sidebar-menu page-sidebar-menu-hover-submenu'
					)
				)); ?>
				<!--<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start active ">
						<a href="index.html">
							<i class="icon-home"></i>
							<span class="title">Dashboard</span>
							<span class="selected"></span>
						</a>
					</li>
				</ul>-->
			</div>
		</div>
		<div class="page-content-wrapper">
			<div class="page-content">
				<h3 class="page-title">
					<?php echo $this->pageTitle; ?>
				</h3>
				<div class="page-bar">
					<?php if(isset($this->breadcrumbs)):?>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
							'tagName'=>'ul',
							'htmlOptions'=>array('class'=>'page-breadcrumb'),
							'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
							'inactiveLinkTemplate'=>'<li><a href="#">{label}</a></li>',
							'homeLink'=>'<li><i class="fa fa-home"></i> <a href="'.Yii::app()->homeUrl.'">Home</a></li>',
							'separator'=>' <i class="fa fa-angle-right"></i> '
						)); ?><!-- breadcrumbs -->
					<?php endif?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="page-footer">
		<div class="page-footer-inner">
			<?php echo date('Y'); ?> © Share Hero.
		</div>
	</div>
	<?php
		//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/jquery.min.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/bootstrap/js/bootstrap.min.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/jquery-validation/dist/jquery.validate.min.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/bootstrap-daterangepicker/moment.min.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/jquery.form.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/bower_components/toastr/toastr.min.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/bower_components/blockui/jquery.blockUI.js',CClientScript::POS_END);
		//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/bootstrap-daterangepicker/daterangepicker.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/functions.js',CClientScript::POS_END);

	?>
</div>
</body>
</html>
<?php
Yii::trace('Reward Parner _id: '.Yii::app()->session['rewardPartnerId']);
Yii::trace('User token : '.Yii::app()->session['userToken']);
?>