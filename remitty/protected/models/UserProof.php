<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $user_id
 * @property string $path
 * @property string $proof_of_id
 * @property string $proof_of_profession
 * @property string $status
 * @property integer $id
 * @property string $date_created
 * @property string $date_modified
 */
Yii::import('application.models._base.BaseUserProof');
class UserProof extends BaseUserProof
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}