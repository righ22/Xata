<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
  
  <!-- JQUERY , JQUERY-UI -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-autocomplete.css" />  
  
  <script src="http://j.maxmind.com/app/country.js" charset="ISO-8859-1" type="text/javascript"></script>
  <script src="http://j.maxmind.com/app/geoip.js" charset="ISO-8859-1" type="text/javascript" ></script>
  <!--
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>  

  

  <!-- BOOTSTRAP -->  
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />  
  <!--<script src="<?php  //echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>-->
  
  <!-- LESS stylesheets -->
  <link rel="stylesheet/less" href="<?php echo Yii::app()->request->baseUrl; ?>/less/main.less" type="text/css" />
  <script src="http://lesscss.googlecode.com/files/less-1.0.30.min.js"></script>
  
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
         
			  <img src='<?php echo Yii::app()->request->baseUrl; ?>/images/the_nest.png' style='position: fixed; left: 20px;top: 35px;'/>
			  <img src='<?php echo Yii::app()->request->baseUrl; ?>/images/guest_nest.png'/>
  			<img src='<?php echo Yii::app()->request->baseUrl; ?>/images/secure_logo.png' style='margin-top:5px;float:right;'/>
  			<span class='label label-warning' style='float:right'><?echo '('.Yii::app()->user->name.')';?></span>
			</div>
		</div>	
	</div>        

	<div class='container' id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbMenu',array(
      'type'=>'pills',  
			'items'=>array(
//				array('label'=>Yii::t('menu', 'Home'), 'url'=>array('/site/index')),
        //array('label'=>Yii::t('menu', 'Houses'), 'url'=>array('/xata')),
        array('label'=>Yii::t('menu', 'Nests'), 'url'=>array('/xata')),                    
				array('label'=>Yii::t('menu', 'Guests'), 'url'=>array('/user')),          
        array('label'=>Yii::t('menu', 'XataType'), 'url'=>array('/xataType')),          
//				array('label'=>Yii::t('menu','About'), 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>Yii::t('menu','Contact'), 'url'=>array('/site/contact')),
				array('label'=>Yii::t('menu','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('class'=>'srtsrt','label'=>Yii::t('menu','Logout').'('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				array('label'=>Yii::t('menu','Me'), 'url'=>array('/site/login'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

<div class="container" id="page">

	<div class="navbar navbar-inverse" id="notifications">
	  <div class="navbar-inner">
      	<ul class="nav nav-pills">
					<li id="logo111"><a href='#'><span class="badge badge-warning">4</span><?php echo CHtml::encode(Yii::app()->name)."(".Yii::app()->getLanguage().")"."(".Yii::app()->getRequest()->getPreferredLanguage().")"; ?></a></li>
					<li><a href='#' >Nearplaces</a></li>
				</ul>
		</div>
	</div><!-- notifications -->
<!-- 
	<div id="header">
		<div id="logo2"><?php //echo CHtml::encode(Yii::app()->name)."(".Yii::app()->getLanguage().")"."(".Yii::app()->getRequest()->getPreferredLanguage().")"; ?></div>
	</div><!-- header -->

	<?php if(isset($this->breadcrumbs)):
     $tmp=array();
     foreach($this->breadcrumbs as $k=>&$e){
          // Semantics redefenition
         if($e=="Xata") $e="House";
         if($e=="Xatas") $e="Houses";
         if($k=="Xata") $k="House";         
         if($k=="Xatas") $k="Houses";         
         
         if($e=="User") $e="Human";
         if($e=="Users") $e="People";
         if($k=="User") $k="Human";
         if($k=="Users") $k="People";
         
         if(is_array($e))
           $tmp[Yii::t('menu',$k)]=$e;
         else
           $tmp[]=Yii::t('menu',$e);
     }    
     $this->breadcrumbs=$tmp;    
     
    ?>
		<?php 
    $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
        ));
    ?><!-- breadcrumbs -->
	<?php endif?>

	<?php //echo Yii::t('menu',Yii::t('app', 'n==1#one book|n>1#many books', 10));?>
    
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
