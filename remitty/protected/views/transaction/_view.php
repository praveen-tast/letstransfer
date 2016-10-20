<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from_country')); ?>:
	<?php echo GxHtml::encode($data->from_country); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('to_country')); ?>:
	<?php echo GxHtml::encode($data->to_country); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sender_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->sender)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('recipient_id')); ?>:
	<?php echo GxHtml::encode($data->recipient_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status_id')); ?>:
	<?php echo GxHtml::encode($data->status_id); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('send_amount')); ?>:
	<?php echo GxHtml::encode($data->send_amount); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('receive_amount')); ?>:
	<?php echo GxHtml::encode($data->receive_amount); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total_to_pay')); ?>:
	<?php echo GxHtml::encode($data->total_to_pay); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fees_applied')); ?>:
	<?php echo GxHtml::encode($data->fees_applied); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('conversion_rate_applied')); ?>:
	<?php echo GxHtml::encode($data->conversion_rate_applied); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('conversion_rate_on')); ?>:
	<?php echo GxHtml::encode($data->conversion_rate_on); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('delivery_method')); ?>:
	<?php echo GxHtml::encode($data->delivery_method); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_created')); ?>:
	<?php echo GxHtml::encode($data->date_created); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->createUser)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_user_id')); ?>:
	<?php echo GxHtml::encode($data->update_user_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />
	*/ ?>

</div>