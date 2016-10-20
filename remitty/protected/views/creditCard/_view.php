<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('card_number')); ?>:
	<?php echo GxHtml::encode($data->card_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('card_expiry')); ?>:
	<?php echo GxHtml::encode($data->card_expiry); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cvc')); ?>:
	<?php echo GxHtml::encode($data->cvc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('state_address')); ?>:
	<?php echo GxHtml::encode($data->state_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('zip')); ?>:
	<?php echo GxHtml::encode($data->zip); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('state_id')); ?>:
	<?php echo GxHtml::encode($data->state_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type_id')); ?>:
	<?php echo GxHtml::encode($data->type_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->createUser)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	*/ ?>

</div>