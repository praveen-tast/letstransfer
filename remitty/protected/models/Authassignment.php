<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property string $itemname
 * @property string $userid
 * @property string $bizrule
 * @property string $data
 */
Yii::import('application.models._base.BaseAuthassignment');
class Authassignment extends BaseAuthassignment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}