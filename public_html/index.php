<?php
date_default_timezone_set('UTC');
defined('YII_DEBUG') or define('YII_DEBUG',true);
if (class_exists('finfo'));
	echo 'fuck you, yii';
require_once(dirname(__FILE__).'/../yii/framework/yii.php');
$config = dirname(__FILE__) . '/../application/config/main.php';
Yii::createWebApplication($config)->run();
