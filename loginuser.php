<?php

//use Google\Cloud\Firestore\FirestoreClient;
require_once 'firestore.php';

//$fs = new firestore(collection:'admin');
//$fs = new firestore(collection:'food'); // drop new doc food


//print_r($fs->getDocument(name: '3yBsyU7BYV4APf0vR4oD'));
//print_r($fs->newDocument('3yBsyU7BYV4APf0vR4oD',['adminpass' => 'admin12345']));
//$fs->getWhere(field: 'adminpass', operator: '=', value: 'admin123');
//print_r($fs->newUserCollection(name:'food', doc_name: 'meat'));
//print_r($fs->dropDocument(name:'meat'));
//print_r($fs->dropCollection(name: 'food'));

if(!empty($_POST)) 
{
    //$fs = new firestore(collection:'vetclinic'); // acess vet to check if username exists;


	$user = $_POST['text'];
	$pass = $_POST['pass'];

	if(empty($user) || empty($pass)) {
		header("Location: index.php?error=emptyfields");
		exit();
	}
	else{
        
    $checkvet = new firestore(collection:'vetclinic');
    $checkpet = new firestore(collection:'petstore'); 
    $check1=$checkvet->checkvet($user);
    $check2=$checkpet->checkpet($user);
 
    if($check1)
    {
        $_SESSION['usertype']='vetclinic';
        $checkvet->getuser('password', '=',  $pass,  'username',  '=', $user);
    }
    else if ($check2){
        $_SESSION['usertype']='petstore';
        $checkpet->getuser('password', '=',  $pass,  'username',  '=', $user);
    }
		
	}

}
else{
	header("Location: index.php");
	exit();
}

