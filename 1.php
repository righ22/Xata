<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>  

  

  <!-- BOOTSTRAP -->  
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />  

  
  <!-- LESS stylesheets ->
  <link rel="stylesheet/less" href="less/main.less" type="text/css" />
  <script src="http://lesscss.googlecode.com/files/less-1.0.30.min.js"></script>

  <!-- CIRC-DROPROWN -->  
  <link rel="stylesheet" type="text/css" href="css/jqp-circular-dropdown.css" />
  <script src="js/jqp-circular-dropdown.js"></script>  
  
	<title>TestiCirc</title>
	<script>
	  $(document).ready(function(){
 			items=[
 			  {
 	 			  img:'images/house.png',
 	 			  val:1,
 	 			  caption:'Жилой',
 	 			  desc: 'hsdfsadkljfh klsadfh kdf klasdfh kl',
 	 	 			items:[
						{
							img:'images/land.png',
							val:10,
							caption:'Квартира',
							desc: 'hsdfsadkljfh klsadfh kdf klasdfh kl'
						},
 	 	 	 	 	]
 	 			},
			  {
	 	 			img:'images/land.png',
	 	 			val:3,
	 	 			caption:'Участок',
	 	 			desc: 'hsdfsadkljfh klsadfh kdf klasdfh kl'
	  		}, 	  		
			  {
	 	 			img:'images/commerce.png',
	 			  val:2,
 	 			  caption:'Коммерческий',
 	 			  desc: 'hsdfsadkljfh klsadfh kdf klasdfh kl'
	  		},	  		
 			  {
	 	 			img:'images/donno.png',
 	 			  val:4,
 	 			  caption:'Другой',
 	 			  desc: 'hsdfsadkljfh klsadfh kdf klasdfh kl'

 			  }
		 	];
 			$('#circ').circDropDown({items:items});
	  });
	</script>
</head>
<body>
	<div class='container row'>
		<div class='span8'>
 			<div id='circ'>
 			</div>
 	  </div>
	</div> 
</body>
</html>