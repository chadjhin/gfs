<?php

//use Google\Cloud\Firestore\FirestoreClient;
/*require_once 'firestore.php';

$fs = new firestore(collection:'admin');
//$fs = new firestore(collection:'food'); // drop new doc food


//print_r($fs->getDocument(name: '3yBsyU7BYV4APf0vR4oD'));
//print_r($fs->newDocument('3yBsyU7BYV4APf0vR4oD',['adminpass' => 'admin12345']));
//$fs->getWhere(field: 'adminpass', operator: '=', value: 'admin123');
//print_r($fs->newUserCollection(name:'food', doc_name: 'meat'));
//print_r($fs->dropDocument(name:'meat'));
//print_r($fs->dropCollection(name: 'food'));

if(!empty($_POST)) 
{

	$user = $_POST['text'];
	$pass = $_POST['pass'];

	if(empty($user) || empty($pass)) {
		header("Location: index.php?error=emptyfields");
		exit();
	}
	else{
		$fs->getWhere('adminpass', '=',  $pass,  'adminuser',  '=', $user);
	}

}
else{
	header("Location: index.php");
	exit();
}
*/

//use Google\Cloud\Firestore\FirestoreClient;
//require_once 'firestore.php';
session_start();
define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/gfs/vendor/autoload.php');
require(__ROOT__.'/gfs/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);
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

	$user = $_POST['text'];
	$pass = $_POST['pass'];

	if(empty($user) || empty($pass)) {
		header("Location: index.php?error=emptyfields");
		exit();
	}
	else{
		//$fs->getWhere('adminpass', '=',  $pass,  'adminuser',  '=', $user);
       //$arr = [];
                $query = $db->collection('admin')->where('adminpass', '=',  $pass,  'adminuser',  '=', $use);
            if(!empty($query))
            {
                
                //$_SESSION['admin_id'] = $this->db->collection($this->name)->document('3yBsyU7BYV4APf0vR4oD')->snapshot()->id(); //need this to set the seesion to each user (3yBsyU7BYV4APf0vR4oD is the admin document- need to make function if want to access other users)
                //$_SESSION['admin_id'] = true;
                $_SESSION['admin_id'] = '3yBsyU7BYV4APf0vR4oD'; //need this to set the seesion to each user (3yBsyU7BYV4APf0vR4oD is the admin document- need to make function if want to access other users)
                

    
                /*foreach ($query as $item)
                {
                    $arr[] = $item->data();
                }*/
                //printf('successful log in');
                //printf($_SESSION['user_id']);
                if(isset($_SESSION['admin_id']))
				{
                    header("Location:./admin/dashboard.php?login=success/session/set");
                    exit();
                }
                else
                {
                    header("Location:./admin/dashboard.php?login=success/session/not/set");
                    exit();
                }
            }
                else
                {
                  header("Location:./admin/dashboard.php?login=docsnotexist");
                    exit();
                }
	}

}
else{
	header("Location: index.php");
	exit();
}
