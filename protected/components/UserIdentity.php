<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$params = array(
			"emailId" => $this->username,
			"password" => $this->password,
		);
		$response = json_decode(ServiceHelper::serviceCall(json_encode($params),'rewardPartnerLogin'));
		Yii::trace('Login status: '.$response->result);

		if($response->result == false && $response->errorCode == 801){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} elseif($response->result == false && $response->errorCode == 805){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} elseif($response->result==true){
			Yii::app()->session['userToken'] = $response->rewardPartnerUserData->authToken;
			Yii::app()->session['rewardPartnerId'] = $response->rewardPartnerUserData->rewardPartnerCollection[0]->_id;
			Yii::app()->session['loggedInUser'] = $response->rewardPartnerUserData->firstName.' '.$response->rewardPartnerUserData->lastName;
			//Yii::trace('session: '.Yii::app()->session['userToken']);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}