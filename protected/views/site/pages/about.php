<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>

<p>This is a "static" page. You may change the content of this page
by updating the file <tt><?php echo __FILE__; ?></tt>.</p>
<?php

Yii::import('ext.jquery-gmap.*');

$gmap = new EGmap3Widget();
$gmap->setSize(600, 400);

// base options
$options = array(
	'scaleControl' => true,
	'streetViewControl' => false,
	'zoom' => 10,
	'center' => array(40, 35),
	'mapTypeId' => EGmap3MapTypeId::HYBRID,
	'mapTypeControlOptions' => array(
		'style' => EGmap3MapTypeControlStyle::DROPDOWN_MENU,
		'position' => EGmap3ControlPosition::TOP_CENTER,
	),
	'zoomControlOptions' => array(
		'style' => EGmap3ZoomControlStyle::SMALL,
		'position' => EGmap3ControlPosition::BOTTOM_CENTER
	),
);
$gmap->setOptions($options);

$marker = new EGmap3Marker(array('title' => 'точнее где-то тут'));
$marker->address = 'Магистральная, Zaporozhie, Ukrain';
//$marker->latLng = array(18.466465, -66.118292);
//$marker->centerOnMap();
//$marker->setMapZoom(8);
$gmap->add($marker);

$polyOptions = array(
	'fillColor' => 'yellow',
	'strokeColor' => 'red'
);

$rectangleOptions = array_merge(
		$polyOptions, array('bounds' => array(40, -72, 42, -76))
);
$rectangle = new EGmap3Rectangle($rectangleOptions);
//$rectangle->centerOnMap();
$gmap->add($rectangle);

$polygon = new EGmap3Polygon($polyOptions);
$polygon->paths = array(
	array(18.466465, -66.118292),
	array(32.321384, -64.75737),
	array(25.774252, -80.190262),
	array(25.774252, -80.190262),
);
//$polygon->centerOnMap();
$gmap->add($polygon);

$polyline = new EGmap3Polyline(array('strokeColor' => 'orange'));
$polyline->path = array(
	array(25.774252, -80.190262),
	array(23.1168, -82.3885569),
	array(18.539269, -72.336408),
);
//$polyline->centerOnMap();
$gmap->add($polyline);

$circleOptions = array_merge(
		$polyOptions, array('radius' => 10000)
);


$circle = new EGmap3Circle($circleOptions);
$circle->address = 'Zaporozhie, Ukrain';
$callback = 'function(circle){alert("circle center: "+circle.getCenter());}';
$circle->addCallback($callback);
$gmap->add($circle);

// adding an info window automatically centers it on the map, overriding all other
// centering calls
$infoWindow = new EGmap3InfoWindow(
				array('content' => 'Собсно мы где-то здеся')
);
$infoWindow->address = 'Zaporozhie, Ukrain';
$gmap->add($infoWindow);

// adding a route automatically centers it on the map, overriding all other
// centering calls
$route = new EGmap3Route(array(
			'origin' => 'New York, NY',
			'destination' => 'Acapulco, México',
		));
$gmap->add($route);

$gmap->renderMap();

?>