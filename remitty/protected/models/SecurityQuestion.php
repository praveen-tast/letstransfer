<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property integer $user_id
 * @property string $question
 * @property string $answer
 */
Yii::import('application.models._base.BaseSecurityQuestion');
class SecurityQuestion extends BaseSecurityQuestion
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}