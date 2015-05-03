<?php

class CouponsController extends Controller
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
				'actions'=>array('index','verification','verify','redemptionList'),
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

	public function actionVerification()
	{
		$this->render('Verification');
	}

	public function actionVerify(){
		$couponCode = $_POST['couponCode'];
		$params = CJSON::encode(array(
			'userToken' => Yii::app()->session['userToken'],
			'rewardPartnerId' => Yii::app()->session['rewardPartnerId'],
			'couponCode' => $couponCode
		));

		$response = ServiceHelper::serviceCall($params,'verifyCouponCode');
		$result = CJSON::decode($response);
		if($result['result']==true){
			// render datatable
			echo 'render data with datatable';
		} else {
			echo $response;
		}
/*
		print('<pre>');
		print_r($response);
		print('</pre>');*/
	}

	public function actionRedemptionList(){
		$params = CJSON::encode(array(
			'userToken' => Yii::app()->session['userToken'],
			'rewardPartnerId' => Yii::app()->session['rewardPartnerId'],
			'index' => 0
		));

		$response = CJSON::decode(ServiceHelper::serviceCall($params,'getRedemptionListByRewardPartner'));

		if($response['result']==true){
			$this->renderPartial('_redemptionList',array(
				"data"=>$response['data']
			));
		} else {
			// error handling
		}
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