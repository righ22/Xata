<?php
$this->breadcrumbs=array(
	'User Trusts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserTrust', 'url'=>array('index')),
	array('label'=>'Create UserTrust', 'url'=>array('create')),
	array('label'=>'View UserTrust', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserTrust', 'url'=>array('admin')),
);
?>

<h1>Update UserTrust <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>