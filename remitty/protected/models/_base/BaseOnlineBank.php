<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * This is the model base class for the table "{{online_bank}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "OnlineBank".
 *
 * Columns in table "{{online_bank}}" available as properties of the model,
 * followed by relations of table "{{online_bank}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $payment_link
 * @property string $android_app_id
 * @property string $country_code
 * @property integer $status_id
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property CountryCurrency $countryCode
 */
abstract class BaseOnlineBank extends GxActiveRecord {

	
	public static function getStatusOptions($id = null)
	{
		$list = array("Draft","Published","Archive");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}	

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{online_bank}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'OnlineBank|OnlineBanks', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, payment_link, country_code, status_id', 'required'),
			array('status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('name, android_app_id', 'length', 'max'=>100),
			array('country_code', 'length', 'max'=>24),
			array('date_created, date_modified', 'safe'),
			array('android_app_id, date_created, date_modified, created_by, updated_by', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, payment_link, android_app_id, country_code, status_id, date_created, date_modified, created_by, updated_by', 'safe', 'on'=>'search'),
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
			'name' => Yii::t('app', 'Name'),
			'payment_link' => Yii::t('app', 'Payment Link'),
			'android_app_id' => Yii::t('app', 'Android App'),
			'country_code' => null,
			'status_id' => Yii::t('app', 'Status'),
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
		$criteria->compare('name', $this->name, true);
		$criteria->compare('payment_link', $this->payment_link, true);
		$criteria->compare('android_app_id', $this->android_app_id, true);
		$criteria->compare('country_code', $this->country_code);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('updated_by', $this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}