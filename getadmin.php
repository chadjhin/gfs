<?php
class PayPal {

        public $secret;
        public $id ;
        public function construct ($secret , $id) {
        
                 $this->secret = $secret ;
                 $this->id = $id ;
        }
        public function getToken() {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/oauth2/token');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
            curl_setopt($ch, CURLOPT_USERPWD, 'AQkV82d1ECHzVcx-gfAokqIoMfMOL8B5RNLxarnnuJUdrNZe2Yp4896rgoo4q7au3waASVpKV86ly6eR' . ':' . 'EOOQLB_Yz10wO5C7C4LvZIhxz_bY2sbj-yTiYmwnWCLGqXm0-JnMQBgCZacdwgoHO77nREmpzLURph6Q');
            
            $headers = array();
            $headers[] = 'Accept: application/json';
            $headers[] = 'Accept-Language: en_US';
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch) ,true);
            }
            curl_close($ch) ;
            return json_decode($result ,true)-> token;

        } 

        public function getCurrentTime(){
            return date('Y-m-d\\TH:i:s\\Z',time());

        }
        public function pushRequestID($id){

            // push $ id to your database and relate it to your customer
            // paypal agreement_requests
            // customer_id VARCHAR ( 16 ) , agreement_id VARCHAR ( 14 ) , created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

        }

        public function getAprovalURL($planid) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);

            $time = $this->getCurrentTime();
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"plan_id\": $planid,\n  \"start_time\": $time,\n  \"application_context\": {\n    \"brand_name\": \"PETik\",\n    \"locale\": \"en-US\",\n    \"shipping_preference\": \"SET_PROVIDED_ADDRESS\",\n    \"user_action\": \"SUBSCRIBE_NOW\",\n    \"payment_method\": {\n      \"payer_selected\": \"PAYPAL\",\n      \"payee_preferred\": \"IMMEDIATE_PAYMENT_REQUIRED\"\n    },\n    \"return_url\": \"https://example.com/returnUrl\",\n    \"cancel_url\": \"https://example.com/cancelUrl\"\n  }\n}");

            $headers = array();
            $headers[] = 'Accept:application/json';
            $headers[] = 'Authorization: _ENV["Bearer .this->getToken()"]';
            $headers[] = 'Prefer: return=representation';
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch) ,true);
            }
            curl_close($ch);

            $response= json_decode($result,true);
            $this->pushRequestID($response->id);
            return $response->links[0]->href;



        }

        public function customerIdFromRequestId($id) {
            //SELECT customer_id FROM paypal agreement_requests WHERE agreement_id = : id ;
            //: id = > $ id ;
            return $data->customer_id;
        }

        public function getAgreement($id)
        {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/payments/billing-agreements/'.$id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: Bearer'.$this->getToken();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            return json_response($result,true);
        }
        public function processBody($body=file_get_contents('php://input')) 
        {
                $agreeementId = $body->resource->id;
                
                $agreement = $this->getAgreement($id);
                $status = $agreement->status;

                if ( $status == 'ACTIVE' ) {
                        $customer = new Customer();
                        $customer = $customer->fromId($this->customerIdFromRequestId());
                        $customer = setSubscribed(true);
                }
                else if($status == 'ACTIVE')
                {
                    $customer = setSubscribed(true);
                }else
                {
                    $customer->sendNotification("Your Plan subscription status its ".$status.", please, renew it by clicking here: ".$agreement->links[2]->href." or cancel it here:".$agreement->links[0]->href);
                }
                              
    }
    }
?>



