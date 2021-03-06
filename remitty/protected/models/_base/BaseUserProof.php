<?php

/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
 
/**
 * This is the model base class for the table "{{user_proof}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserProof".
 *
 * Columns in table "{{user_proof}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $user_id
 * @property string $path
 * @property string $proof_of_id
 * @property string $proof_of_profession
 * @property string $status
 * @property integer $id
 * @property string $date_created
 * @property string $date_modified
 *
 */
abstract class BaseUserProof extends GxActiveRecord {

	
	public static function getStatusOptions($id = null)
	{
		$list = array("Draft","Published","Archive");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}	
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
		return '{{user_proof}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserProof|UserProofs', $n);
	}

	public static function representingColumn() {
		return 'path';
	}

	public function rules() {
		return array(
			array('user_id, path, proof_of_id, proof_of_profession, status, date_created, date_modified', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>55),
			array('user_id, path, proof_of_id, proof_of_profession, status, id, date_created, date_modified', 'safe', 'on'=>'search'),
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
			'user_id' => Yii::t('app', 'User'),
			'path' => Yii::t('app', 'Path'),
			'proof_of_id' => Yii::t('app', 'Proof Of'),
			'proof_of_profession' => Yii::t('app', 'Proof Of Profession'),
			'status' => Yii::t('app', 'Status'),
			'id' => Yii::t('app', 'ID'),
			'date_created' => Yii::t('app', 'Date Created'),
			'date_modified' => Yii::t('app', 'Date Modified'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('path', $this->path, true);
		$criteria->compare('proof_of_id', $this->proof_of_id, true);
		$criteria->compare('proof_of_profession', $this->proof_of_profession, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('id', $this->id);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('date_modified', $this->date_modified, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}