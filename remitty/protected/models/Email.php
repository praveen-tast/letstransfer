<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property integer $sender_id
 * @property string $to_email
 * @property string $from_email
 * @property string $subject
 * @property string $message
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $type_id
 */
Yii::import('application.models._base.BaseEmail');
class Email extends BaseEmail
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}