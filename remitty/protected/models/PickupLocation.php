<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $country_code
 * @property string $city
 * @property string $pay_agent
 * @property string $address
 * @property string $telephone
 * @property string $timings
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 */
Yii::import('application.models._base.BasePickupLocation');
class PickupLocation extends BasePickupLocation
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}