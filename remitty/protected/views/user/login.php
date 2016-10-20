
	             <?php 
					  				   
					   if(Yii::app()->user->hasFlash('login_error_msg')): ?>
 
						<div class="flash-success">
						    <?php echo Yii::app()->user->getFlash('login_error_msg'); ?>
						</div>
						 
						<?php endif; ?>
<?php 	
				   $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
					   		'id' => 'login-form',
					   		'enableClientValidation'=>true,
				   		//'enableAjaxValidation'=>true,
				   		/*'enableClientValidation'=>true,*/
					   		'action'=>$this->createUrl('user/login'),
					   		'focus'=>array($model,'email'),
					   		'clientOptions'=>array(
					   				'validateOnSubmit'=>true,
					   
					   		)
				   		
				   		
				   ));
					   ?>
					   	<div class="auth-form-body">
					   
					   		<?php echo $form->errorSummary($model); ?>
					   		<?php if(isset($_GET['action'])) echo CHtml::hiddenField('returnUrl',
					   			urldecode($_GET['action'])); ?>
					   
					   			<div class="form-group">
					   			<?php
					   			
					   			echo $form->textField($model,'username',array('maxlength'=>128,'placeholder'=>'Email','class'=>'form-control '));
					   			?>
					   		</div>
					   			<div class="form-group">
					   			<?php echo $form->passwordField($model,'password',array('maxlength'=>512,'placeholder'=>'Password','class'=>'form-control')); ?>
					   		  <div class="help-block text-right"><p><?php echo CHtml::link('Forgot Password?',$this->createUrl('user/recover')); ?></p>
					             
					   		</div>
					   		<div class="form-group">
					   		
					   		
					   		    <?php /*echo CHtml::ajaxSubmitButton(
              'send', //the label
              '', //the url = index if empty (or set to another controllerAction)
              array('class'=>'btn btn-primary') //your htmlOptions
              ); 
*/
              $this->widget('bootstrap.widgets.TbButton', array(
					   					'buttonType'=>'submit',
					   					'htmlOptions'   =>array('class'=>'btn btn-primary btn-block'),
					   					//'type'=>'primary',
					   					'label'=>'Login',
					   		)); ?>
					   		
					   		
					   		   <?php /*echo CHtml::ajaxSubmitButton('Login',CHtml::normalizeUrl(array('user/login','render'=>true)),
             array(
                 'dataType'=>'json',
                 'type'=>'post',
                 'success'=>'function(data) {
                     $("#AjaxLoader").hide();  
                    if(data.status=="success"){
                     $("#formResult").html("form submitted successfully.");
                     $("#user-form")[0].reset();
                    }
                     else{
                    $.each(data, function(key, val) {
                    $("#user-form #"+key+"_em_").text(val);                                                    
                    $("#user-form #"+key+"_em_").show();
                    });
                    }       
                }',                    
                 'beforeSend'=>'function(){                        
                       $("#AjaxLoader").show();
                  }'
                 ),array('id'=>'mybtn','class'=>'btn btn-primary btn-block'));*/ ?>
					   		
					   		
					   	</div><!-- form -->
					   		
					   				<div class="checkbox">
					   			<?php echo $form->checkBoxRow($model,'rememberMe',array('style'=>'')); ?>
					               </div>
					               </div>
					               
					               
					   		
					   	
					   	<?php $this->endWidget(); ?>
					   					   
					   
					   
										</div>