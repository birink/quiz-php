<?php

// create variable that uses Database class

$db=new Database;


?>

<body class="text-center">

<form class="form-quizSelect" action="question_page.php" method="POST">
<!-- form that uses POST method to select quiz. var = ($_POST["SelectedQuiz"]) -->
	<h1 class=h3 mb-3 font-weight-normal">Technical task Quiz</h1>
	<label for="inputName" class="sr-only">Name</label> 
	<input autocomplete="off" type="name" name="Name" id="Name" class="form-control" placeholder="Name" required autofocus>
	<label for="quizSelect" class="sr-only">Select Quiz</label>
	<select class="form-control" id="quizSelect" name="SelectedQuiz" >
		
		<option value="not_valid">Choose</option>
		<!-- load quizes with php.  -->
		<?php 
		//$db->get_quizes(); // populates databse variable with quiz
		$quizes = $db->return_quizes();
		//foreach ($db->quizes as $quiz ) {
		foreach ($quizes as $quiz){
			echo '<option value="'.$quiz["quiz_id"].'">'.$quiz["name"].'</option>'; // 
		}
		
		?>


	</select>

	<div class="col-auto my-1">
      <button type="submit" id="submitbtn" class="btn btn-primary">Start quiz</button>
    </div>
</form>


</body>