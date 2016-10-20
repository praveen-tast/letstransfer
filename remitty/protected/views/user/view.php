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
'email',
'mobile',
'first_name',
'last_name',

'date_of_birth',
'gender',
'contact_address:html',
'city',
'country',
'zipcode',
'emirates_front',
'emirates_back',
'facebook_id',
//'tos',
//'news_letters',
//'role_id',


'create_user_id'
	),
)); ?>


<?php  /* $this->widget('CommentPortlet', array(
	'model' => $model,
));*/
?>