<?php
session_start();



    // load up your config file
    require_once(realpath(dirname(__FILE__) . "/config.php"));
    require_once(RESOURCES_PATH."/database.php");
     
    // load header 
    //require_once(TEMPLATES_PATH . "/header.php");

    //This page generates whole "body" for question_page.php
    //we need to include all html elements. That includes:
    //question text
    //answer boxes
    //progress bar
    //submit button
    
   	//create db object that uses created class Database
    $db = new Database;


    $answer = $_POST["answer"];
    $quiz = $_SESSION["quiz_id"];
    $quiz_total_questions = $db->quiz_question_count($quiz);
    
    // when last question is answered redirect to results.php page
 	if ($quiz_total_questions['question_count'] < $_SESSION["question_counter"]){

 		echo '<div class="center-block">';
 		echo '<h1 class=h3 mb-3 font-weight-normal">Test finished</h1>';
 		echo '<a class="btn btn-primary" href="./results.php" role="button">See results</a>';
 		echo '</div>';
 		exit;
 	}

    $question_counter = $_SESSION["question_counter"]++; // increase question_counter after setting it to $question_counter local variable
  
   	//get next question from db
    $question = $db->return_question((int)$quiz,$question_counter -1 );
    $question_text = $question["question"];
    //this will be used to get answers to question from db
    $q_id = $question["question_id"];
    // get answers from db for current question
    $answers = $db->return_answers((int)$q_id);

    //check previous answer unless this page is called to load first question
    if ($answer!="firstQuestionLoad"){

    	$is_right = $db->check_answer($answer);
    	if ($is_right['is_right']== 1){
    		$_SESSION["score"]++; // add to session score
    	}
    	// store answer to db regardless of result
   		// required variables $name,$quiz_id,$question_id,$answer_id,$session,$is_right
   		// 
   		//ENABLE LATER if actually neccessary. This is disabled to not overpopulate db
    	//$db->save_answer($_SESSION["name"],$quiz,$q_id,$answer,$_SESSION["session_id"],$is_right);

     }
  
?>
<!-- here we create response block -->


<div class="center-block">
	<h1 class="h3 mb-3 font-weight-normal"><?php echo $question_text ;?></h1>
	<div class="answers">
		<div class="">
			<?php 
				$counter=1;
				foreach ($answers as $val){
					if(($counter++ %2) == 1){ // two buttons per row
						echo '<div class="row">';
					}
				echo '<div class="col-sm"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="setActiveAnwser(this.id)" value="'.$val["answer_id"].'" id="answer_'.$val["answer_id"].'">'.$val["answer"].'</button></div>';

				if(($counter %2) == 1){ // two buttons per row
						echo '</div>';
					}
			}  ?>
		</div>
		<div class="row">
			<div class="progress">
				<?php //calculate value for progress bar
				$progress = round((($question_counter-1) /$quiz_total_questions["question_count"])*100) ;
				?>
  				<div class="progress-bar" role="progressbar" style="width: <?php echo $progress; ?>%" aria-valuenow=<?php echo '"'.$progress.'"'?> aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<div class="next">
		<input class="btn btn-primary" type="button" value="next" onclick="getSelectedAnswer()">
		</div>
	</div>
</div>
