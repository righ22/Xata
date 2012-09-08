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
		<?php echo $form->label($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'xid'); ?>
		<?php echo $form->textField($model,'xid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rights'); ?>
		<?php echo $form->textField($model,'rights'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'public'); ?>
		<?php echo $form->textField($model,'public'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->