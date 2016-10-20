<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $user_id
 * @property integer $email_transaction_approve
 * @property integer $email_transaction_cancel
 * @property integer $email_transaction_receive
 * @property integer $email_transaction_confirm
 * @property integer $email_transaction_withdraw
 * @property integer $notif_transaction_approve
 * @property integer $notif_transaction_cancel
 * @property integer $notif_transaction_receive
 * @property integer $notif_transaction_confirm
 * @property integer $notif_transaction_withdraw
 */
Yii::import('application.models._base.BaseUserSettings');
class UserSettings extends BaseUserSettings
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}