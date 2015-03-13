<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <?php
    //Yii::app()->clientScript->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/font-awesome/css/font-awesome.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/simple-line-icons/simple-line-icons.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/plugins/bootstrap/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/login.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/layout.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/themes/default.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/custom.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/components-rounded.css');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="login">
    <div class="logo">
        <a href="<?php echo Yii::app()->baseUrl; ?>">
            <img src="<?php echo Yii::app()->baseUrl ?>/img/logo-login.png" alt="logo" class="logo-default">
        </a>
    </div>
    <div class="content">
        <?php echo $content; ?>
    </div>
</body>
<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/jquery.min.js',CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/jquery-validation/dist/jquery.validate.min.js',CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/functions.js',CClientScript::POS_END);
?>


