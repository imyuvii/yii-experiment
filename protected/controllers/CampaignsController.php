<?php

class CampaignsController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','login','register','forgotPassword','logout'),
				'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','current','scheduled','previous','add','stepThree','stepFourth'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','current','scheduled','previous'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCreate()
	{
		$params = CJSON::encode($_POST['firstStep']);
		$response = CJSON::decode(ServiceHelper::serviceCall($params,'createCampaign'));

		if($response['result']==true){
			$this->renderPartial('_stepTwo', array(
				"campaignId"=>$response['data']['_id']
			), false, true);
			/*echo CJSON::encode(array(
				'result'=>true,
				'data'=>$nextStep
			));*/
		} else {
			echo CJSON::encode($response);
		}
	}

	public function actionStepThree(){
		$this->renderPartial('_stepThree',array(
			"campaignId"=>$_POST['_id']
		));
	}

	public function actionStepFourth(){
		$this->renderPartial('_stepFourth',array(
			"campaignCode"=>"ABC125258"
		));
	}

	public function actionAdd()
	{
		if(isset($_POST['data'])){
			echo $_POST['data'];
		}

		if($_POST['formNo']==0){
			$this->renderPartial('_addCampaign', 0, false, true);
		} else {
			//print_r($_POST['Location']);
		}
	}

	public function actionCurrent()
	{
		$params = CJSON::encode(array(
			'userToken' => Yii::app()->session['userToken'],
			'rewardPartnerId' => Yii::app()->session['rewardPartnerId'],
			'index'=>0,
			'location' => -1
		));

		$response = CJSON::decode(ServiceHelper::serviceCall($params,'getCurrentCampaigns'));

		$this->render('current',array(
			'data'=>$response
		));
	}

	public function actionScheduled()
	{
		$this->render('scheduled');
	}

	public function actionPrevious()
	{
		$this->render('previous');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}