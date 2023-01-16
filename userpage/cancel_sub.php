<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

    $checkvet = new firestore(collection:'vetclinic');
    $checkpet = new firestore(collection:'petstore');

//get the subscriber id from the firestore database aswell as the email or userid
//and store it in $subscriberId variable
$subscriberID = $_GET['subscriberID'];

if(isset($_GET['fromadminset']))
                {
$id=$_GET['user_id'];
                }
                else
                {
                    $id=$_SESSION['user_id'];
                }
$token = $_GET['access_token'];


// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.rawurlencode($subscriberID).'/cancel');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"reason\": \"Not satisfied with the service\"\n}");

$headers = array();
$headers[] = 'Content-Type: application/json'; 
$headers[] = 'Authorization: Bearer '.rawurlencode($token);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
if($err)
{
    echo'error'.$err;
} 
else
{
   
    
    //echo $subscriberID;
    if($check1=$checkvet->checkvet($id))
        {
            $fs = new firestore(collection:'vetclinic');
            //echo "check1";
            if(isset($_SESSION['currentsubdocid']))
            {
                date_default_timezone_set('Asia/Manila');
                $date = date('d-m-y h:i:s'); 
                $cityRef = $db->collection('vetclinic')->document($id)->collection('subscriptionlist')->document($_SESSION['currentsubdocid']);
                if(isset($_GET['fromadminset']))
                {
                    $cityRef->update([
                        ['path' => 'status', 'value' => "CANCELLED"],
                        ['path' => 'cancel_time', 'value' => $date],
                        ['path' => 'cancelledby', 'value' => "admin"]
                    ]);
                    
                $data = [

                    'username' => $id,
                    'currentdate' => $date,
                    'status' => "CANCELLED",
                    'subscriberID' => $subscriberID,
                    'PlanID'=> $PlanID,
                    'start_time'=> $start_time,
                    'status_update_time'=> $status_update_time,
                    'payment_email_address'=> $payment_email_address,
                    'fullname'=> $fullname,
                    'payerID'=> $payerID,
                    'cancel_time' => $date,
                    'recieptid'=>$_SESSION['notifdocid'],
                    'cancelby'=> "admin"
                ];$cityRef2 = $db->collection('vetclinic')->document($id)->collection('notifications')->add($data);
                }
                else
                {
                $cityRef->update([
                    ['path' => 'status', 'value' => "CANCELLED"],
                    ['path' => 'cancel_time', 'value' => $date]
                ]);

                $data = [

                    'username' => $id,
                    'currentdate' => $date,
                    'status' => "CANCELLED",
                    'subscriberID' => $subscriberID,
                    'PlanID'=> $PlanID,
                    'start_time'=> $start_time,
                    'status_update_time'=> $status_update_time,
                    'payment_email_address'=> $payment_email_address,
                    'fullname'=> $fullname,
                    'payerID'=> $payerID,
                    'cancel_time' => $date,
                    'recieptid'=>$_SESSION['notifdocid']
                ];$cityRef2 = $db->collection('vetclinic')->document($id)->collection('notifications')->add($data);
                }
                
            }
        }else if($check2=$checkpet->checkpet($id))
        {
            $fs = new firestore(collection:'petstore');
            //echo "check2";
            if(isset($_SESSION['currentsubdocid']))
            {
                date_default_timezone_set('Asia/Manila');
                $date = date('d-m-y h:i:s'); 
                $cityRef = $db->collection('petstore')->document($id)->collection('subscriptionlist')->document($_SESSION['currentsubdocid']);
                if(isset($_GET['fromadminset']))
                {
                    $cityRef->update([
                        ['path' => 'status', 'value' => "CANCELLED"],
                        ['path' => 'cancel_time', 'value' => $date],
                        ['path' => 'cancelledby', 'value' => "admin"]
                    ]);
                    
                $data = [

                    'username' => $id,
                    'currentdate' => $date,
                    'status' => "CANCELLED",
                    'subscriberID' => $subscriberID,
                    'PlanID'=> $PlanID,
                    'start_time'=> $start_time,
                    'status_update_time'=> $status_update_time,
                    'payment_email_address'=> $payment_email_address,
                    'fullname'=> $fullname,
                    'payerID'=> $payerID,
                    'cancel_time' => $date,
                    'recieptid'=>$_SESSION['notifdocid'],
                    'cancelby'=> "admin"
                ];$cityRef2 = $db->collection('vetclinic')->document($id)->collection('notifications')->add($data);
                }
                else
                {
                $cityRef->update([
                    ['path' => 'status', 'value' => "CANCELLED"],
                    ['path' => 'cancel_time', 'value' => $date]
                ]);

                $data = [

                    'username' => $id,
                    'currentdate' => $date,
                    'status' => "CANCELLED",
                    'subscriberID' => $subscriberID,
                    'PlanID'=> $PlanID,
                    'start_time'=> $start_time,
                    'status_update_time'=> $status_update_time,
                    'payment_email_address'=> $payment_email_address,
                    'fullname'=> $fullname,
                    'payerID'=> $payerID,
                    'cancel_time' => $date,
                    'recieptid'=>$_SESSION['notifdocid']
                ];$cityRef2 = $db->collection('vetclinic')->document($id)->collection('notifications')->add($data);
                }
            }
        }
        if($fs->update_sub_detail($id))
        {
            if(isset($_GET['fromadminset']))
                {
                    header ("Location: ../sublist.php?setid=".$setid."&access_token=".$token."&subscriberID=".$subscriberID);
            exit();
            
                }
                else{
                    header("Location: subscription.php?setid=".$setid."&access_token=".$token."&subscriberID=".$subscriberID);
                    exit();
                }
        }else
        {
            echo'error';
        }
}
?>