
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-grid',
	'type'=>'bordered', // 'condensed','striped',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'full_name',
		'email',
		'mobile',
		'first_name',
		'last_name',
		/*
		array(
				'name' => 'status_msg',
				'value'=>'$data->getStatusOptions($data->status_msg)',
				'filter'=>User::getStatusOptions(),
				),
		'date_of_birth',
		'gender',
		'contact_address:html',
		'city',
		'country',
		'zipcode',
		'image_file',
		'facebook_id',
		'tos',
		'news_letters',
		'role_id',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>User::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>User::getTypeOptions(),
				),
		'last_visit_time',
		'last_action_time',
		'last_password_change',
		'login_error_count',
		*/
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>