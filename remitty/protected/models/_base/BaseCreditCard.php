<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * This is the model base class for the table "{{credit_card}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CreditCard".
 *
 * Columns in table "{{credit_card}}" available as properties of the model,
 * followed by relations of table "{{credit_card}}" available as properties of the model.
 *
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
 *
 * @property User $createUser
 */
abstract class BaseCreditCard extends GxActiveRecord {

	
	public static function getStatusOptions($id = null)
	{
		$list = array("Draft","Published","Archive");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}	
	

	public static function getTypeOptions($id = null)
	{
		$list = array("TYPE1","TYPE2","TYPE3");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}
 	public function beforeValidate()
	{
		if($this->isNewRecord)
		{
			if ( !isset( $this->create_user_id )) $this->create_user_id = Yii::app()->user->id;			
		if ( !isset( $this->create_time )) $this->create_time = new CDbExpression('NOW()');
		}else{
				}
		return parent::beforeValidate();
	}

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{credit_card}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'CreditCard|CreditCards', $n);
	}

	public static function representingColumn() {
		return 'card_number';
	}

	public function rules() {
		return array(
			array('card_number,name_on_card,state_address, zip,type_id', 'required'),
			array('cvc, state_id, type_id, create_user_id', 'numerical', 'integerOnly'=>true),
			array('card_number, state_address, zip', 'length', 'max'=>128),
			array('card_expiry, create_time', 'safe'),
			array('card_expiry, state_address, zip, state_id, type_id, create_user_id, create_time', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, card_number,name_on_card,security_code, card_expiry, cvc, state_address, zip, state_id, type_id, create_user_id, create_time', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'card_number' => Yii::t('app', 'Card Number'),
			'name_on_card' => Yii::t('app', 'Name on Card'),
			'card_expiry' => Yii::t('app', 'Card Expiry'),
			'cvc' => Yii::t('app', 'Cvc'),
			'state_address' => Yii::t('app', 'State Address'),
			'zip' => Yii::t('app', 'Zip'),
			'security_code' => Yii::t('app', 'Security Code'),
			'state_id' => Yii::t('app', 'State'),
			'type_id' => Yii::t('app', 'Card Type'),
			'create_user_id' => null,
			'create_time' => Yii::t('app', 'Create Time'),
			'createUser' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('card_number', $this->card_number, true);
		$criteria->compare('card_expiry', $this->card_expiry, true);
		$criteria->compare('cvc', $this->cvc);
		$criteria->compare('state_address', $this->state_address, true);
		$criteria->compare('zip', $this->zip, true);
		$criteria->compare('state_id', $this->state_id);
		$criteria->compare('type_id', $this->type_id);
		$criteria->compare('create_user_id', $this->create_user_id);
		$criteria->compare('create_time', $this->create_time, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}