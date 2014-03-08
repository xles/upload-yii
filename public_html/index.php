<?php

// include Yii bootstrap file
require_once(dirname(__FILE__).'/../yii/framework/yii.php');
$config = dirname(__FILE__) . '/../application/config/main.php';

// create a Web application instance and run
Yii::createWebApplication($config)->run();
