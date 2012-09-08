<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Xata',
  
  'language'=>'ru',
  'sourceLanguage'=>'en',
    
	// preloading 'log' component
	'preload'=>array(
      'log',
      'bootstrap',
      'less',
  ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345678',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
    'hybridauth' => array(
            'baseUrl' => 'http://'. $_SERVER['SERVER_NAME'] . '/xata/hybridauth', 
            'withYiiUser' => false, // Set to true if using yii-user
            "providers" => array ( 
                "openid" => array (
                    "enabled" => true
                ),
 
                "yahoo" => array ( 
                    "enabled" => true 
                ),
 
                "google" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id"     => "879959396808.apps.googleusercontent.com", 
                                         "secret" => "5hNh9SqDpHYF1hakOxTTNdbJ" ),
                    //"scope"   => ""
                ),
 
                "facebook" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id"     => "351291861621071", 
                    										 "secret" => "aeeb8d2880ab7d53ae396079e9efa9a4" ),
                    "scope"   => "email,publish_stream", 
                    "display" => "" 
                ),
 
                "twitter" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "key" => "", "secret" => "" ) 
                )
            ),
            "debug_mode" => true,
        		"debug_file" => "F:/hauth.log",
            /*
            'proxy' => array(
                'url'=>'10.0.87.202',
                'port'=>'8059',
                'user'=>'tatarenko',
                'password'=>'den2007',                
            ),
            */        
    ),      
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
    'bootstrap'=>array(
        'class'=>'ext.bootstrap.components.Bootstrap'
    ),
    'less'=>array(
        'class'=>'ext.less.components.LessCompiler',
        'forceCompile'=>false, // indicates whether to force compiling
        'paths'=>array(
            'less/style.less'=>'css/style.css',
        ),
    ),      

		'urlManager'=>array(
            'urlFormat'=>'path',
		        'showScriptName'=>false,
		        'urlSuffix'=>'.html', 
						'rules'=>array(
                'user/<id:\d+>'=>'user/view',
                //'pattern2'=>'route2',
                //'pattern3'=>'route3',
                //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                //'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
    ),		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=xata',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),      
      
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
  'defaultController' => 'site',
);