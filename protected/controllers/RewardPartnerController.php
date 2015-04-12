<?php

class RewardPartnerController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/login';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','login','register','forgotPassword','logout'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionRegister()
	{
		//$model=new rewardPartner;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if($_POST)
		{
			//echo $requestParams =  CJSON::encode($_POST);
			//exit;
			/*foreach($_POST['formData'] as $data){
				$name = $data['name'];
				$value = $data['value'];
				$requestParams[$name] = $value;
			}*/

			//$model->attributes=$_POST['rewardPartner'];
			//$params = json_encode($requestParams);
			$params = CJSON::encode($_POST);
			$response = json_decode(ServiceHelper::serviceCall($params,'registerRewardPartner'));
			if($response->result==true){
				//$this->redirect(array('view','id'=>'123'));
			} else {
				$this->render('create',array(
					//'model'=>$model,
					'errorCode'=>$response->errorCode,
					'errorDescription'=>$response->errorDescription
				));
				//echo print_r($response);
				//echo 'There is an error with page';
				//$this->redirect(array('view','id'=>'123'));
			}
			//echo $response['result'];
			/*if($model->save())
				$this->redirect(array('view','id'=>$model->id));*/
		} else {
			$this->render('create',array(
				//'model'=>$model,
				'errorCode'=>'',
				'errorDescription'=>''
			));
		}
	}

	/*
	 * Forgot password form
	 * */
	public function actionForgotPassword(){
		if(isset($_POST['forgotPassword'])){
			Yii::trace($_POST['forgotPassword']['email']);
		}
		$this->render('forgotPassword');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(array('campaigns/current'));
			}
				Yii::trace("logged in successfully");
			//$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['rewardPartner']))
		{
			$model->attributes=$_POST['rewardPartner'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('rewardPartner');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new rewardPartner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['rewardPartner']))
			$model->attributes=$_GET['rewardPartner'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return rewardPartner the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=rewardPartner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param rewardPartner $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reward-partner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
