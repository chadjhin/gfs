<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_USERPWD, 'AQkV82d1ECHzVcx-gfAokqIoMfMOL8B5RNLxarnnuJUdrNZe2Yp4896rgoo4q7au3waASVpKV86ly6eR' . ':' . 
'EOOQLB_Yz10wO5C7C4LvZIhxz_bY2sbj-yTiYmwnWCLGqXm0-JnMQBgCZacdwgoHO77nREmpzLURph6Q');

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en_US';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
if($err)
{
echo'error:'.$err;
}
else{
$response = json_decode($result);
  //var_dump($response);
$access_token = $response->access_token;
if($access_token)
{
    //header("Location: createProduct.php?access_token=".$access_token);
    header("Location: subscription.php?access_token=".$access_token);
    
    exit;
}
}

?>
