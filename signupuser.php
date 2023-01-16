<?php 
session_start();
error_reporting(0);
require_once 'firestore.php';
if(!empty($_POST)) 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $uppercase    = preg_match('@[A-Z]@', $password);
    $lowercase    = preg_match('@[a-z]@', $password);
    $number       = preg_match('@[0-9]@', $password);
    $specialchars = preg_match('@[^\w]@', $password);
    
    if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
        //echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
        //echo 'Strong password.';
    }

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: signup.php?error=emptyfields");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=invalidemail");
        exit();
    }
    else if($password !== $passwordRepeat){
       header("Location: signup.php?error=passworddontmatch");
       exit();
    }
    
   else {
	
    if( $_POST['button1'])
    {
        $fs = new firestore(collection:'petstore');
        
    }
    else if($_POST['button2'])
    {
        $fs = new firestore(collection:'vetclinic');
       
    }
    else
    {
        header("Location: signup.php?error=error");
       exit();
    } 
	
	$data = [
		'username' => $_POST['username'],
		'email' => $_POST['email'],
		'password'=> $_POST['password'],
		'passwordRepeat'=> $_POST['passwordRepeat']
	];
    $checkvet = new firestore(collection:'vetclinic');
    $checkpet = new firestore(collection:'petstore');
    $check1=$checkvet->checkvet($username);
    $check2=$checkpet->checkpet($username);

    if( $check1 || $check2 )
    {
        header("Location: signup.php?username already taken");
        exit();
    }
    else{

        $fs->adduser($username,$data);
        //header("Location: userindex/index.php?succesfull sign up");
        //echo '<script>alert("This is an alert!");</script>';

        echo '<script type="module">

var email = "'.$email.'";
sessionStorage.setItem ("email",email);
var password = "'.$password.'";
sessionStorage.setItem("password",password);

</script>';


        echo '<script type="module" src="email1.js"></script>';

        exit();
    }
   } 
   
}
?>