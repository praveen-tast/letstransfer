<div class="wide form">

<?php 	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'id' => 'transaction-form',
	'type'=>'horizontal',		
)); ; 
?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'from_country'); ?>
		<?php echo $form->textField($model, 'from_country', array('maxlength' => 24)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'to_country'); ?>
		<?php echo $form->textField($model, 'to_country', array('maxlength' => 24)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'sender_id'); ?>
		<?php echo $form->dropDownList($model, 'sender_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'recipient_id'); ?>
		<?php echo $form->textField($model, 'recipient_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status_id'); ?>
		<?php 
			$this->widget('ext.widgets.CJuiRadioButtonList', array(
			'model'=>$model,
			'attribute'=>'status_id',
			'data'=>$model->getStatusOptions(),
			)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'send_amount'); ?>
		<?php echo $form->textField($model, 'send_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'receive_amount'); ?>
		<?php echo $form->textField($model, 'receive_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'total_to_pay'); ?>
		<?php echo $form->textField($model, 'total_to_pay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fees_applied'); ?>
		<?php echo $form->textField($model, 'fees_applied'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'conversion_rate_applied'); ?>
		<?php echo $form->textField($model, 'conversion_rate_applied'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'conversion_rate_on'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'conversion_rate_on',
			'value' => $model->conversion_rate_on,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'delivery_method'); ?>
		<?php echo $form->textField($model, 'delivery_method', array('maxlength' => 24)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_created'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date_created',
			'value' => $model->date_created,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_modified'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date_modified',
			'value' => $model->date_modified,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_user_id'); ?>
		<?php echo $form->dropDownList($model, 'create_user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_time'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'create_time',
			'value' => $model->create_time,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'update_user_id'); ?>
		<?php echo $form->textField($model, 'update_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'update_time'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'update_time',
			'value' => $model->update_time,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
