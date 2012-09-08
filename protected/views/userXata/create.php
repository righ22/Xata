<?php
$this->breadcrumbs=array(
	'User Xatas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserXata', 'url'=>array('index')),
	array('label'=>'Manage UserXata', 'url'=>array('admin')),
);
?>

<h1>Create UserXata</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>