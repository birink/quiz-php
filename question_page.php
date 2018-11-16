<?php
session_start();
// load up your config file
require_once(realpath(dirname(__FILE__) . "/resources/config.php"));
     
// load header 
require_once(TEMPLATES_PATH . "/header.php");




// save some session variables for easier question counting etc...
$_SESSION["quiz_id"] = strip_tags( trim($_POST["SelectedQuiz"])); // some safety things. could add more checks in future.

$_SESSION["name"] = strip_tags( trim($_POST["Name"]));

$_SESSION["score"] = 0;

$_SESSION["question_counter"] = 1;

$_SESSION["session_id"] =  session_id();



?>


<script type="text/javascript" src="../js/q_page.js"></script>

<body class="text-center">

<!-- here we load next questions dynamicaly with question_loader.php -->
<div id="container" class="questions"></div>




</body>

<?php
// load footer
require_once(TEMPLATES_PATH . "/footer.php");



?>