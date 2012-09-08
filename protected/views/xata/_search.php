<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_id'); ?>
		<?php echo $form->textField($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rental_m'); ?>
		<?php echo $form->textField($model,'rental_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rental_d'); ?>
		<?php echo $form->textField($model,'rental_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rental_h'); ?>
		<?php echo $form->textField($model,'rental_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visit'); ?>
		<?php echo $form->textField($model,'visit'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->