<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'xata-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
  
  
	<div class="row">
	  <?php echo CHtml::label(Yii::t('xata', 'Type'),'#type_id_lvl0'); ?>
		<?php echo CHtml::dropDownList('type_id_lvl0','', 
		                    CHtml::listData(XataType::model()->findAll('parent is NULL'),'id','caption'),
                        array(
                          'style'=>'width:150px',
                          'empty'=>Yii::t('xata','Chose one...'),  
													'ajax' => array(
														'type'=>'POST', //request type
														'url'=>CController::createUrl('xataType/getchilds'), //url to call.
                                    //Style: CController::createUrl('currentController/methodToCall')
														'update'=>'#type_id_lvl1', //selector to update
                            //'data'=>'js:$("#type_id_lvl2").html("")'        
                            //'data'=>'js:javascript statement' 
                            //leave out the data key to pass all form values through
                           )
                          ));
		 ?>
		<?php echo CHtml::dropDownList('type_id_lvl1','',
		                    CHtml::listData(array(),'id','caption'),
                        array(
                          'style'=>'width:170px',                        
                          'empty'=>Yii::t('xata','More exactly...'),  
													'ajax' => array(
														'type'=>'POST', //request type
														'url'=>CController::createUrl('xataType/getchilds'), //url to call.
                                    //Style: CController::createUrl('currentController/methodToCall')
														'update'=>'#type_id_lvl2', //selector to update
                            //'data'=>'js:$("#type_id_lvl2").html("")' 
                            //leave out the data key to pass all form values through
                           )
                          ));
		 ?>
		<?php echo CHtml::dropDownList('type_id_lvl2','',
		
		                    CHtml::listData(array(),'id','caption'),
                        array('style'=>'width:170px','empty'=>Yii::t('xata','More exactly...'))
                        );  
    ?>
	</div>
  
  
  <div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>
  
	<?php echo CHtml::label(Yii::t('xata', 'Rent'),'#all_rent'); ?>
	<div id='all_rent' class="row">
		<?php //echo $form->labelEx($model,'rental_m'); ?>
		<?php //echo $form->labelEx($model,'rental_d'); ?>
		<?php //echo $form->labelEx($model,'rental_h'); ?>		
		<?php echo $form->textField($model,'rental_m',array('style'=>'width:170px')); ?>		
		<?php echo $form->textField($model,'rental_d',array('style'=>'width:170px')); ?>
		<?php echo $form->textField($model,'rental_h',array('style'=>'width:170px')); ?>

		<?php echo $form->error($model,'rental_m'); ?>
		<?php echo $form->error($model,'rental_d'); ?>		
		<?php echo $form->error($model,'rental_h'); ?>
	</div>
  
  <div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('style'=>'width:600px','maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>

		<?php echo $form->hiddenField($model,'city_caption',array('value'=>'1','id'=>'city_caption')); ?>
		<?php echo $form->hiddenField($model,'country_caption',array('value'=>'1','id'=>'country_caption')); ?>
		<?php echo $form->hiddenField($model,'country_short',array('value'=>'1','id'=>'country_short')); ?>

		<?php echo $form->hiddenField($model,'latitude',array('value'=>'1','id'=>'latitude')); ?>
		<?php echo $form->hiddenField($model,'longitude',array('value'=>'1','id'=>'longitude')); ?>
							
<?php  
Yii::import('ext.jquery-gmap.*');

$gmap = new EGmap3Widget();
$gmap->setSize(600, 400);
// base options
$options = array(
	'scaleControl' => true,
	'streetViewControl' => false,
	'zoom' => 10,
//	'center' => array(47.9, 35.3),
	'mapTypeId' => EGmap3MapTypeId::HYBRID,
	'mapTypeControlOptions' => array(
		'style' => EGmap3MapTypeControlStyle::DROPDOWN_MENU,
		'position' => EGmap3ControlPosition::TOP_CENTER,
	),
	'zoomControlOptions' => array(
		'style' => EGmap3ZoomControlStyle::SMALL,
		'position' => EGmap3ControlPosition::BOTTOM_CENTER
	),
);
$gmap->setOptions($options);
$gmap->renderMap(); 
?>
  </div>    
  <!-- 
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		?php echo $form->labelEx($model,'type_id'); ?>
		?php echo $form->dropDownList($model,'type_id',
		              CHtml::listData(XataType::model()->findAll(),//'parent IS NULL'),
                    'id', 
                    'caption')
		              ); 
		?>
		?php echo $form->error($model,'type_id'); ?>
	</div>
  ?php
    $gxt=XataType::model()->findAll('parent IS NULL');
    foreach($gxt  as $pxt){
        $items=array();
        $items[]=$pxt->getListed();
//        print_r($items);
//        $this->widget('ext.emenu.EMenu',array('items'=>$items,));
//        echo "<br/><br/>";        
    }
  ?>

<!-- 
	<div class="row">
	  ?php echo CHtml::label('Country','#country_id'); ?>
		?php echo CHtml::dropDownList('country_id','', 
		                    CHtml::listData(Country::model()->findAll(),'id','caption'),
                        array(
                          'empty'=>'Chose one...',  
													'ajax' => array(
														'type'=>'POST', //request type
														'url'=>CController::createUrl('xata/dynamiccities'), //url to call.
                                    //Style: CController::createUrl('currentController/methodToCall')
														'update'=>'#city_id', //selector to update
                            //'data'=>'js:javascript statement' 
                            //leave out the data key to pass all form values through
                           )
                          ));
		 ?>
	</div>

	<div class="row">
		?php echo $form->labelEx($model,'city_id'); ?>
		?php echo $form->dropDownList($model,'city_id',
		                CHtml::listData(array(),'id','caption'),
		                array('empty'=>'Chose country first...','id'=>'city_id')
		              
		); ?>
		?php echo $form->error($model,'city_id'); ?>
	</div>
-->

	<div class="row">
		<?php echo $form->labelEx($model,'visit'); ?>
		<?php echo $form->hiddenField($model,'visit',array('value'=>'5','id'=>'visit')); ?>
		<?php echo $form->error($model,'visit'); ?>
<?
$this->widget('application.extensions.jui.ESlider',
              array(                    
                    'name'=>'slider',
                    'theme'=>'cupertino',
                    'enabled'=>true,
                    'minValue'=>-1.0,
                    'maxValue'=>11.0,
                    'value'=>array(5.0),
                    'linkedElements'=>array('visit'),
                    'numberOfHandlers'=>1,
                    'range'=>false,
                    'htmlOptions'=>array('style'=>'width:200px;height:10px;')
                   )
             );
?>	
		
	</div>
	
<?php
/*
$this->widget('zii.widgets.jui.CJuiSliderInput', array(
    'name'=>'rate',
    'value'=>37,
    // additional javascript options for the slider plugin
    'options'=>array(
        'min'=>10,
        'max'=>50,
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
*/
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->