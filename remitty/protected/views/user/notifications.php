<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'My Account' => array("/user/account"),
    'My Recipients',
);


?>

<h1>My Notiifcations</h1>

<?php /* $this->widget('zii.widgets.CListView', array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_transaction',
  )); */ ?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->myNotifications(),
    'filter' => $model,
    'columns' => array(
        
        array(
            'name' => 'from_email',
            'value' => '$data->from_email'
        ), // display the 'name' attribute of the 'category' relation
        array(
            'name' => 'subject',
            'value' => '$data->subject'
        ), // display the 'content' attribute as purified HTML
        
        array(// display 'create_time' using an expression
            'name' => 'date_created',
            'value' => '$data->date_created',
        ),
        
        array(// display a column with "view", "update" and "delete" buttons
            'class' => 'CButtonColumn',
             'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label' => 'View the transaction status and details.',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/details.png',
                    'url'=>'Yii::app()->createUrl("recipient/view", array("id"=>$data->id))'
                    
                )
            )

        ),
    ),
));
?>
