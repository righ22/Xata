<?php
$this->breadcrumbs=array(
	'User Xatas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserXata', 'url'=>array('index')),
	array('label'=>'Create UserXata', 'url'=>array('create')),
	array('label'=>'View UserXata', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserXata', 'url'=>array('admin')),
);
?>

<h1>Update UserXata <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>