<?php
$this->breadcrumbs = array(
    'My Account' => array('/user/account'),
    'Change Password'
);
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">
        Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'old_password'); ?>
        <?php
        echo $form->passwordField($model, 'old_password', array(
            'size' => 45,
            'maxlength' => 45
        ));
        ?>
        <?php echo $form->error($model, 'old_password'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php
        echo $form->passwordField($model, 'password', array(
            'size' => 45,
            'maxlength' => 45
        ));
        ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password_repeat'); ?>
        <?php
        echo $form->passwordField($model, 'password_repeat', array(
            'size' => 45,
            'maxlength' => 45
        ));
        ?>
        <?php echo $form->error($model, 'password_repeat'); ?>
    </div>
    
    <div class="row buttons">
		<?php echo CHtml::submitButton('Update'); ?>
	</div>

	<?php $this -> endWidget(); ?>
</div>