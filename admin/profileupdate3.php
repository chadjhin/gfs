<?php
session_start();
define('__ROOT__', dirname(dirname(__FILE__)));

require(__ROOT__.'/vendor/autoload.php');
use Google\Cloud\Firestore\FirestoreClient;                     //check if $_post data can be pass in a function to use in firestore.php
$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

    $db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);
$checkuser=$_GET['userwebtype'];
$id=$_GET['userwebid'];
$userwebinfoid3=$_GET['userwebinfoid'];
if(isset($_GET['userwebtype'])&&isset($_GET['userwebid']))
{
   
if(!empty($_POST)) 
{
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $Mobile = $_POST['Mobile'];
    $Address = $_POST['Address'];

    $cityRef = $db->collection($_GET['userwebtype'])->document($_GET['userwebid']);
    $cityRef->update([
        ['path' => 'Name', 'value' => $Name],
        ['path' => 'Age', 'value' => $Age],
        ['path' => 'Email', 'value' => $Email],
        ['path' => 'Mobile', 'value' => $Mobile],
        ['path' => 'Address', 'value' => $Address]

    ]);

    header("Location:usermobileinfo.php?updateinfo=sucess=userid=".$_GET['userwebid']."&userwebinfoid=".$userwebinfoid3);
    exit();
}
else{
     printf("error empty");
}

}
else{
     echo 
            '<script>
            console.log(error check=$checkuser=id=$id")
            </script>';
}

?>