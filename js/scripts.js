
// on click events for quiz select page
// 
 window.onload = function () {
  //we need to disable submit button before quiz is selected
  var select1 = document.getElementById("quizSelect");
  document.getElementById("submitbtn").disabled = true;

  select1.onclick=validateForm;

}




// set id of active button to "chosen" and deselects previous button
function setActiveAnwser(clicked_id){

  if (clicked_id !="chosen"){
    var previousAnswer = document.getElementById("chosen");
    if (previousAnswer ) {
      //alert (previousAnswer.getAttribute("value"));
      previousAnswer.setAttribute("id","answer_"+previousAnswer.getAttribute("value"))
    }

    var answer = document.getElementById(clicked_id);
    answer.setAttribute("id","chosen");
  }
}

// this function will be called when submit for answer is clicked
function getSelectedAnswer(){

  var answer = document.getElementById("chosen");
  if (answer){
    loadNextQuestion(answer.value);
  }
  else {
    alert("answer not selected");
  }
}
//js for loading next question dynamicaly and storing current results in db
function loadNextQuestion(answer){
  
  //
  var params ="answer="+answer;
	
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    	xmlhttp=new XMLHttpRequest();
 	} else { // code for IE6, IE5
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    document.getElementById("container").innerHTML=this.responseText;
    }
  }
  // for some reason GET methond didn't work
  //xmlhttp.open("GET","/resources/question_loader.php?a=" + answer,true);
  //xmlhttp.send();
  //using POST instead.
  xmlhttp.open("POST","/resources/question_loader.php",true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xmlhttp.send(params);
}

//this enables submit button
function validateForm(){
  if(document.getElementById("quizSelect").value!="not_valid"){
    document.getElementById("submitbtn").disabled=false;
  }
  else{
    document.getElementById("submitbtn").disabled=true;
  }


}
