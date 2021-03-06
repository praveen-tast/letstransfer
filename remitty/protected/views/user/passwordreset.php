<?php
$this->breadcrumbs = array(
    'Login' => array('/site/login'),
    'Password Reset'
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
        <?php echo CHtml::submitButton('Confirm'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>