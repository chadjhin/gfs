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

if(isset($_GET['buttondeletemessage']))
{
    if(isset($_SESSION['checkuser'])&&isset($_SESSION['user_id']))
    {
        echo $_GET['mobileid'];
       
        $statusweb='DELETED';
    
        $cityRef = $db->collection('Petlover')->document($_GET['mobileid'])->collection('messages')->document($_GET['emailid']);;
        $cityRef->update([
            ['path' => 'statusweb', 'value' => $statusweb]
    
        ]);
    
        header("Location:messagetab.php?messagetab=sucess=userid=".$_SESSION['user_id']);
        exit();
    
    }
    else{
         echo 
                '<script>
                console.log(error check=$checkuser=id=$id")
                </script>';
    }

}
?>