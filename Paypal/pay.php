<?php
$planID = $_GET['planID'];
$token = $_GET['access_token'];
?>

<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
</head>

<body>
  <script 
  src="https://www.paypal.com/sdk/js?
  client-id=AQkV82d1ECHzVcx-gfAokqIoMfMOL8B5RNLxarnnuJUdrNZe2Yp4896rgoo4q7au3waASVpKV86ly6eR
  &vault=true&intent=subscription">
</script>

  <div id="paypal-button-container"></div>
  <script>
    var token = '<?php echo $token;?>';
</script>
    <script type="text/javascript">
      paypal.Buttons({
        createSubscription: function(data, actions) {
          return actions.subscription.create({
            'plan_id': '<?php echo $planID;?>' // Creates the subscription
          });
        },
        onApprove: function(data, actions) {
          alert('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
          window.location = "sub_details.php?subscriptionID=" + data.subcsriptionID + "&access_token="+token;
        }
      }).render('#paypal-button-container'); // Renders the PayPal button
    </script>
  </body>
</html>