<!--  form code start here -->



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id' => 'user-form',
	'type'=>'horizontal',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
	<!--  p class="help-block">Fields with <span class="required">*</span> are required.</p-->


 <!-- Register form -->
       <div class="form-register">
	        <div class="container">
			     <div class="row">
				    <div class="col-sm-12">
					   <div class="scection-heading">
						 <h2>Join now to lock-in your exchange rate</h2>
					   </div>
					   
					
					   	<?php //echo $form->errorSummary($model); ?>
					 </div>
				 </div>
			
			
			    <form class="row well">
				      <div class="col-sm-6">
						  <h3 class="form-heading">Personal Details</h3>
						  <div class="form-group">
						  
						    
						<?php echo $form->textFieldRow($model,'first_name',array('class'=>'form-control','maxlength'=>128)); ?>
							
						  </div>
						  
						  <div class="form-group">
						
						<?php echo $form->textFieldRow($model,'last_name',array('class'=>'form-control','maxlength'=>128)); ?>
						
						  </div>
						  
						  <div class="form-group">
												
						<?php echo $form->textFieldRow($model,'email',array('class'=>'form-control','maxlength'=>128)); ?>
						  </div>
						  
						  <div class="form-group">
						  
						<?php echo $form->passwordFieldRow($model,'password',array('class'=>'form-control','maxlength'=>512)); ?>
						  </div>
						  
						  <div class="form-group">
						 
						<?php echo $form->passwordFieldRow($model,'password_2',array('class'=>'form-control','maxlength'=>512)); ?>
				
						  </div>
						  
						  <div class="form-group">
						  <label>Gender</label> 
						<?php echo CHtml::activeDropDownList($model, 'gender', $model->getGenderOptions(),array('class'=>'form-control'));?>
						   
						  </div>
						  
						  <div class="form-group dob">
						    <label>Date of Birth</label> 
						    <?php echo CHtml::activeDropDownList($model, 'birth_date', $model->getDateOptions(),array('class'=>'form-control'));?>
						    <?php echo CHtml::activeDropDownList($model, 'birth_month', $model->getMonthOptions(),array('class'=>'form-control'));?>
						    <?php echo CHtml::activeDropDownList($model, 'birth_year', $model->getYearsArray(),array('class'=>'form-control'));?>
							
						  </div>
						  
						  
						  
						  
						    <div class="form-group">
						     <label>Country of birth </label> 
						  <?php echo CHtml::activeDropDownList($model, 'birth_country', $model->getCountry(),array('class'=>'form-control'));?>
							
						  </div>

						  <div class="form-group">
						     <?php echo $form->textFieldRow($model,'nationality',array('class'=>'form-control','maxlength'=>16)); ?>
			
						  </div>	
						  						  
						</div><!-- // col-sm-6 -->
						
						
						<div class="col-sm-6">
						  <h3 class="form-heading">Contact Details</h3>
						  <div class="form-group">
						  
						    <?php echo $form->textFieldRow($model,'mobile',array('class'=>'form-control','maxlength'=>16)); ?>
			
						  </div>
						  
						  <div class="form-group">
					
							  <?php echo $form->textFieldRow($model,'contact_address',array('class'=>'form-control','maxlength'=>16)); ?>
			
						  </div>
						  
						  <div class="form-group">
						  
							  <?php echo $form->textFieldRow($model,'city',array('class'=>'form-control','maxlength'=>16)); ?>
			
						  </div>
						  
						  <div class="form-group">
							  <?php echo $form->textFieldRow($model,'zipcode',array('class'=>'form-control','maxlength'=>16)); ?>
			
						  </div>
						  
						  <div class="form-group">
						   <label>Country </label> 
						    <?php echo $form->dropDownList($model, 'country', $model->getCountry(),array('class'=>'form-control'));?>
							
						   
						  </div>
						  
						  
						    <div class="form-group">
						   <?php echo $form->textFieldRow($model,'emirates_id',array('class'=>'form-control','maxlength'=>16)); ?>
			
						  </div>
						  
						  <div class="form-group">
						 
						<?php echo $form->datepickerRow($model, 'emirates_expiry',
							array('placeholder'=>'Click inside! to select a date.',
							'prepend'=>'<i class="icon-calendar"></i>','options'=>array(
									'format'=>'yyyy-mm-dd',
						))); ?>
						  </div>
						  
						  
						  
						  
						  
						  <div class="form-group upload">
						   <?php echo $form->labelEx($model,'emirates_front'); ?>
						
			<?php echo $form->fileField($model,'emirates_front',array('class'=>'btn btn-default btn-block')); ?>
							<span class="id_Proof_emirates_front" id="User_emirates_front" style="display: block;"><i class="fa fa-cloud-upload"></i>Upload ID Proof</span>
						 <?php echo $form->error($model,'emirates_front'); ?>
						  </div>
						  
						  <div class="form-group upload">
						   <?php echo $form->labelEx($model,'emirates_back'); ?>
						   
		  <?php echo $form->fileField($model,'emirates_back',array('class'=>'btn btn-default btn-block')); ?>
			<span class="id_Proof_emirates_back" id="User_emirates_back" style="display: block;"><i class="fa fa-cloud-upload"></i>Upload Address Proof</span>
						 
						  <?php echo $form->error($model,'emirates_back'); ?>
						  </div>
						  
						</div><!-- // col-sm-6 -->
						
						<div class="col-sm-12">
						  <div class="form-group">
						     <label>
						     	  <?php echo $form->checkboxRow($model,'tos'); ?>
							</label>
						  </div>
						</div>
						
						<div class="col-sm-12">
							<?php $this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'submit',
								'type'=>'primary',
								'label'=>'Submit',
								'htmlOptions'=>array(
								'class'=>'btn btn-danger btn-lg btn-block'		
							)
								
							)); ?>
						</div>
					
					  
						
				</form>
			</div>
	   </div>     
    <!-- Register Section -->   



<?php $this->endWidget(); ?>


<!-- form code ends here -->

