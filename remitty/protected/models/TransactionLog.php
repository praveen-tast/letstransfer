<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $transaction_id
 * @property integer $transaction_status_id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $notes
 * @property string $browser
 * @property string $platform
 * @property string $version
 */
Yii::import('application.models._base.BaseTransactionLog');
class TransactionLog extends BaseTransactionLog
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}