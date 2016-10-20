<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * @property integer $id
 * @property string $card_number
 * @property string $card_expiry
 * @property integer $cvc
 * @property string $state_address
 * @property string $zip
 * @property integer $state_id
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseCreditCard');
class CreditCard extends BaseCreditCard
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	
	public  function toArray()
	{
		$json_entry = array();
		$json_entry['name'] = $this->name_on_card;
		$json_entry['card_number'] = $this->card_number;
		$json_entry['card_expiry'] = $this->card_expiry;
		$json_entry['cvc'] = $this->cvc;
		$json_entry['state_address'] = $this->state_address;
		$json_entry['security_code'] = $this->security_code;
		$json_entry['zip'] = $this->zip;
		$json_entry['state_id'] = $this->state_id;
		$json_entry['type_id'] = $this->type_id;
		$json_entry['create_user_id'] = $this->create_user_id;
		$json_entry['create_time'] = $this->create_time;

		return $json_entry;
	}
}