<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<meta name="language" content="en" />


<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<title><?php echo CHtml::encode($this->pageTitle); ?></title>


<link rel="stylesheet" type="text/css"	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/modified.css" />

<link rel="stylesheet" type="text/css"	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css"	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bxslider.css" />


    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">



</head>

<body>



    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                
    <a class="navbar-brand page-scroll" href="<?php echo Yii::app()->homeUrl;?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="Letsremit"></a>
                              

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                
                
                
                    <li>
                    <?php echo CHtml::link('Send Money to',array('site/sendMoney'));?>
                   </li>
                    <li>
                     <?php echo CHtml::link('how it works',array('site/how_it_works'));?>
                    </li>
                    <li><a  href="#">help</a></li>
                    <li>
                       <?php echo CHtml::link('Register',array('user/create'));?></li>
                   
					<?php if(Yii::app()->user->isGuest){?>
					
					<!-- Login Dropdown Starts -->
					<li class="dropdown"><a  href="#" class="btn btn-login dropdown-toggle" data-toggle="dropdown">login</a>
					<ul id="login-dp" class="dropdown-menu">
							<li>
								 <div class="row">
										<div class="col-md-12">
											Login via
											<div class="social-buttons">
												<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
												<a href="#" class="btn btn-gplus"><i class="fa fa-google-plus"></i> Google</a>
										
									
											</div>
											or
					<?php 
					
					   $model = new LoginForm();

                      $this->renderPartial('/user/login',array(

                                'model'=>$model,

                        ));
					   ?>

		
										<div class="bottom text-center">
											New here ?
											
											<?php echo CHtml::link('<b>Join Us</b>',array('user/create'));?>
											
										</div>
								 </div>
							</li>
						</ul>
					</li>
				<!-- Login Dropdown Ends here -->	
				
				<?php }else 
				{
					echo CHtml::link('Logout',array('user/logout'));
					
				}?>
					
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

           <?php 
					  				   
					   if(Yii::app()->user->hasFlash('success')): ?>
 
						<div class="flash-success">
						    <?php echo Yii::app()->user->getFlash('success'); ?>
						</div>
						 
						<?php endif; ?>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
		<?php //$this->renderNavBar();?>
		<!-- header -->

		
			
				<?php echo $content; ?>
	
	 <!------------------------- Footer ------------------------->
    <footer class="col-xs-12">
        <div class="row">
            <section class="bottom-links">
               <div class="container">
                 <div class="row">
                   <div class="col-sm-3">
                     <div class="links-box">
                       <h3>How it works</h3>
                       <ul>
                         <li><a href="#">About us</a></li>
                         <li><a href="#">Security</a></li>
                         <li><a href="#">Our Partners</a></li>
                         <li><a href="#">Support</a></li>
                         <li><a href="#">Terms and Conditions</a></li>
                       </ul>
                     </div>
                   </div> 
                   <div class="col-sm-3">
                     <div class="links-box">
                       <h3>Contact us</h3>
                       <ul>
                         <li><a href="#">Blog</a></li>
                         <li><a href="#">Check Transfer</a></li>
                         <li><a href="#">Media Centre</a></li>
                         <li><a href="#">Affiliates</a></li>
                         <li><a href="#">Careers</a></li>
                       </ul>
                     </div>
                   </div>
                   <div class="col-sm-3">
                     <div class="links-box">
                       <h3>Send money online</h3>
                       <ul>
                         <li><a href="#">Send money to Europe</a></li>
                         <li><a href="#">Send money to Africa</a></li>
                         <li><a href="#">Send money to the America</a></li>
                         <li><a href="#">Send money to Nigeria</a></li>
                         <li><a href="#">Send money to Poland</a></li>
                       </ul>
                     </div>
                   </div>
                   <div class="col-sm-3">
                     <div class="links-box">
                       <h3>Be in touch</h3>
                        <ul class="list-inline social-buttons">
                         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                         <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                         <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                         <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                       </ul>
                     </div>
                   </div>
                 </div>
               </div>
            </section>
            <div class="col-md-12 main-footer">
                <div class="container">
                    <div class="row">
                        <span class="copyright">Copyright &copy; Letsremit, 2016</span>
                    </div>
                </div>
            </div>
         </div>
    </footer>
<!------------------------- Footer ------------------------->
		<!-- footer -->
<!------------------------- jQuery ------------------------->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bxslider.min.js"></script>
	<script>
		$(document).ready(function(){
		  $('.bxslider').bxSlider();
		});
	</script>
	<script>
		$(function(){
		$(".input-group-btn .dropdown-menu li a").click(function(){

			var selText = $(this).html();

		   $(this).parents('.input-group-btn').find('.btn-search').html(selText);
		});
		});
	</script>	
<!------------------------- jQuery ------------------------->


</body>

</html>
