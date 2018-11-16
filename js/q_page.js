 

 // this function is for getting first question from db on page load
window.onload = function (){
 var firstQuestionCheck = document.getElementById("container").textContent;
 //console.log("test: "+firstQuestionCheck.length);
  if (firstQuestionCheck.length == 0){
  	loadNextQuestion("firstQuestionLoad");
  }
}