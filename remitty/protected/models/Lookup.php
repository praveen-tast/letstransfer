<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $code
 * @property string $value
 * @property string $description
 */
Yii::import('application.models._base.BaseLookup');
class Lookup extends BaseLookup
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}