<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property string $timezone
 */
Yii::import('application.models._base.BaseTimezones');
class Timezones extends BaseTimezones
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}