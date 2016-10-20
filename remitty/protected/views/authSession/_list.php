
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'auth-session-grid',
	'type'=>'bordered', // 'condensed','striped',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'auth_code',
		'device_token',
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>AuthSession::getTypeOptions(),
				),
		'update_time',
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>