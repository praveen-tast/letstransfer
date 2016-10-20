
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'credit-card-grid',
	'type'=>'bordered', // 'condensed','striped',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'card_number',
		'card_expiry',
		'cvc',
		array(
				'name' => 'state_address',
				'value'=>'$data->getStatusOptions($data->state_address)',
				'filter'=>CreditCard::getStatusOptions(),
				),
		'zip',
		/*
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>CreditCard::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>CreditCard::getTypeOptions(),
				),
		*/
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>