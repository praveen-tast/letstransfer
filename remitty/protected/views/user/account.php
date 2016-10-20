<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'My Account'
	
);
?>

<h1>My Account</h1>
<div class="row">
    <a href="<?php echo Yii::app()->createUrl("/transaction/my")?>">My Transactions</a>
</div>
<div class="row">
    <a href="<?php echo Yii::app()->createUrl("/user/update")?>">My Profile</a>
</div>
<div class="row">
    <a href="<?php echo Yii::app()->createUrl("/recipient/index")?>">My Recipients</a>
</div>
<div class="row">
    <a href="<?php echo Yii::app()->createUrl("/user/changepassword")?>">Change Password</a>
</div>
<!--<div class="row">
    <a href="">Update security questions</a>
</div>-->