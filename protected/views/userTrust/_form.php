<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-trust-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid1'); ?>
		<?php echo $form->textField($model,'uid1'); ?>
		<?php echo $form->error($model,'uid1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uid2'); ?>
		<?php echo $form->textField($model,'uid2'); ?>
		<?php echo $form->error($model,'uid2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'turst'); ?>
		<?php echo $form->textField($model,'turst'); ?>
		<?php echo $form->error($model,'turst'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->