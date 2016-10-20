<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);


?>

<div class="page-header">
<h1><?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
</div>

<?php   $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'buttons'=>$this->actions,
	'type'=>'success',
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'from_country',
'to_country',
array(
			'name' => 'sender',
			'type' => 'raw',
			'value' => $model->sender !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->sender)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->sender, true))) : null,
			),
'recipient_id',
array(
				'name' => 'status_id',
				'type' => 'raw',
				'value'=>$model->getStatusOptions($model->status_id),
				),
'send_amount',
'receive_amount',
'total_to_pay',
'fees_applied',
'conversion_rate_applied',
'conversion_rate_on',
'delivery_method',
'date_created',
'date_modified',
array(
			'name' => 'createUser',
			'type' => 'raw',
			'value' => $model->createUser !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createUser)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->createUser, true))) : null,
			),
'create_time',
'update_user_id',
'update_time',
	),
)); ?>


<?php   $this->widget('CommentPortlet', array(
	'model' => $model,
));
?>