<!--  form code start here -->
<div class="form well">


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id' => 'transaction-form',
	'type'=>'horizontal',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<?php echo $form->textFieldRow($model,'from_country',array('class'=>'span5','maxlength'=>24)); ?>


<?php echo $form->textFieldRow($model,'to_country',array('class'=>'span5','maxlength'=>24)); ?>


<?php echo $form->radioButtonListRow($model, 'sender_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>


<?php echo $form->textFieldRow($model,'recipient_id',array('class'=>'span5')); ?>


<?php echo $form->dropDownListRow($model, 'status_id',
			$model->getStatusOptions()); ?>


<?php echo $form->textFieldRow($model,'send_amount',array('class'=>'span5')); ?>


<?php echo $form->textFieldRow($model,'receive_amount',array('class'=>'span5')); ?>


<?php echo $form->textFieldRow($model,'total_to_pay',array('class'=>'span5')); ?>


<?php echo $form->textFieldRow($model,'fees_applied',array('class'=>'span5')); ?>


<?php echo $form->textFieldRow($model,'conversion_rate_applied',array('class'=>'span5')); ?>


<?php echo $form->datepickerRow($model, 'conversion_rate_on',
					array('hint'=>'Click inside! to select a date.',
					'prepend'=>'<i class="icon-calendar"></i>'))
; ?>


<?php echo $form->textFieldRow($model,'delivery_method',array('class'=>'span5','maxlength'=>24)); ?>


<?php echo $form->datepickerRow($model, 'date_created',
					array('hint'=>'Click inside! to select a date.',
					'prepend'=>'<i class="icon-calendar"></i>'))
; ?>


<?php echo $form->datepickerRow($model, 'date_modified',
					array('hint'=>'Click inside! to select a date.',
					'prepend'=>'<i class="icon-calendar"></i>'))
; ?>


<?php echo $form->textFieldRow($model,'update_user_id',array('class'=>'span5')); ?>


<?php echo $form->datepickerRow($model, 'update_time',
					array('hint'=>'Click inside! to select a date.',
					'prepend'=>'<i class="icon-calendar"></i>'))
; ?>





	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->