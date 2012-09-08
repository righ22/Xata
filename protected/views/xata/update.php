<?php
$this->breadcrumbs=array(
	'Xatas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Xata', 'url'=>array('index')),
	array('label'=>'Create Xata', 'url'=>array('create')),
	array('label'=>'View Xata', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Xata', 'url'=>array('admin')),
);
?>

<h1>Update Xata <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>