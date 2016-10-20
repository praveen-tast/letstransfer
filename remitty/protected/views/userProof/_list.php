
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-proof-grid',
	'type'=>'bordered', // 'condensed','striped',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'user_id',
		'path:html',
		'proof_of_id:html',
		'proof_of_profession:html',
		array(
				'name' => 'status',
				'value'=>'$data->getStatusOptions($data->status)',
				'filter'=>UserProof::getStatusOptions(),
				),
		'id',
		/*
		'date_created',
		'date_modified',
		*/
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>