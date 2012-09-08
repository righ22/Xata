<?php
$this->breadcrumbs=array(
	'Xatas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('menu','List Xata'), 'url'=>array('index')),
	array('label'=>Yii::t('menu','Create Xata'), 'url'=>array('create')),
	array('label'=>Yii::t('menu','Update Xata'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('menu','Delete Xata'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('menu','Manage Xata'), 'url'=>array('admin')),
);
?>

<h1>View Xata #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type_id',
		'city_id',
		'address',
		'cost',
		'rental_m',
		'rental_d',
		'rental_h',
		'visit',
	),
)); ?>
