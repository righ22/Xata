<?php
$this->breadcrumbs=array(
	'User Trusts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserTrust', 'url'=>array('index')),
	array('label'=>'Manage UserTrust', 'url'=>array('admin')),
);
?>

<h1>Create UserTrust</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>