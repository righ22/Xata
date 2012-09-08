<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-xata-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'xid'); ?>
		<?php echo $form->textField($model,'xid'); ?>
		<?php echo $form->error($model,'xid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rights'); ?>
		<?php echo $form->textField($model,'rights'); ?>
		<?php echo $form->error($model,'rights'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'public'); ?>
		<?php echo $form->textField($model,'public'); ?>
		<?php echo $form->error($model,'public'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->