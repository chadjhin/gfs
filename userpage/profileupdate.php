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


$checkuser=$_SESSION['checkuser'];
$id=$_SESSION['user_id'];
if(isset($_GET['buttonid']))
{
    if(isset($_SESSION['checkuser'])&&isset($_SESSION['user_id']))
    {
        echo 
        '<script>
        console.log("empty")
        </script>';
       
        $status='DEACTIVATED';
    
        $cityRef = $db->collection($_SESSION['checkuser'])->document($_SESSION['user_id']);
        $cityRef->update([
            ['path' => 'STATUS', 'value' => $status]
    
        ]);
    
        header("Location:logout.php?updateinfo=sucess=userid=".$_SESSION['user_id']);
        exit();
    
   
    
    }
    else{
         echo 
                '<script>
                console.log(error check=$checkuser=id=$id")
                </script>';
    }

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else
{
if(isset($_SESSION['checkuser'])&&isset($_SESSION['user_id']))
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
    $about = $_POST['about'];
    $contact = $_POST['contact'];
    
    $cityRef = $db->collection($_SESSION['checkuser'])->document($_SESSION['user_id']);
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
        ['path' => 'contact', 'value' => $contact]


    ]);

    header("Location:user2.php?updateinfo=sucess=userid=".$_SESSION['user_id']);
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
}
?>