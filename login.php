<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PETik CAPSTONE PROJECT
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  

</head>

<body class="user-profile">
  
<?php
  error_reporting(E_ALL);
ini_set('display_errors', 1);
   echo("!empty1");
  
//define('__ROOT__', dirname(dirname(__FILE__)));echo("!empty2");
//require(__ROOT__.'/public_html/vendor/autoload.php');echo("!empty3");

define('__ROOT__', dirname(dirname(__FILE__))); echo("!empty2");
//require(__ROOT__.'/public_html/vendor/autoload.php');echo("!empty3");
  //require_once dirname(__DIR__) . '/autoload.php'; echo("!empty3");//require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
 echo("!empty3");
  $filepath = $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; echo("!empty4");
if(file_exists($filepath))
{echo("!empty5");
    include $filepath;
    echo("!empty3");
} else {
    echo "Autoload file not found";
}

//require_once 'vendor/autoload.php';echo("!empty3");
use Google\Cloud\Firestore\FirestoreClient;echo("!empty4");

$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);
$fs = $db->collection('admin');
 echo("!emptyasasdasdasdas");
if(!empty($_POST)) 
{

     echo("!empty");
	$user = $_POST['text'];
	$pass = $_POST['pass'];

	if(empty($user) || empty($pass)) {
		header("Location: index.php?error=emptyfields");
      
     echo("emptyfields");
		//exit();
	}
	else{
                $query = $db->collection('admin')->where('adminpass', '=',  $pass,  'adminuser',  '=', $use);
            if(!empty($query))
            {
                
                $_SESSION['admin_id'] = '3yBsyU7BYV4APf0vR4oD'; //need this to set the seesion to each user (3yBsyU7BYV4APf0vR4oD is the admin document- need to make function if want to access other users)
                
echo("!empty($query)");
    
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
echo("error");
}
?>
  
  </body>
</html>

