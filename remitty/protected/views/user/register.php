<?php
/* @var $this UserController */

$this->breadcrumbs = array(
    'Login' => array("/site/login"),
    'Register',
);
?>
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>



<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
    'inlineErrors' => false,
    'enableAjaxValidation' => true,
        ));
?>

<div class="registeration">
<div class="page-header">
    <h1>Register </h1>
</div>



<fieldset>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="span6">
          <legend>Personal Details</legend>
            <?php
            echo $form->textFieldRow($model, 'email_address', array(
                'size' => 45,
                'maxlength' => 45,
                'autocomplete' => 'off',
                'hint' => 'This is your username'
            ));
            ?>

            <?php
            echo $form->passwordFieldRow($model, 'password', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php
           /*  echo $form->passwordFieldRow($model, 'password_repeat', array(
                'size' => 45,
                'maxlength' => 45
            )); */
            ?>

            <?php
            echo $form->textFieldRow($model, 'first_name', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>
            <?php
            echo $form->textFieldRow($model, 'middle_name', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php
            echo $form->textFieldRow($model, 'last_name', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php echo $form->textFieldRow($model, 'dob', array('class' => 'date_field')); ?>
        </div>
<!--        <div class="span1 visible-desktop visible-tablet hidden-phone" style="height:500px;width:1px;border-right: 1px solid #e5e5e5" >

        </div>-->

        <div class="span5">

            <legend>Contact Details</legend>

            <?php echo $form->dropDownListRow($model, 'country', Country::getCountries("sender"), array('empty' => "Select Country"));
            ?>

            <?php
            echo $form->textFieldRow($model, 'mobile_phone', array(
                'prepend' => "+<span id='country_phone_code'>" . $model->countryCode->phone_code . "</span>"
            ));
            ?>

            <?php
            echo $form->textFieldRow($model, 'home_phone', array(
                'prepend' => "+<span id='country_phone_code'>" . $model->countryCode->phone_code . "</span>"
                
            ));
            ?>


            <?php
            echo $form->textFieldRow($model, 'flat_no', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php
            echo $form->textFieldRow($model, 'building_no', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php
            echo $form->textFieldRow($model, 'street', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php
            echo $form->textFieldRow($model, 'city', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php
            echo $form->textFieldRow($model, 'region', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>

            <?php
            echo $form->textFieldRow($model, 'postcode', array(
                'size' => 45,
                'maxlength' => 45
            ));
            ?>


        </div>
    </div>
    <?php
    echo $form->checkBoxRow($model, 'accept_terms', array(
        'size' => 45,
        'maxlength' => 45
    ));
    ?>
    <?php if (CCaptcha::checkRequirements()):
        ?>

        <div>
            <?php // $this->widget('CCaptcha'); ?>
            <?php // echo $form->textFieldRow($model, 'verifyCode', array('hint' => 'Please enter the letters as they are shown in the image above.Letters are not case-sensitive.')); ?>
            
            <?php $this->widget('CCaptcha'); ?>                            
            <?php echo $form->textField($model,'verifyCode'); ?>
            <?php  echo $form->error($model,'verifyCode'); ?>
                <p class="reg_detail_para_note">Please enter the letters as they are shown in the image above.Letters are not case-sensitive.
                    </p>
        </div>

    <?php endif; ?>
</fieldset>
<div style="clear:both"></div>
<div class="form-actions">


    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit')); ?>

</div>

<div style="display:none">

    <?php
    echo $form->dropDownList($model, "country_phone_code", Country::getCountriesPhoneCode(), array("empty" => "select", "disabled" => "disabled"))
    ?>


</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">


    $(document).ready(function() {

        $("select#User_country").on("change", function() {
            var code = $(this).val();

            var phone_code = $("select#User_country_phone_code").find("option[value=" + code + "]").text();
            $("span#country_phone_code").html(phone_code);


        });


    });

</script>
</div>