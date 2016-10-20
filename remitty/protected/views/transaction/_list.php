
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'transaction-grid',
	'type'=>'bordered', // 'condensed','striped',
	'dataProvider' => $dataProvider,
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
			'class' => 'CxButtonColumn',
		),
	),
)); ?>