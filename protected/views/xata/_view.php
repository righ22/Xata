<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city->caption); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rental_m')); ?>:</b>
	<?php echo CHtml::encode($data->rental_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rental_d')); ?>:</b>
	<?php echo CHtml::encode($data->rental_d); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rental_h')); ?>:</b>
	<?php echo CHtml::encode($data->rental_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visit')); ?>:</b>
	<?php echo CHtml::encode($data->visit); ?>
	<br />

	*/ ?>

</div>