
<div class="main_section">
	<div class="container">
		<div class="sent_money_page">
			<div class="col-xs-12 uper_section">
				<h2 class="cust-heading">Send Money</h2>
				<p class="text-center step-text">100% Satisfaction. Or your money
					back.</p>
			</div>
			<div class="col-xs-12 detail_section">
				<div class="detail_sec_row first">      
					</h3>
				</div>
				<div class="detail_sec_row second">
					<div class="check_icon">
						<i class="green fa fa-check-circle" aria-hidden="true"></i>
					</div>
					<div class="select_country">
						<span class="select_txt"> <label>Send From</label>                                  <?php                                   $user = new User;                                  echo CHtml::activeDropDownList( $user, 'birth_country',  $user->getCountry_sendMoney(),array('class'=>'form-control'));?>							                                                      </span>
						<span class="select_txt"> <label>Send To</label>     
						<?php                                           
						echo CHtml::activeDropDownList( $user, 'birth_country',  $user->getCountry(),array('class'=>'form-control'));?>							                                                     </span>
					</div>
				</div>
				<div class="detail_sec_row second">
					<div class="check_icon">
						<i class="green fa fa-check-circle" aria-hidden="true"></i>
					</div>
					<div class="select_country">
						<span class=""> <label>Amount to send</label>
							<div class="form-group input_amount">
								<p>AED</p>
								<input type="number" name="amount" value="" placeholder="10.00">
							</div>
						</span>
						<div class="col-md-12 alert alert-info">Exchange Rate</div>
					</div>
				</div>
				<div class="detail_sec_row third">
					<div class="check_icon">
						<i class="green fa fa-check-circle" aria-hidden="true"></i>
					</div>
					<div class="select_country">
						<span> <label>Delivery Method</label>
							<div class="delivery_method">
								<p class="radio_btn">
									<input type="radio" name="payment" id="Bank"> <label for="Bank"
										class="now_active">Bank Deposit</label>
								</p>
								<p class="radio_btn">
									<input type="radio" name="payment" id="Cash"> <label for="Cash"
										class="">Cash Pickup</label>
								</p>
							</div>
						</span>
					</div>
				</div>
				<!-- div class="detail_sec_row third">
					<div class="check_icon">
						<i class="gray fa fa-check-circle" aria-hidden="true"></i>
					</div>
					<div class="select_country">
						<span> <label>Select Bank</label>
							<div class="delivery_method">
								<p class="radio_btn">
									<input type="radio" name="payment" id="pay1"> <label for="pay1"
										class="">                                      <?php //echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Layer9.png');?></label>
								</p>
								<p class="radio_btn cust_border">
									<input type="radio" name="payment" id="pay2"> <label for="pay2"
										class="">                                      <?php //echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Layer10.png');?></label>
								</p>
								<p class="radio_btn cust_border">
									<input type="radio" name="payment" id="pay3"> <label for="pay3"
										class=""><?php //echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Layer11.png');?></label>
								</p>
								<p class="radio_btn cust_border">
									<input type="radio" name="payment" id="pay4"> <label for="pay4"
										class="">                                      <?php //echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Layer12.png');?></label>
								</p>
								<p class="radio_btn cust_border">
									<input type="radio" name="payment" id="pay5"> <label for="pay5"
										class=""> <select>
											<option value="1">Cheese from 100+ banks</option>
											<option value="2">SBI</option>
											<option value="3">PNB</option>
											<option value="4">Yes bank</option>
									</select>
									</label>
								</p>
							</div>
						</span>
					</div>
				</div-->
				<div class="btn_continue">                   <?php echo CHtml::link('CONTINUE<i class="fa fa-angle-right" aria-hidden="true"></i>',array('site/SendMoneyStep2'));?>                 </div>
				<div class="progres_icon">
					<span><?php echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Forma1.png');?> About your recipient</span>
					<span><?php echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Forma11.png');?>Payment Method</span>
					<span><?php echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Forma12.png');?>Confirm</span>
				</div>
			</div>
		</div>
	</div>
</div>
