<?php
error_reporting(0);
date_default_timezone_set("Asia/Kuala_Lumpur");
//error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING & ~E_NOTICE);

// change the following paths if necessary
//$yii='../../../../html/yii/framework/yii.php';
$yii='../../yii-version/1.1.24/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
define('YII_ENABLE_ERROR_HANDLER', true);
define('YII_ENABLE_EXCEPTION_HANDLER', true);

require_once($yii);
Yii::createWebApplication($config)->run();
