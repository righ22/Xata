<?php
$this->breadcrumbs=array(
	'User Xatas',
);

$this->menu=array(
	array('label'=>'Create UserXata', 'url'=>array('create')),
	array('label'=>'Manage UserXata', 'url'=>array('admin')),
);
?>

<h1>User Xatas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
