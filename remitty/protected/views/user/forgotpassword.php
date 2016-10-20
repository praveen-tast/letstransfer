

<div class="form new_form">
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


    <div class="">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php
        echo $form->emailField($model, 'email');
        ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>




    <div class="buttons">
        <?php echo CHtml::submitButton('Confirm'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>