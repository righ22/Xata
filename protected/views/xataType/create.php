<?php
$this->breadcrumbs=array(
	'Xata Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List XataType', 'url'=>array('index')),
	array('label'=>'Manage XataType', 'url'=>array('admin')),
);
?>

<h1>Create XataType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>