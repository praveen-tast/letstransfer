<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $name
 * @property string $payment_link
 * @property string $android_app_id
 * @property string $country_code
 * @property integer $status_id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 */
Yii::import('application.models._base.BaseOnlineBank');
class OnlineBank extends BaseOnlineBank
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}