<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create User</h1>
<?php 

$frm1=$this->renderPartial('_form', array('model'=>$model),true);
$this->widget('bootstrap.widgets.TbTabs', array(
                'id'=>'for_tabs',
                'tabs'=>array(
                    array('content'=>"figasse","label"=>'first'),
                    array('content'=>"<div>$frm1</div>","label"=>'last',"active"=>true)
                )
        ));
//echo $this->renderPartial('_form', array('model'=>$model)); 


?>