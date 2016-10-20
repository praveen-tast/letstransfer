<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header">
	<h1><?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
</div>
<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'transaction-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'from_country',
		'to_country',
		array(
			'name'=>'sender_id',
			'value'=>'GxHtml::valueEx($data->sender)',
			'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
			),
		'recipient_id',
		array(
				'name' => 'status_id',
				'value'=>'$data->getStatusOptions($data->status_id)',
				'filter'=>Transaction::getStatusOptions(),
				),
		/*
		'send_amount',
		'receive_amount',
		'total_to_pay',
		'fees_applied',
		'conversion_rate_applied',
		'conversion_rate_on',
		'delivery_method',
		'date_created',
		'date_modified',
		'update_user_id',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions' => array('nowrap'=>'nowrap'),
		),
	),
)); ?>