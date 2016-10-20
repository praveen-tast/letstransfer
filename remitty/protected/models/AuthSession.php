<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $auth_code
 * @property string $device_token
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 * @property string $update_time
 */
Yii::import('application.models._base.BaseAuthSession');
class AuthSession extends BaseAuthSession
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public static function authenticateSession($auth_code = null)
	{
	
		// just exit if login is not required.
		if ( !Yii::app()->user->isGuest ) return;
	
		if ( $auth_code == null)
		{
			$headers = getallheaders();
			$auth_code = isset($headers['auth_code']) ? $headers['auth_code'] : null;
			if ( $auth_code == null ) $auth_code = Yii::app()->request->getQuery('auth_code');
			// just exit if auth code is null
			if (  $auth_code == null ) return;
		}
	
		$auth_session = AuthSession::model()->findbyAttributes( array ( 'auth_code'=>$auth_code));
	
		if ($auth_session)
		{
			$user = $auth_session->createUser;
	
			$identity = new UserIdentity($user, $user);
			$identity->authenticateSession($user);
	
			switch($identity->errorCode) {
				case UserIdentity::ERROR_NONE:
					$duration = 3600*24*30; // 30 days
					Yii::app()->user->login($identity,$duration);
					$auth_session->save(); // update time is changed here
					return true;
					break;
				case UserIdentity::ERROR_STATUS_USER_DOES_NOT_EXIST:
					$user->addError('status', Yii::t('app','User doesnt exists.'));
					break;
			}
		}
	
		//if ( Yii::app()->module != null && Yii::app()->module->id == 'api')
		{
			$controller = Yii::app()->controller;
			$arr = array('controller'=>$controller->id, 'action'=>$controller->action->id,'status' =>'NOK');
				
			header('Content-type: application/json');
			echo json_encode($arr);
			Yii::app()->end();
		}
		return false;
	}

}