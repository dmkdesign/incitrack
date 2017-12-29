<?php
require_once( dirname(__FILE__) . '/../components/gridbid_functions.php');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'InciTrack',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.report.*',
		'application.modules.report.models.*',
		'application.modules.report.components.*',
		'application.modules.report.controllers.*',
		'application.modules.user.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',
		'application.extensions.OpenFlashChart2Widget.OpenFlashChart2Loader',
		'application.extensions.EGalleria.*',
		'application.extensions.CJuiDateTimePicker.*',
		'application.extensions.htmlTableUi.*',
		'application.extensions.jquery-gmap.*',
		'application.extensions.validators.*',
		'application.extensions.flowplayer.*',
	'application.extensions.YiiMailer.YiiMailer'
			
	),

	'modules'=>array(
		'report'=>array(
			'tableQuestion'=>'tbl_question',
			'tableChoices'=>'tbl_choices',
			'tablePage'=>'tbl_page',
			'page_size'=>'10'),
		'user' => array(
			'tableUsers' => 'tbl_users',
            'tableProfiles' => 'tbl_profiles',
            'tableProfileFields' => 'tbl_profiles_fields',
		'captcha'=>array('registration'=>true),),
		
			
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'adidas',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'tablePrefix' => 'tbl_',
			'connectionString' => 'mysql:host=localhost;dbname=incidents',
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
		'adminEmail'=>'InciTrack@dmkdesign.ca',
	),
);