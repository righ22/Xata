<?php
$this->breadcrumbs=array(
	'User Trusts',
);

$this->menu=array(
	array('label'=>'Create UserTrust', 'url'=>array('create')),
	array('label'=>'Manage UserTrust', 'url'=>array('admin')),
);
?>

<h1>User Trusts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
