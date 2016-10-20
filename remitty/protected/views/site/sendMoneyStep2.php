<!------------------------- Navigation ------------------------->
<div class="main_section">
	<div class="container">
		<div class="sent_money_page">
			<div class="col-xs-12 uper_section">
				<h2 class="cust-heading">Send Money</h2>
				<p class="text-center step-text">100% Satisfaction. Or your money
					back.</p>
			</div>
			<div class="col-xs-12 detail_section top_detail_sec">
				<div class="new_detail_row detail_sec_row first">                               
				<?php echo CHtml::image(Yii::app()->theme->baseUrl.'/img/1.png','',array('class'=>'send_money_img'));?>                                          <h3>Delivery</h3>
					<a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				</div>
				<div class="sub_detaill">
					<h4>Send to India</h4>
					<div class="amount">
						<p>658.30</p>
						<span>$10.00</span>
					</div>
				</div>
				<div class="sub_detaill">
					<div class="sub_detail_row">
						<span>EXPRESS DELIVERY OPTION</span>
						<p>HDFC BANK</p>
					</div>
					<div class="amount">
						<p>$3.999</p>
					</div>
				</div>
			</div>
	
			
				<div class="col-xs-12 detail_section top_detail_sec">
				<div class="new_detail_row detail_sec_row first">
					<img class="send_money_img"
						src="<?php echo Yii::app()->theme->baseUrl.'/img/Forma14.png'?>">
					<h3>About John</h3>
					<a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				</div>
				<div class="sub_detaill">
					<div class="sub_detail_row">
						<span>Recipient's Bank Account</span>
						<p>Ending in 7491</p>
						<p>Branch Code IDIB000S176</p>
						<span>Recipient Details</span>
						<h4>John Doe</h4>
						<p>10 Phase</p>
						<p>Mohali, Punjab</p>
						<p>+91 (859) 149-9720</p>
					</div>
				</div>
			</div>
				
			<div class="col-xs-12 detail_section">
			
			
				<div class="new_border detail_sec_row third">
					<div class="check_icon">
						<i class="green fa fa-check-circle" aria-hidden="true"></i>
					</div>
					<div class="select_country">
						<span> <label>Payment Method</label>
							<div class="delivery_method">
								<p class="radio_btn">
									<input type="radio" name="payment" id="Cash"> <label for="Cash"
										class="border_row">Bank Account</label>
								</p>
								<p class="radio_btn">
									<input type="radio" name="payment" id="Bank"> <label for="Bank"
										class="now_active">Debit Card</label>
								</p>
								<p class="radio_btn">
									<input type="radio" name="payment" id="Cash_card"> <label
										for="Cash_card" class="">Credit Card</label>
								</p>
							</div>
						</span>
					</div>
				</div>
				<div class="new_border detail_sec_row third">
					<div class="check_icon">
						<i class="gray fa fa-check-circle" aria-hidden="true"></i>
					</div>
					<div class="select_country">
						<label>Card Details</label>
						<form class="delivery_method demo_form">
							<input type="text" name="card" placeholder="Card Number"> <select
								class="input_size">
								<option value="volvo">Exp. Month</option>
								<option value="saab">1</option>
								<option value="mercedes">2</option>
								<option value="audi">3</option>
							</select> <select class="input_size">
								<option value="volvo">Exp. Year</option>
								<option value="saab">2020</option>
								<option value="mercedes">2021</option>
								<option value="audi">2022</option>
							</select> <input class="input_size" type="text" name="name"
								placeholder="CVV"> <input type="text" name="name"
								placeholder="Your name, as it appears on card">
						</form>
					</div>
				</div>
			<div class="btn_continue">
					<a type="button">CONTINUE <i class="fa fa-angle-right"
						aria-hidden="true"></i></a>
				</div>
				<div class="progres_icon">
					<span>						<?php echo CHtml::image(Yii::app()->theme->baseUrl.'/img/Forma12.png');?> Confirm</span>
				</div>
			
			</div>
			
			
			
			
		</div>
	</div>
</div>
