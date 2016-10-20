<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * This is the model base class for the table "{{pickup_location}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PickupLocation".
 *
 * Columns in table "{{pickup_location}}" available as properties of the model,
 * followed by relations of table "{{pickup_location}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $country_code
 * @property string $city
 * @property string $pay_agent
 * @property string $address
 * @property string $telephone
 * @property string $timings
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property CountryCurrency $countryCode
 */
abstract class BasePickupLocation extends GxActiveRecord {


	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{pickup_location}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PickupLocation|PickupLocations', $n);
	}

	public static function representingColumn() {
		return 'city';
	}

	public function rules() {
		return array(
			array('country_code, city, pay_agent, address, telephone, timings', 'required'),
			array('created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('country_code', 'length', 'max'=>24),
			array('city, pay_agent, telephone', 'length', 'max'=>45),
			array('date_created, date_modified', 'safe'),
			array('date_created, date_modified, created_by, updated_by', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, country_code, city, pay_agent, address, telephone, timings, date_created, date_modified, created_by, updated_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'countryCode' => array(self::BELONGS_TO, 'CountryCurrency', 'country_code'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'country_code' => null,
			'city' => Yii::t('app', 'City'),
			'pay_agent' => Yii::t('app', 'Pay Agent'),
			'address' => Yii::t('app', 'Address'),
			'telephone' => Yii::t('app', 'Telephone'),
			'timings' => Yii::t('app', 'Timings'),
			'date_created' => Yii::t('app', 'Date Created'),
			'date_modified' => Yii::t('app', 'Date Modified'),
			'created_by' => Yii::t('app', 'Created By'),
			'updated_by' => Yii::t('app', 'Updated By'),
			'countryCode' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('country_code', $this->country_code);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('pay_agent', $this->pay_agent, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('telephone', $this->telephone, true);
		$criteria->compare('timings', $this->timings, true);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('updated_by', $this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}