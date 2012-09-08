<?php
$this->breadcrumbs=array(
	'Xata Types',
);

$this->menu=array(
	array('label'=>'Create XataType', 'url'=>array('create')),
	array('label'=>'Manage XataType', 'url'=>array('admin')),
);
?>

<h1>Xata Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
