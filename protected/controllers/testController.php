<?php
class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        if(isset(Yii::app()->session['user_token'])){
            $this->redirect(array('/dashboard'));
        }else{
            $this->redirect(array('site/login'));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model=new LoginForm;
        $model->scenario = 'login';

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

                if($model->autologin == 1){

                    $passEnc = $model->password;
                    Yii::app()->request->cookies['dasdasdasdaskjhkjh'] = new CHttpCookie('dasdasdasdaskjhkjh', $model->email);//email
                    Yii::app()->request->cookies['dasdasdasdaskjhkjh23123'] = new CHttpCookie('dasdasdasdaskjhkjh23123', $passEnc);//pass
                }
                // echo "login";
                $this->redirect(array('/site/page', 'view'=>'dashboard'));
            }
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

    public function actionloginRequired(){
        $this->redirect(Yii::app()->homeUrl);
    }
    /* register the user */
    public function actionRegistration(){

        $model=new RegisterForm;

        // Uncomment the following line if AJAX validation is needed
        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['RegisterForm']))
        {
            //var_dump($_POST['RegisterForm'] ); exit;
            $model->attributes=$_POST['RegisterForm']; // post the register form and then check for validation
            $model->parent = 1;
            $id=1;

            //if($model->validate() && $model->regiCall()){}
            if($model->validate() ){
                $model->regiCall($id);
            }
        }

        $this->render('registration',array('model'=>$model));
    }
//    ragister user with parent
    public function actionRegister($user){

        //echo 'here';
        $model=new RegisterForm;

        // Uncomment the following line if AJAX validation is needed
        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['RegisterForm']))
        {
            $model->attributes=$_POST['RegisterForm']; // post the register form and then check for validation
            $id = preg_replace('/\D/', '', $user);
            $model->parent = $id;
            if($model->validate()){
                $model->regiCall($id);
            }
            //$this->redirect(array('view','id'=>$model->id));
        }

        $this->render('registration',array('model'=>$model));
    }

    /**
     * clear the session and userdata  of the current user and redirect to homepage.
     */
    public function actionSignout(){
        $temp = Yii::app()->ServiceHelper->getTempValue();
        $params = array("funct" => "logout",'temp'=>$temp,'token'=>Yii::app()->session['user_token']);
        $url = SERVICE_URL;
        $response = Yii::app()->ServiceHelper->serviceCall($params);
        unset(Yii::app()->session['user_token']);
        Yii::app()->user->clearStates();
        Yii::app()->user->logout();
        $this->redirect(array('site/login'));
    }


    //--- for account activation
    public function actionActivation($token){
        //echo $token;
        //echo "<div id='activation-waiting' style='width: 100%; text-align: center;margin-top: 50px;' id='form-container'><img src='".Yii::app()->getBaseUrl(true)."/images/loader.gif'/><h1>Validating Please wait..</h1></div>";
        if(isset($token)){

            $model= Users::model()->findByAttributes(array(
                'regtoken'=>$token,
            ));
            // var_dump($model);
            if(!empty($model)){
                $model->activeStatus=1;
                $model->regtoken='';
                if($model->save(false)){
                    //echo 'saved';
                    $this->render('result',array(
                        'type'=>1,
                        'description'=>array('You have successfully registered with Tradeland, Shortly you will receive a confirmation email.')
                    ));
                } else {
                    $this->render('result',array(
                        'type'=>0,
                        'description'=>array('Not activated')
                    ));
                }
            }else {
                $this->render('result',array(
                    'type'=>0,
                    'description'=>array('You have already activated your account')
                ));
            }
        } else {
            $this->render('result',array(
                'type'=>0,
                'description'=>array('Invalid request','Please check your email again')
            ));
        }
    }
    /* this action is handel the forgot-password */
    public function actionForgotPassword(){
        $model=new LoginForm;

        if(isset($_POST['ajax']) && $_POST['ajax']==='forgot-password')
        {
            echo CActiveForm::validate($model);
        }

        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];

            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->forgotPassword()){
                $this->redirect(array('site/login'));
            }

        }
        $this->render('forgot-password',array('model'=>$model));
    }

    /* public function ActionActivation($email,$code){
         /* preparing request */
    /*$data = array(
        "email"=>$email,
        "code"=>$code
    );
    $params = array(
        "funct"=>"activateuser",
        "data"=>$data,
        "temp"=> Yii::app()->ServiceHelper->getTempValue()
    ); */

    /*  response from service */
    /*print('<pre>');
    print_r(Yii::app()->ServiceHelper->serviceCall($params));
    print('<pre>');*/
    //exit;
    /*$response = json_decode(Yii::app()->ServiceHelper->serviceCall($params));

    if(isset($response->err)){
        if($response->err != ''){
             $this->redirect(array('/activationfail'));
        } else {
             $this->redirect(array('/activated'));
        }
    } else {
        $this->redirect(array('/activated'));
    }
}*/

    public function ActionResendActivation(){

    }

    public function actionResetPassword($pwdtoken){
        // echo 'here';

        $model=new ResetPassword;

        /*if(isset($_POST['ajax']) && $_POST['ajax']==='reset-password')
        {
            echo CActiveForm::validate($model);
        }*/

        if(isset($_POST['ResetPassword']))
        {
            $model->attributes=$_POST['ResetPassword'];
            // validate user input and redirect to the previous page if valid
            if($model->validate()) {
                // echo 'hi';
                //Yii::trace('valiate');
                $model->resetPass($pwdtoken);
                //$this->redirect(array('site/login'));
            }
            else
                Yii::trace('not valiate');
        }
        $this->render('reset-password',array('model'=>$model));
    }

    public function actionPromote(){

        $host = $_SERVER['HTTP_HOST'];
        $user = Users::model()->findByPk(Yii::app()->user->getId());
        //var_dump($user);exit;
        $first = ($user->firstname != NULL ? $user->firstname : 'User');

        $link = "http://".$host.Yii::app()->request->baseUrl."/site/register/user/".$first.Yii::app()->user->getId();

        $this->render('promote',array('link'=>$link));
    }

//    public function actionPage($alias)
//    {
//        echo "Page is $alias.";
//    }
    /* this function is used in encryption of email and password */
    // function encrypt_decrypt($action, $string) {
    //     $output = false;

    //     $key = 'My strong random secret key';

    //     // initialization vector
    //     $iv = md5(md5($key));

    //     if( $action == 'encrypt' ) {
    //         $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
    //         $output = base64_encode($output);
    //     }
    //     else if( $action == 'decrypt' ){
    //         $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
    //         $output = rtrim($output, "");
    //     }
    //     return $output;
    // }
}