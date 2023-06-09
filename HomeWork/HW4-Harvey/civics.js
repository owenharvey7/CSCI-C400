function validate() {
	var frm = document.getElementById("quiz");
	if (frm.q1.value === "choose" || frm.q2.value === "choose" || frm.q3.value === "choose"){
		alert ("You must answer all questions!");
		return false;
	} else {
		scoreQuiz();
		return false;
	}
}

function scoreQuiz(){
//This function needs to be coded ....
	var score = 0;
	var q1 = document.getElementById("q1").value;
	var q2 = document.getElementById("q2").value;
	var q3 = document.getElementById("q3").value;
	if (q1 == "27") {
		score++;
	}
	if (q2 == "Thomas Jefferson") {
		score++;
	}
	if (q3 == "100") {
		score++;
	}
	score = Math.round(score/3*100*100)/100;

	if(score === 100) {
		document.getElementById("scorefield").style.color = "green";
	} else {
		document.getElementById("scorefield").style.color = "red";
	}

	document.getElementById("scorefield").value = score + "%";

	if(score === 100){
		alert("Congratulations! You got a perfect score!");
	}


}
