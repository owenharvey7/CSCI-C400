<!DOCTYPE html>

<!--
New England State Capitals Quiz
-->

<html>
<head>
    <meta charset = "utf-8" />
    <title>New England State Capitals</title>
</head>

<body>
<h3>Civics Quiz - New England State Capitals:</h3>

<?php error_reporting(0); ?>
<?php
$displayForm = true;
$correct = 0;

    $stateCapitals = array(
        "Connecticut" => "Hartford",
        "Maine" => "Augusta",
        "Massachusetts" => "Boston",
        "New Hampshire" => "Concord",
        "Rhode Island" => "Providence",
        "Vermont" => "Montpelier");

    function displayResults(array $stateCapitals) {
        global $correct;
        //get users input and store in array
        $answersArray = array(
            "Connecticut" => $_GET['Connecticut'],
            "Maine" => $_GET['Maine'],
            "Massachusetts" => $_GET['Massachusetts'],
            "New Hampshire" => $_GET['NewHampshire'],
            "Rhode Island" => $_GET['RhodeIsland'],
            "Vermont" => $_GET['Vermont']);

        //loop through the array and compare the user input to the correct answer
        foreach ($answersArray as $state => $response) {
            if (strlen ($response) > 0) {
                if(strcasecmp($stateCapitals[$state] , $response) == 0) {
                    $correct++;
                    echo "<p>Correct! The capital of $state is $response.</p>";
                }
                else {
                    echo "<p>Sorry! The capital of $state is not $response.</p>";
                }
            }
            else {
                echo "<p>You did not enter a value for $state.</p>";
            }
        }
    }

    function displayStats($correct) {
        global $stateCapitals;
        global $displayForm;
        $totalQuestions = count($stateCapitals);
        $percent = round(($correct / $totalQuestions),2) * 100;
        echo "<p>You got $correct correct. You got $percent% correct .</p>";
        if($correct == $totalQuestions) {
            echo "<p>You're a good citizen!</p>";
            $displayForm = false;
            echo "<p>You got a 100%, but you can <a href='Q3StateCapitalQuizGame.php'>Try Again</a></p>";

        }
        else {

            echo "<p><a href='Q3StateCapitalQuizGame.php'>Try Again</a></p>";
        }
    }

    if (isset($_GET['submitButton'])) {
        displayResults($stateCapitals);
        displayStats($correct);
    }



if ($displayForm) {
?>


<form action="Q3StateCapitalQuizGame.php" method="get">

    <table border="0">
        <tr>
            <td>The capital of Connecticut is: </td>
            <td><input type="text" name="Connecticut" size = "25" value = "<?php echo $_POST['Connecticut'];?>" /></td>
        </tr>
        <tr>
            <td>The capital of Maine is: </td>
            <td><input type="text" name="Maine" size = "25" value = "<?php echo $_POST['Maine'];?>" /></td>
        </tr>
        <tr>
            <td>The capital of Massachusetts is: </td>
            <td><input type="text" name="Massachusetts" size = "25" value = "<?php echo $_POST['Massachusetts'];?>" /></td>
        </tr>
        <tr>
            <td>The capital of New Hampshire is not: </td>
            <td><input type="text" name="NewHampshire" size = "25" value = "<?php echo $_POST['NewHampshire'];?>" /></td>
        </tr>
        <tr>
            <td>The capital of Rhode Island is: </td>
            <td><input type="text" name="RhodeIsland" size = "25" value = "<?php echo $_POST['RhodeIsland'];?>" /></td>
        </tr>
        <tr>
            <td>The capital of Vermont is: </td>
            <td><input type="text" name="Vermont" size = "25" value = "<?php echo $_POST['Vermont'];?>" /></td>
        </tr>
        <tr></tr>
        <tr>
            <td><input type="submit" name="submitButton" id="submitButton" value="Check Answers" />&nbsp;&nbsp;&nbsp;
                <input type="reset" name="resetButton" id="resetButton" value="Clear Form" /></td>
        </tr>
    </table>

</form>

<?php
}
?>
</body>
</html>