<?php


//default config file for db connection can also add other things
class Config{

	const DB_HOST = 'localhost',
		  DB_USER = 'quizer',
		  DB_PASS = '2f*pHT@<$mY9>5Kg',
		  DB_NAME = 'quiz';
}



//constants to be used later
//for example to use shorter paths

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
defined("RESOURCES_PATH")
	or define("RESOURCES_PATH", realpath(dirname(__FILE__).'/resources'));


// error reporting for dev stage
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//ini_set("error_reporting", "true");
//error_reporting(E_ALL);


?>