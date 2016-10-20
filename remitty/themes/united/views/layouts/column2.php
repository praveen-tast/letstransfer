<?php $this->beginContent('//layouts/main'); ?>
<div class="">
<?php  if(isset($this->breadcrumbs)):?>
		<?php  $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
		));  ?>
		<!-- breadcrumbs -->
		<?php  endif?>

     <div class="">
		<div id="content">
			<?php echo $content; ?>
		</div>
		<!-- content -->
	</div>
    

	<div class="span2 pull-right">

		<div id="sidebar">
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Allowed Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		?>
	</div>
	</div>
</div>

<?php $this->endContent(); ?>