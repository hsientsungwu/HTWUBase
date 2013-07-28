<?php
mb_internal_encoding('utf-8');
header("Content-Type: text/html; charset=utf-8");

// configuration
require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/master_config.php');

// special functions

// common functions

function __autoload($className) { 
	$classRoot = $_SERVER['DOCUMENT_ROOT'] . '/class/';

	// classes
	$class['dbMysqli']    	 = $classRoot . 'mysqli.class.php';

    if (file_exists($class[$className])) {
          require_once $class[$className]; 
          return true; 
    } 
      
    return false; 
}

// initialize mysql settings
$mysql = new MysqlSetting();

// initialize mysqli class
$db = new dbMysqli();
$db->open($mysql->database, $mysql->username, $mysql->password, $mysql->host);
$db->execute("SET CHARACTER SET utf8");