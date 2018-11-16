<?php
	session_start();


    // load up your config file
    require_once(realpath(dirname(__FILE__) . "/resources/config.php"));
    require_once(RESOURCES_PATH."/database.php");
     
    // load header 
    require_once(TEMPLATES_PATH . "/header.php");
    //load middle part
    require_once(TEMPLATES_PATH . "/quiz_select.php");
    // load footer
    require_once(TEMPLATES_PATH . "/footer.php");
?>
