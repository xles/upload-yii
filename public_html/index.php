<?php

require_once(dirname(__FILE__).'/../yii/framework/yii.php');
$config = dirname(__FILE__) . '/../application/config/main.php';

Yii::createWebApplication($config)->run();
