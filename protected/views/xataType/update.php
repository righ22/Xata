<?php
$this->breadcrumbs=array(
	'Xata Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List XataType', 'url'=>array('index')),
	array('label'=>'Create XataType', 'url'=>array('create')),
	array('label'=>'View XataType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage XataType', 'url'=>array('admin')),
);
?>

<h1>Update XataType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>