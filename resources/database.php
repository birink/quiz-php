<?php

//load config

require_once(realpath(dirname(__FILE__) . "/config.php"));




class Database{

	// variables loaded from config.php (not using ini this time)
	private $host = Config::DB_HOST;
	private $user = Config::DB_USER;
	private $pass = Config::DB_PASS;
	private $dbname = Config::DB_NAME;

	//some private variables that can be returned via public functions
	private $conn;
	private $quizes;
	private $answers;
	private $question;
	private $data;

	//class constructor
	public function __construct() {
		// initialize connection to db
		$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		if ($this->conn->connect_errno){ // returns errors
			die("Connection error: ".$this->conn->connect_errno);
		}
	}

	//get available quizes from db to populate quiz_select page
	private function get_quizes(){

		$query=$this->conn->query("SELECT * FROM quizes");
		while ($row=$query->fetch_array(MYSQLI_ASSOC)){

			//add fetched rows to ques array
			$this->quizes[]=$row;
		}
	}

	// since variable is private we need function to access it
	public function return_quizes(){

		$this->get_quizes();
		return $this->quizes;
	}

	public function quiz_question_count($quiz_id){
		$query=$this->conn->query("SELECT question_count FROM quizes WHERE quiz_id = ".(int)$quiz_id);
		$row = $query->fetch_assoc();
		return $row;
	}

	//similar for questions. We need to show only 1 question at time so not to load everything from db we need to use LIMIT in our query.
	private function get_question($quiz_id, $qnumber){
		$query=$this->conn->query("SELECT * FROM questions WHERE quiz_id='".$quiz_id."' LIMIT ".$qnumber.",1");
		$row = $query->fetch_assoc();
		
		$this->question = $row;



	}

	//returns get_question
	public function return_question($quiz_id, $qnumber){
		
		$this->get_question($quiz_id,$qnumber);
		return $this->question;

	}

	//gets all answers for question from db
	private function get_answers($question_id){

		$query=$this->conn->query("SELECT * FROM Answers WHERE question_id = '".$question_id."'");
		while ($row=$query->fetch_array(MYSQLI_ASSOC)){

			//add fetched rows to ques array
			$this->answers[]=$row;
	}

	}

	//returns get_answers
	public function return_answers($question_id){

		$this->get_answers($question_id);
		return $this->answers;

	}

	//though user score will be stored in $_SESSION variable we also save each answer to db. 
	public function save_answer($name, $quiz_id, $question_id, $answer_id, $session, $is_right){
		$query=$this->conn->query("INSERT INTO taken_quiz (name,quiz_id,question_id,answer_id,session,is_right) VALUES (".$name.",".$quiz.",".$question_id.",".$answer_id.",".$session.",".$is_right.")");


	}


	// this will be executed on final page to save results in db.
	public function save_results($session, $correct_count, $name){
		$query=$this->conn->query("INSERT INTO results (session,correct_count, name) VALUES (".$session.",".$correct_count.",".$name.")");


	}

	//check if answer was correct. We can't store this information on html (visible when inspecting elements)
	public function check_answer($answer_id){

		$query=$this->conn->query("SELECT is_right FROM Answers WHERE answer_id=".(int)$answer_id);
		$row = $query->fetch_assoc();
		return $row;
	}	



}



?>