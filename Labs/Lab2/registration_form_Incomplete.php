<!DOCTYPE html>
<!--
Form validation and email function with additional features:
1- All-in-one and sticky (self-processing) form
2- Displaying formatted inline error messages 
3- Reloading the form using php built-in function
4- Using RE for validating all text fields
-->

<html lang="">
   <head>
	  <meta charset = "utf-8" />
      <title>Registration Form</title>
      <style type = "text/css">
         label  { width: 5em; float: left; }
		 .error {
			color: #ff0000;
			font-weight: bold;
			border: 0px none;
		}
      </style>
   </head>
   <body>

<?php
$displayForm = TRUE;
$inputError = FALSE;

$name_message = "";
$email_message = "";
$phone_message = "";
$language_message = "";
$os_message = "";

$name= "";
$email = "";
$phone = "";
$language = "Choose";
$opSystem = "";


if (isset($_POST['send'])) {
	
	//Write code to populate the variables from user inputs and then perform validation ...... 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$language = $_POST['language'];
$opSystem = $_POST['os'];


    //Write code to switch the $inputError = TRUE; based on the user input ...
    if(!empty(validateName($name))){
        $inputError = TRUE;
        $name_message = validateName($name);
    }
    if(!empty(validateEmail($email))){
    $inputError = TRUE;
    $email_message = validateEmail($email);
    }
    if(!empty(validatePhone($phone))){
    $inputError = TRUE;
    $phone_message = validatePhone($phone);
    }
    if(!empty(validateLanguage($language))){
    $inputError = TRUE;
    $language_message = validateLanguage($language);
    }
    if(!empty(validateOS($opSystem))){
    $inputError = TRUE;
    $os_message = validateOS($opSystem);
    }


    //send the email if there is no error
  if (!$inputError) {
	
	$to = "awny@iuk.edu";
	$subject = "New Application";
	$message = $_POST["name"] . " " . " has submitted his application as follows ....."; 
	//optional headers argument
	$headers = "From: Webmaster@MySite.com\r\n";
	$headers .= "Content-Type text/plain; charset= utf-8\r\n";
	$headers .= "Cc: awny@gmail.com";
	$result = mail($to, $subject, $message, $headers);
	if ($result) {
		echo "<strong>Your application form was successfully sent to</strong> " . $to ;
		$displayForm = FALSE;
	}
	else {
		echo "There was a problem sending your submission via email, " . $name;
		die();
	}
  }
	
}
//--------------------------------------------------------------------
function validateName($name) {
     if (empty($name)) 
          return "Must enter your name!";
     else if (!preg_match("/^[A-Za-z]+\s[A-Za-z]'?[A-Za-z]+$/", $name))
	 //name format: first name space last name. Last name allows a single apostrophe in the second position
		  return "Invalid name!";
}
function validateEmail($email) {
	     if (empty($email)) 
			return "Must Enter your email!";
		else if (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email))
		//email format: the regular email but it also accepts firstname.lastname@aaa.bbb.com
			return "Invalid email!";
}
function validatePhone($phone) {
    if (empty($phone)){
                    return "Must enter your phone number!";
                }
        //phone format: 123-456-7890 or (123) 456-7890
        else if (!preg_match("/^((\d{3}-)|(\(\d{3}\)\s))(\d{3}-\d{4})$/", $phone)){
                    return "Invalid phone number!";
                }

}
function validateLanguage($language) {
	     if ($language == "Choose") 
          return "Must choose a language!";
}
function validateOS($opSystem) {
	     if (empty($opSystem)) 
          return "Must choose an operating system!";
}

//--------------------------------------------------------------------
if ($displayForm) {
?>
      <h1>Registration Form</h1>
      <p>Please fill in all fields and click Register. All fields are required</p>  
	  <!-- The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script -->
      <form method = "post" action="<?php $_SERVER['PHP_SELF'];?>">
         <h2>User Information</h2>

         <!-- create four text boxes for user input -->
         <div><label>Name:</label> 
            <input type = "text" name = "name" value="<?php echo $name; ?>">
			<input type="text" id="name_error" class ="error" size = "40" value="<?php echo $name_message; ?>">
		</div>
         <div><label>Email:</label>
            <input type = "text" name = "email" value="<?php echo $email; ?>">
			<input type="text" id="email_error" class ="error" size = "40" value="<?php echo $email_message;?>"></div>
         <div><label>Phone:</label>
            <input type = "text" name = "phone" value="<?php echo $phone;  ?>">
			<input type="text" id="phone_error" class ="error" size = "40" value="<?php echo $phone_message; ?>"></div>

         <h2>Programming Languages</h2>
         <p>Which programming language would you like to learn?</p>

         <!-- create drop-down list containing languages -->
         <select name = "language" >
			<option value="Choose">Choose</option>
            <option value="PHP" <?php echo (isset($_POST['language']) && $_POST['language'] == 'PHP') ? "selected" : "";?>/>PHP</option>
            <option value="Java" <?php echo (isset($_POST['language']) && $_POST['language'] == 'Java') ? "selected" : "";?>/>Java</option>
            <option value="Javascript" <?php echo (isset($_POST['language']) && $_POST['language'] == 'Javascript') ? "selected" : "";?>/> Javascript</option>
            <option value="Visual Basic" <?php echo (isset($_POST['language']) && $_POST['language'] == 'Visual Basic') ? "selected" : "";?>/>Visual Basic</option>
         </select>
		<input type="text" id="language_error" class ="error" size = "40" value="<?php echo $language_message; ?>">
         <h2>Operating System</h2>
         <p>Which operating system do you use?
		 <input type="text" id="os_error" class ="error" size = "40" value="<?php echo $os_message; ?>">
		 </p> 

         <p><input type = "radio" name = "os" value = "Windows" <?php echo (isset($_POST['os']) && $_POST['os'] == 'Windows') ? "checked" : "";?>/>Windows
            <input type = "radio" name = "os" value = "Mac OS X" <?php echo (isset($_POST['os']) && $_POST['os'] == 'Mac OS X') ? "checked" : "";?>/>Mac OS X
            <input type = "radio" name = "os" value = "Linux" <?php echo (isset($_POST['os']) && $_POST['os'] == 'Linux') ? "checked" : "";?>/>Linux
            <input type = "radio" name = "os" value = "Other" <?php echo (isset($_POST['os']) && $_POST['os'] == 'Other') ? "checked" : "";?>/>Other
		</p>

         <!-- create a submit button -->
         <p>
			<input type="submit" name="send" value="Register"> &nbsp;&nbsp;
			<input type="reset" name="reset" value="Reset">
		 </p>
      </form>
<?php
}
?> 
   </body>
</html>


