<?php
//require_once 'firestore.php';
define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);


$subscriptionID = $_GET['subscriptionID'];
$token = $_GET['access_token'];
//$setid = $_GET['setid'];
//$setid = "jhin2";
$id=$_SESSION['user_id'];
if($subscriptionID == "" || $token == "" || $setid = "")
{
    //header("Location: javascript://history.go(-1)");
    echo 'error';
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.rawurlencode($subscriptionID));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


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
else{
    $response = json_decode($result);
    date_default_timezone_set('Asia/Manila');
    $date = date('d-m-y h:i:s');
    //$email = $owneremail;  //user id or email;
    $status = $response->status;
    $subscriberID = $response->id;
    $PlanID = $response->plan_id;
    $start_time = $response->start_time;
    $status_update_time = $response->status_update_time;
    $payment_email_address = $response->subscriber->email_address;
    $given_name = $response->subscriber->name->given_name;
    $surname = $response->subscriber->name->surname;
    $fullname = $given_name."".$surname;
    $payerID = $response->subscriber->payer_id;
    
    //$value = $response->billing_info->cycle_executions->last_payment->amount->value;
    //$currency = $response->last_payment->amount->currency_code;
   //$time = $response->last_payment->time;
    //$next_billing = $response->next_billing_time;
    //$final_billing = $response->final_payment_time;
    
    if($status == 'ACTIVE' && $subscriptionID == $subscriberID)
    {
        $checkvet = new firestore(collection:'vetclinic');
        $checkpet = new firestore(collection:'petstore');
        //$check1=$checkvet->checkvet($id);
        //$check2=$checkpet->checkpet($id);
        

        
        $data = [

            'username' => $id,
            'currentdate' => $date,
            'status' => $status,
            'subscriberID' => $subscriberID,
            'PlanID'=> $PlanID,
            'start_time'=> $start_time,
            'status_update_time'=> $status_update_time,
            'payment_email_address'=> $payment_email_address,
            'fullname'=> $fullname,
            'payerID'=> $payerID

        ];
        if($check1=$checkvet->checkvet($id))
        {
            $webtype='vetclinic';
            $fs = new firestore(collection:'vetclinic');
            //echo "check1";
            
            $cityRef = $db->collection('vetclinic')->document($id)->collection('subscriptionlist')->add($data);
            $cityRef2 = $db->collection('vetclinic')->document($id)->collection('notifications');

            $cityRef2->add($data);
            
            $_SESSION['substatus']='ACTIVE';
            $query2 = $cityRef2->where('status', '=', 'ACTIVE');
            $documents2 = $query2->documents();
            foreach ($documents2 as $document) {
            $_SESSION['notifdocid']=$document->id();
            }

        }else if($check2=$checkpet->checkpet($id))
        {
            $webtype='petstore';
            $fs = new firestore(collection:'petstore');
            //echo "check2";
            $cityRef = $db->collection('petstore')->document($id)->collection('subscriptionlist')->add($data);
            
            $cityRef2 = $db->collection('petstore')->document($id)->collection('notifications');
            $cityRef2->add($data);

            $query2 = $cityRef2->where('status', '=', 'ACTIVE');
            $documents2 = $query2->documents();
            foreach ($documents2 as $document) {
            $_SESSION['notifdocid']=$document->id();
            }
            
        }
        

        
        if($fs->add_sub_detail($id,$data))
        {
            if($webtype=='petstore')
            {
                $citiesRef =$db->collection('petstore')->document($id)->collection('subscriptionlist');
                $query = $citiesRef->where('start_time', '=', $start_time);
                $documents = $query->documents();
                foreach ($documents as $document) {
                    if ($document->exists()) {
                        $_SESSION['start_time']=$document->data()['start_time'];
                        
                        $_SESSION['currentsubdocid']=$document->id();
                        
                    } 
                }
            }
            else if($webtype=='vetclinic')
            {
                $citiesRef =$db->collection('vetclinic')->document($id)->collection('subscriptionlist');
                $query = $citiesRef->where('start_time', '=', $start_time);
                $documents = $query->documents();
                foreach ($documents as $document) {
                    if ($document->exists()) {
                        $_SESSION['start_time']=$document->data()['start_time'];
                        
                        $_SESSION['currentsubdocid']=$document->id();
                        
                    } 
                }
            }
            
            
            header("Location: subscription.php?setid=".$id."&access_token=".$token."&subscriberID=".$subscriberID."&currentsubdocid=".$_SESSION['currentsubdocid']);
            exit();
        }else
        {
            echo'error';
        }
    }






}


?>