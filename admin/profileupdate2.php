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
    echo 
    '<script>
    console.log("empty")
    </script>';
   
if(!empty($_POST)) 
{
    $brandname = $_POST['brandname'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $lati = $_POST['lati'];
    $long = $_POST['long'];
    $postal = $_POST['postal'];
    $about = $_POST['about'];
    $contact = $_POST['contact'];

    $cityRef = $db->collection($_GET['userwebtype'])->document($_GET['userwebid']);
    $cityRef->update([
        ['path' => 'brandname', 'value' => $brandname],
        ['path' => 'email', 'value' => $email],
        ['path' => 'fname', 'value' => $fname],
        ['path' => 'lname', 'value' => $lname],
        ['path' => 'address', 'value' => $address],
        ['path' => 'number', 'value' => $number],
        ['path' => 'lati', 'value' => $lati],
        ['path' => 'long', 'value' => $long],
        ['path' => 'about', 'value' => $about],
        ['path' => 'postal', 'value' => $postal],
        ['path' => 'contact', 'value' => $contact]

    ]);

    header("Location:userwebinfo.php?updateinfo=sucess=userid=".$_GET['userwebid']."&userwebinfoid=".$userwebinfoid3);
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