<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $full_name
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $status_msg
 * @property string $date_of_birth
 * @property integer $gender
 * @property string $contact_address
 * @property string $city
 * @property string $country
 * @property string $nationality
 * @property integer $zipcode
 * @property string $emirates_front
 * @property string $emirates_back
 * @property string $emirates_id
 * @property string $emirates_expiry
 * @property integer $tos
 * @property integer $news_letters
 * @property integer $role_id
 * @property integer $state_id
 * @property integer $type_id
 * @property string $last_visit_time
 * @property string $last_action_time
 * @property string $last_password_change
 * @property string $activation_key
 * @property integer $login_error_count
 * @property integer $create_user_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseUser');
class User extends BaseUser
{
	const STATUS_INACTIVE 	= 0;
	const STATUS_ACTIVE 	= 1;
	const STATUS_BANNED 	= 2;
	const STATUS_REMOVED 	= 3;
	
	
	const ROLE_NONE = 0;
	const ROLE_ADMIN = 1;
	const ROLE_USER = 2;
	const ROLE_DRIVER = 3;
	
	
	private static $password_expiration_day = 90;
	protected static $salt1 = "" ;
	protected static $hashFunc='md5' ;
	public static $offline_indication_time = 300;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function setUserOnline()
	{
		if ( !Yii::app()->user->isGuest)
		{
			$user = User::model()->findByPk(Yii::app()->user->id);
			if ( $user )
			{
				$user->last_action_time = date("Y-m-d H:i:s");
				//	echo $user->last_action_time;
	
				$user->saveAttributes(array('last_action_time'));
			}
		}
	}
	public function setPassword($password)
	{
		if ($password != ''  ) {
			$this->password = User::encrypt($password);
			return $this->save(false,'password');
		}
		return false;
	}
	public static function encrypt($string = "")
	{
		$salt = self::$salt1;
		$hashFunc = self::$hashFunc;
		$string = sprintf("%s%s%s", $salt, $string, $salt);
	
		if (!function_exists($hashFunc))
			throw new CException('Function `' . $hashFunc . '` is not a valid callback for hashing algorithm.');
	
		return $hashFunc($string);
	}
	
	public static function encrypt2($string = "")
	{
		$out = create_hash($string);
		return $out;
	}
	public static function validate_password($password_under_test, $password_real)
	{
		return (User::encrypt( $password_under_test) == $password_real);
	}
	public function register()
	{
		$to      = $this->email;
	
		$subject = ' Your Account at: ' . Yii::app()->params['company'];
	
		$body 	= 'Your profile has been successfully submitted. In order to make a money transfer, please visit one of our exchange locations and physically present your Emirates ID. Individuals must produce his/her valid Emirates ID card. After successful identification a confirmation email will be sent to the email provided during registration.' ."\r\n";
		//$body 	.= CHtml::link ( 'Activate', $this->getActivationUrl());
		$body 	.= 'Thank you for choosing Letsremit.com. If you have questions, need help or assistance on other subjects please email xxx or call number xxx';
		$body 	.= ' ' ."\r\n";
		$body 	.= 'Thanks' ."\r\n";
		$body 	.= 'Admin' ."\r\n";
	
		$headers = 'From: ' . Yii::app()->params['adminEmail'] . "\r\n" .
				'Reply-To: ' . Yii::app()->params['adminEmail'] ."\r\n" .
				//	'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		@mail($to, $subject, $body, $headers);
	
		//if ( YII_ENV == 'dev' && !isset( Yii::app()->controller->module ) )
			//echo $body;
	}
public function logout()
	{
		if ( !Yii::app()->user->isGuest) {
			$this->last_action_time =date("Y-m-d H:i:s");
			$this->saveAttributes(array('last_action_time'));
		}
	}
	public function updateLastVisit()
	{
		if ( !Yii::app()->user->isGuest) {
			$this->last_visit_time = date("Y-m-d H:i:s");//new CDbExpression('NOW()');
			$this->saveAttributes(array('last_visit_time'));
		}
	}
	public function isActive()
	{
		return ($this->state_id == User::STATUS_ACTIVE);
	}
	public function getIsAdmin()
	{
		if($this->role_id == self::ROLE_ADMIN) return true;
		return false;
	}
	public function getIsManager()
	{
		if($this->role_id == self::ROLE_ADMIN) return true;
		return false;
	}
	public function getIsUser()
	{
		if($this->role_id == self::ROLE_USER)
			return true;
		return false;
	}

	public function sendPassword()
	{
		$password = self::randomPassword();
	
		$this->setPassword($password, $password);
	
		$to      = $this->email;
	
		$subject = 'Password for : ' . Yii::app()->params['company'];
	
		$body 	 = 'Email ID: ' . $this->email . "\r\n";
		$body 	.= 'Password: ' . $password . "\r\n";
		$body 	.= ' ' ."\r\n";
		$body 	.= 'Thanks' ."\r\n";
		$body 	.= 'Admin' ."\r\n";
	
		$headers = 'From: ' . Yii::app()->params['adminEmail'] . "\r\n" .
				'Reply-To: ' . Yii::app()->params['adminEmail'] ."\r\n" .
				//	'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		@mail($to, $subject, $body, $headers);
	
		if ( YII_ENV == 'dev' && !isset( Yii::app()->controller->module ) ) echo $body;
	}
	public static function randomPassword($count = 8) {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$alphabet = "abcdefghijklmnopqrstuwxyz0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < $count; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);; //turn the array into a string
	}
}