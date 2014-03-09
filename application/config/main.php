<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
 
return array(
	'basePath'    => dirname(__FILE__).'/../../application',
	'runtimePath' => dirname(__FILE__).'/../../runtime',
	
	'name' => 'Yii based backend for web upload service',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
//	'components'=>array(
//		'db'=>array(
//			'connectionString'=>'sqlite:protected/data/phonebook.db',
//		),
//	),
);