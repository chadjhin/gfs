<?php 
$productID = $_GET['productID'];
$token = $_GET['access_token'];
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/plans');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n      \"product_id\": \"$productID\",\n      \"name\": \"Basic Plan\",\n      \"description\": \"Basic plan\",\n      \"billing_cycles\": [\n        {\n          \"frequency\": {\n            \"interval_unit\": \"MONTH\",\n            \"interval_count\": 1\n          },\n          \"tenure_type\": \"TRIAL\",\n          \"sequence\": 1,\n          \"total_cycles\": 1\n        },\n        {\n          \"frequency\": {\n            \"interval_unit\": \"MONTH\",\n            \"interval_count\": 1\n          },\n          \"tenure_type\": \"REGULAR\",\n          \"sequence\": 2,\n          \"total_cycles\": 12,\n          \"pricing_scheme\": {\n            \"fixed_price\": {\n              \"value\": \"10\",\n              \"currency_code\": \"USD\"\n            }\n          }\n        }\n      ],\n      \"payment_preferences\": {\n        \"auto_bill_outstanding\": true,\n        \"setup_fee\": {\n          \"value\": \"10\",\n          \"currency_code\": \"USD\"\n        },\n        \"setup_fee_failure_action\": \"CONTINUE\",\n        \"payment_failure_threshold\": 3\n      },\n      \"taxes\": {\n        \"percentage\": \"10\",\n        \"inclusive\": false\n      }\n    }");

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer '.$token;
$headers[] = 'Content-Type: application/json';
$headers[] = 'Paypal-Request-Id: PLAN-18062020-001';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else
{
    $response = json_decode($result);
    $planID = $response->id;
    //var_dump($planID);
    if($planID)
    {
        //header("Location: pay.php?planID=".$planID."&access_token=".$token);
        header("Location: pay2.php?planID=".$planID."&access_token=".$token."&planID2=".$planID2."&access_token2=".$token2);
        exit;
    }
}

?>