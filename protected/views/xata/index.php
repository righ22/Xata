<?php
$this->breadcrumbs=array(
	'Xatas',
);

$this->menu=array(
	array('label'=>Yii::t('menu','Create Xata'), 'url'=>array('create')),
//	array('label'=>'Manage Xata', 'url'=>array('admin')),
);
?>

<h1>Xatas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
