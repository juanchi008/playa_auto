<?php

// File name of Yii configuration
$yiiConfigFiles = "web.php";

// Dev Confirguration
if (strstr($_SERVER['SERVER_NAME'],'home.chronomedia.ca') != false || strstr($_SERVER['SERVER_NAME'],'localhost') != false || strstr($_SERVER['SERVER_NAME'],'laptop-rico') != false) {

	defined('YII_DEBUG') or define('YII_DEBUG', true);
	defined('YII_ENV') or define('YII_ENV', 'dev');

	ini_set('display_errors', true);
	
	error_reporting(E_ALL);
	$yiiConfigFiles = "web_dev.php";

}

// register Composer autoloader
require(__DIR__ . '/../vendor/autoload.php');

// include Yii class file
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// load application configuration
$config = require(__DIR__ . '/../config/'.$yiiConfigFiles);

// create, configure and run application
(new yii\web\Application($config))->run();


/*
 echo "SERVER['SERVER_NAME'] = ".$_SERVER['SERVER_NAME']."<br><br>\n";
echo "YII_DEBUG = ".YII_DEBUG."<br><br>\n";
echo "YII_ENV = ".YII_ENV."<br><br>\n";
echo "YII_ENV_PROD = ".YII_ENV_PROD."<br><br>\n";
echo "YII_ENV_DEV = ".YII_ENV_DEV."<br><br>\n";
echo "YII_ENV_TEST = ".YII_ENV_TEST."<br><br>\n";
//echo "YII_TRACE_LEVEL = ".YII_TRACE_LEVEL."<br><br>\n";
echo "YII_ENABLE_ERROR_HANDLER = ".YII_ENABLE_ERROR_HANDLER."<br><br>\n";
echo "--------------------------------------------------------------<br>\n";
*/