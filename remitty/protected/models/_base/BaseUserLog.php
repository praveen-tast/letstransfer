<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * This is the model base class for the table "{{user_log}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserLog".
 *
 * Columns in table "{{user_log}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $notes
 * @property string $ip_address
 * @property string $date_created
 * @property string $date_modified
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $platform
 * @property string $browser
 * @property string $version
 * @property integer $severity_id
 *
 */
abstract class BaseUserLog extends GxActiveRecord {

	public function beforeValidate()
	{
		if($this->isNewRecord)
		{
			if ( !isset( $this->user_id )) $this->user_id = Yii::app()->user->id;			
	}else{
			}
		return parent::beforeValidate();
	}

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{user_log}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserLog|UserLogs', $n);
	}

	public static function representingColumn() {
		return 'notes';
	}

	public function rules() {
		return array(
			array('user_id, notes, ip_address, severity_id', 'required'),
			array('user_id, created_by, updated_by, severity_id', 'numerical', 'integerOnly'=>true),
			array('ip_address', 'length', 'max'=>100),
			array('platform, version', 'length', 'max'=>45),
			array('date_created, date_modified, browser', 'safe'),
			array('date_created, date_modified, created_by, updated_by, platform, browser, version', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, notes, ip_address, date_created, date_modified, created_by, updated_by, platform, browser, version, severity_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => Yii::t('app', 'User'),
			'notes' => Yii::t('app', 'Notes'),
			'ip_address' => Yii::t('app', 'Ip Address'),
			'date_created' => Yii::t('app', 'Date Created'),
			'date_modified' => Yii::t('app', 'Date Modified'),
			'created_by' => Yii::t('app', 'Created By'),
			'updated_by' => Yii::t('app', 'Updated By'),
			'platform' => Yii::t('app', 'Platform'),
			'browser' => Yii::t('app', 'Browser'),
			'version' => Yii::t('app', 'Version'),
			'severity_id' => Yii::t('app', 'Severity'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('notes', $this->notes, true);
		$criteria->compare('ip_address', $this->ip_address, true);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('updated_by', $this->updated_by);
		$criteria->compare('platform', $this->platform, true);
		$criteria->compare('browser', $this->browser, true);
		$criteria->compare('version', $this->version, true);
		$criteria->compare('severity_id', $this->severity_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}