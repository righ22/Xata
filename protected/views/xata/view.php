<?php
$this->breadcrumbs=array(
	'Xatas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('menu','List Xata'), 'url'=>array('index')),
	array('label'=>Yii::t('menu','Create Xata'), 'url'=>array('create')),
	array('label'=>Yii::t('menu','Update Xata'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('menu','Delete Xata'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('menu','Manage Xata'), 'url'=>array('admin')),
);

   
$this_xata_owner=Yii::app()->user->id==$model->owner;

?>

<div class='row-fluid'>
 <div class='internal_xata1 span12'> <div class='row-fluid'>
 <div class='span4'>
    <div id="xatava" class='thumbnail' style='margin-left: 20px;'>
      <img src='<?php echo Yii::app()->request->baseUrl; ?>/images/living_place.png' class="img-rounded" />
 		</div>
    <script>
      btn=$("<a class='btn'><?echo Yii::t('xata','Change');?><i class='icon-edit'></i></a>");
      btn.offset($('#xatava').offset());
      $('#xatava').append(btn);
    </script>  
 		
 </div>
 <div class='span8'>
 	 <div class='label label-xata1'  style='margin:1px;padding:5px;'> 
   <?
     $xt=new XataType;
     $xts=$xt->findByPk($model->type_id)->getParentList();
     foreach ($xts as $xt){
         if($xt!=$xts[0])echo "<i class='icon-arrow-right'></i>";
         echo $xt;
     }
   ?>
   <br/>
   </div>
   
   <div class='label <?if(!$model->cost) echo 'label-important'?>' style='margin:1px;padding:5px;'>
   <?if($model->cost){
       echo Yii::t('xata',"It's cost");
   ?>
   		<span class='label label-warning'><? echo $model->cost?>$</span>    
   <?}else
       echo Yii::t('xata',"No sell");
   ?>
   </div>
   <div class='label <?if(!($model->rental_m||$model->rental_d||$model->rental_h)) echo 'label-important'?>'  style='margin:1px;padding:5px;'>
   <?if($model->rental_m||$model->rental_d||$model->rental_h){?>
      <div class='label'>
   			<span class='label'><?echo Yii::t('xata',"Rent");?></span>

   			<span class='label <?if($model->rental_m) echo 'label-warning'?>'>
   			    <?echo $model->rental_m? $model->rental_m.'$':' -- '?></span>/
   			<span class='label <?if($model->rental_d) echo 'label-warning'?>'>
   			    <?echo $model->rental_d? $model->rental_d.'$':' -- '?></span>/
   			<span class='label <?if($model->rental_h) echo 'label-warning'?>'>
   			    <?echo $model->rental_h? $model->rental_h.'$':' -- '?></span>
   		</div>    
   <?}else
       echo Yii::t('xata',"Not aviable for rent");
   ?>
   </div>
   <?if($this_xata_owner){?>
   <div class='label <?if($model->visit) echo 'label-success'?>' style='margin:1px;padding:5px;'>
       <?if($model->visit){
           echo Yii::t('xata',"Welcome");
           echo "  <span class='label'>".Trust::_getCpt($model->visit).'</span>';
       ?>
       <?}else
           echo Yii::t('xata',"No guest");
       ?>
   </div>
   <?}else{?>
   <div class='label <?if($model->visit) echo 'label-success'?>' style='margin:1px;padding:5px;'>
       <?if($model->visit){
           echo Yii::t('xata',"Welcome");
           echo "  <span class='label'>".Trust::_getCpt($model->visit).'</span>';
       ?>
       <?}else
           echo Yii::t('xata',"No guest");
       ?>
   </div>   
   <?}?>
         
  </div>
  </div></div>   
</div>
<div class='row-fluid minmrg'>
  <div class="internal_xata1 span12" >
    <div class="row-fluid">
      <div class='span4'>
        <span class='label'><?echo $model->city->country->caption;?></span>
        <i class="icon-arrow-right"></i>
        <span class='label'><?echo $model->city->caption;?></span>
      </div>
      <div class='internal_xata2 span8'>
        <? echo $model->description; ?>
      </div>
    </div>  
     <?echo $model->address;?>
      <a class='btn' style="float:right"><?echo Yii::t('xata','Show on map');?><i class="icon-map-marker"></i></a>
 </div>
</div>
<div class='row-fluid minmrg'>
  <div id="xataimgs" class='inverted_xata span12'>
    <?
     if($images){
    ?>
    <ul class='thumbnails'>
    </ul>          
   <?}else{?>
    <p style="text-align:center">
      <strong>Note!</strong> There is no images.
    </p>  
   <?}?>
    
  </div>
    <script>
      btn=$("<a class='btn'><?echo Yii::t('xata','Add');?><i class='icon-plus'></i></a>");
      btn.offset($('#xataimgs').offset());
      $('#xataimgs').append(btn);
    </script>    
</div>
     