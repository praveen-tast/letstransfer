<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property string $parent
 * @property string $child
 */
Yii::import('application.models._base.BaseAuthitemchild');
class Authitemchild extends BaseAuthitemchild
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}