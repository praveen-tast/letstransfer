<?php
/**
 * Company: Yee Technologies Pvt. Ltd. < www.yeetechnologies.com >
 * Author : Praveen Shivhare < praveen.tuffgeekers@gmail.com >
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	{$this->modelClass}::label(2),
	Yii::t('app', 'Index'),
);\n";
?>
?>

<div class="page-header">
<h1><?php echo '<?php'; ?> echo GxHtml::encode(<?php echo $this->modelClass;?>::label(2)); ?></h1>
</div>

<?php echo "<?php"; ?> 

<?php /*echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/?>

$this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));

<?php '?>'; ?>