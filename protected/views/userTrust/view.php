<?php
$this->breadcrumbs=array(
	'User Trusts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserTrust', 'url'=>array('index')),
	array('label'=>'Create UserTrust', 'url'=>array('create')),
	array('label'=>'Update UserTrust', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserTrust', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserTrust', 'url'=>array('admin')),
);
?>

<h1>View UserTrust #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid1',
		'uid2',
		'turst',
	),
)); ?>
