<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $bizrule
 * @property string $data
 */
Yii::import('application.models._base.BaseAuthitem');
class Authitem extends BaseAuthitem
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}