<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 */
Yii::import('application.models._base.BaseRecipient');
class Recipient extends BaseRecipient
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}