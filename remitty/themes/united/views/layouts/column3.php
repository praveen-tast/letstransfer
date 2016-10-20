<?php $this->beginContent('//layouts/main'); ?>
<div class="container-fluid">

    <div class="container">
    	<div class="row-fluid">
	<div class="span9">
		<div id="content">
			<?php echo $content; ?>
		</div>
		<!-- content -->
	</div>


 	<div class="span3 pull-right">

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
    </div>
</div>
<?php $this->endContent(); ?>
