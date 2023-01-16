<?php
//require_once 'firestore.php';
define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

//$setid = $_GET['setid'];
//$setid = "jhin2";

$date = date('Y-m-d H:i:s');

// Get the year, month, day, hours, minutes, and seconds
$year = date('Y', strtotime($date));
$month = date('m', strtotime($date)); // January is 01
$day = date('d', strtotime($date));
$hours = date('H', strtotime($date));
$minutes = date('i', strtotime($date));
$seconds = date('s', strtotime($date));

// Create a date string
$dateStr = $year . ":" . $month . ":" . $day . ":" . $hours . ":" . $minutes . ":" . $seconds;


if(isset($_GET['approvebuttonid']))

{
    
    $data = [
        'message' => 'complete documents',
        'status' => 'APPROVED',
    'currentdate'  => $dateStr
    ];
    
    $cityRef2 = $db->collection($_GET['checkuser'])->document($_GET['userwebinfoid'])->collection('notifications');
    $cityRef2->add($data);
    
    $cityRef =  $db->collection($_GET['checkuser'])->document($_GET['userwebinfoid'])->collection('documents')->document('docufiles');
    $cityRef->update([
        ['path' => 'message', 'value' => 'complete documents'],
         ['path' => 'status',  'value' => 'APPROVED'],
         ['path' => 'currentdate',  'value' => $dateStr]
    ]);
    
    
    header("Location:verify.php?updateinfo=sucess&&checkuser=".$_GET['checkuser']."&userwebinfoid=".$_GET['userwebinfoid']);
        exit();
    
}
else
{


if(!empty($_POST)) 
{
    $note = $_POST['note'];
}

$data = [

    'message' =>  $note,
    'status' => 'DECLINED',
    'currentdate'  => $dateStr
];

$cityRef2 = $db->collection($_GET['checkuser'])->document($_GET['userwebinfoid'])->collection('notifications');
$cityRef2->add($data);

$cityRef =  $db->collection($_GET['checkuser'])->document($_GET['userwebinfoid'])->collection('documents')->document('docufiles');



$cityRef->update([
    ['path' => 'message', 'value' => $note],
     ['path' => 'status',  'value' => 'DECLINED'],
     ['path' => 'currentdate',  'value' => $dateStr]
]);


header("Location:verify.php?updateinfo=sucess&&checkuser=".$_GET['checkuser']."&userwebinfoid=".$_GET['userwebinfoid']);
    exit();


}

?>