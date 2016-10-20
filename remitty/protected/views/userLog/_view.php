<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
	<?php echo GxHtml::encode($data->user_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('notes')); ?>:
	<?php echo GxHtml::encode($data->notes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ip_address')); ?>:
	<?php echo GxHtml::encode($data->ip_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_created')); ?>:
	<?php echo GxHtml::encode($data->date_created); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('date_modified')); ?>:
	<?php echo GxHtml::encode($data->date_modified); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('created_by')); ?>:
	<?php echo GxHtml::encode($data->created_by); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_by')); ?>:
	<?php echo GxHtml::encode($data->updated_by); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('platform')); ?>:
	<?php echo GxHtml::encode($data->platform); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('browser')); ?>:
	<?php echo GxHtml::encode($data->browser); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('version')); ?>:
	<?php echo GxHtml::encode($data->version); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('severity_id')); ?>:
	<?php echo GxHtml::encode($data->severity_id); ?>
	<br />
	*/ ?>

</div>