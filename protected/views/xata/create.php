<?php
$this->breadcrumbs=array(
	'Xatas'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>Yii::t('menu','List Xata'), 'url'=>array('index')),
	array('label'=>Yii::t('menu','Manage Xata'), 'url'=>array('admin')),
);
 */
?>
<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>  
-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-autocomplete.min.js"></script>
<h3>Добавить Хату</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<script>
$('#type_id_lvl0').bind('change',function(){
	$('#type_id_lvl2').html('');
	$('#type_id_lvl1').html('');
});
function refreshAddr(gma3_position, z00m){
  
  if(typeof(z00m)=='undefined')
    z00m=$("#yw0").gmap3('get').getZoom();
  $("#yw0").gmap3(
    {action:'clear', name:'marker'},  
    {
      action:'getAddress',
      latLng:gma3_position,
      callback:function(results){
        var map = $(this).gmap3('get'),
        content = results && results[0] ? results && results[0].formatted_address : '';
        $('#Xata_address').val(content);

        addr=results[0].address_components;
        var country=null,city=null,alt_city=null;
        var longitude=results[0].geometry.location.Ya, latitude=results[0].geometry.location.Xa;
        for(var i=0;i<addr.length;i++){
          if(addr[i].types[0]=='country'){
            country=addr[i];    
          }
          else if(addr[i].types[1]=='political'){
              alt_city=addr[i];    
          }
          if(addr[i].types[0]=='locality'){
              city=addr[i];    
          }
        }  
        
        $('#country_caption').val(country.long_name);  
        $('#country_short').val(country.short_name);
        if(city)
          $('#city_caption').val(city.long_name);  
        else
        	$('#city_caption').val(alt_city.long_name);
    		$('#longitude').val(longitude);  
    		$('#latitude').val(latitude);
        
      }
    },
    {
      action:'addMarker',
      latLng:gma3_position,
      map:{
        center:true,
        zoom: z00m
      },
      marker:{
        options:{
          draggable:true,
          icon:new google.maps.MarkerImage('<?php echo Yii::app()->request->baseUrl; ?>/images/the_nest.png')
        },
        events:{
          dragend: function(marker){
            console.log(marker);
            refreshAddr(marker.getPosition());
          }
        }//events            
      }// marker
    }  
  );
  
}

  //alert(geoip_longitude()+' and '+geoip_latitude());
  
//  alert(JSON.stringify(jQuery('#yw0').gmap3({'action':'geoLatlng'})));
//jQuery('#yw0').gmap3({'action':'setCenter','args':[geoip_longitude(),geoip_latitude()]});

$('#yw0').gmap3(
{ 
  action : 'geoLatLng',
  callback : function(latLng){
    refreshAddr(latLng,16);
  }
});

$('#Xata_address').autocomplete({
  source: function() {
    $("#yw0").gmap3({
      action:'getAddress',
      address: $(this).val(),
      callback:function(results){
        if (!results) return;
        $('#Xata_address').autocomplete('display', results, false);
      }
    });
  },
  cb:{
    cast: function(item){
      return item.formatted_address;
    },
    select: function(item) {
      refreshAddr(item.geometry.location);
    }
  }
});   

/*
GEvent.addListener(gmap, "click", function(overlay, latlng) {
	alert(1);
	/*
	var lat = latlng.lat(); 
	var lon = latlng.lng(); 
	var point = new GLatLng(lat, lon); 
	gmap.addOverlay(new GMarker(point,markerOptions));
	/ 
}); 
/*
//$("#yw0").gmap3();
 

*/
</script>