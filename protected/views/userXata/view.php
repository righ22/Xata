<?php
$this->breadcrumbs=array(
	'User Xatas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserXata', 'url'=>array('index')),
	array('label'=>'Create UserXata', 'url'=>array('create')),
	array('label'=>'Update UserXata', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserXata', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserXata', 'url'=>array('admin')),
);
?>

<h1>View UserXata #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'xid',
		'rights',
		'public',
	),
)); ?>
