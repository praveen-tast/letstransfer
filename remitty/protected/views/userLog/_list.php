
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-log-grid',
	'type'=>'bordered', // 'condensed','striped',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'user_id',
		'notes:html',
		'ip_address',
		'date_created',
		'date_modified',
		/*
		'created_by',
		'updated_by',
		'platform',
		'browser:html',
		'version',
		'severity_id',
		*/
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>