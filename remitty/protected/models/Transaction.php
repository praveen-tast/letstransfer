<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $transaction_id
 * @property string $reference_id
 * @property string $from_country
 * @property string $to_country
 * @property integer $sender_id
 * @property integer $recipient_id
 * @property integer $status_id
 * @property integer $payment_from_id
 * @property integer $payment_to_id
 * @property double $send_amount
 * @property double $receive_amount
 * @property double $total_to_pay
 * @property double $fees_applied
 * @property double $conversion_rate_applied
 * @property string $conversion_rate_on
 * @property string $payment_to_information
 * @property string $payment_from_information
 * @property string $sending_reason
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 */
Yii::import('application.models._base.BaseTransaction');
class Transaction extends BaseTransaction
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}