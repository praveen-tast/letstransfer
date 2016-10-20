<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $country_code
 * @property integer $payment_id
 * @property string $description
 * @property string $name
 * @property string $logo
 * @property string $extra_variables
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $status_id
 * @property double $sending_limit
 */
Yii::import('application.models._base.BaseCountryPayment');
class CountryPayment extends BaseCountryPayment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}