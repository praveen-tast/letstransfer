<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property integer $user_id
 * @property string $notes
 * @property string $ip_address
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $platform
 * @property string $browser
 * @property string $version
 * @property integer $severity_id
 */
Yii::import('application.models._base.BaseUserLog');
class UserLog extends BaseUserLog
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}