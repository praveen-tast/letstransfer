<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $applies_to_user
 * @property string $formula
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 */
Yii::import('application.models._base.BaseFixedCharges');
class FixedCharges extends BaseFixedCharges
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}