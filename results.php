<?php
session_start();

	// load up your config file
    require_once(realpath(dirname(__FILE__) . "/resources/config.php"));
     
    // load header 
    require_once(TEMPLATES_PATH . "/header.php");






$_SESSION["score"];
$_SESSION["name"];

?>

<body class="text-center">
<div class="center-block">
<h1 class=h2 mb-3 font-weight-normal">Thanks, <?php echo $_SESSION["name"]; ?></h1>
<p class=p1 mb-3 font-weight-normal">You responded correctly to  <?php echo $_SESSION["score"]; ?> out of <?php echo $_SESSION["question_counter"]-1?> questions</p>
<a class="btn btn-primary" href="./index.php" role="button">back to begining</a>
</div>
</body>	



<?php
//not storing final results because while testing it would overpopulate db records.


//ends user session
session_destroy();

?>


