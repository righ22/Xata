<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid1')); ?>:</b>
	<?php echo CHtml::encode($data->uid1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid2')); ?>:</b>
	<?php echo CHtml::encode($data->uid2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('turst')); ?>:</b>
	<?php echo CHtml::encode($data->turst); ?>
	<br />


</div>