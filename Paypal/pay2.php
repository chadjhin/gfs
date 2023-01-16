<?php
$token = $_GET['access_token'];
?>
<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <style>
    body {
      display: flex;
      direction: 'column';
    }

    .column {
      border: 1px solid #ccc;
      margin: 20px;
      padding: 20px;
    }

    p {
      text-align: center;
      margin-bottom: 50px;
    }

  </style>
<script src="https://www.paypal.com/sdk/js?client-id=AQkV82d1ECHzVcx-gfAokqIoMfMOL8B5RNLxarnnuJUdrNZe2Yp4896rgoo4q7au3waASVpKV86ly6eR&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>

</head>

<body>
<script>
    var token = '<?php echo $token;?>';
</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="column">
    <p>
      BASIC PLAN<br />$10 per month<br />Free Trial 1 week
    </p>
    <div id="paypal-button-container-P-8NX53603PP598194YMMSUIDQ"></div> <!-- Replace with your plan ID -->
  </div>
  
  <script type="text/javascript">
    paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'blue',
          layout: 'vertical',
          label: 'subscribe'
      },
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          'plan_id': 'P-8NX53603PP598194YMMSUIDQ' // Replace with your plan ID
        });
      },
      onApprove: function(data, actions) {
        //alert('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
        //console.log('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
        //window.location = "sub_details.php?subscriptionID="+data.subscriptionID + "&access_token="+token;
      }
    }).render('#paypal-button-container-P-8NX53603PP598194YMMSUIDQ'); // Renders the PayPal button. Replace with your plan ID

  </script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <div class="column">
    <p>
      REGULAR PLAN<br />$20 per month<br />Free Trial 2 weeks
    </p>
    <div id="paypal-button-container-P-0LX400607L776923RMMSUNZQ"></div> <!-- Replace with your plan ID -->
  </div>
  <script type="text/javascript">
    paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'blue',
          layout: 'vertical',
          label: 'subscribe'
      },
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          'plan_id': 'P-0LX400607L776923RMMSUNZQ' // Replace with your plan ID
        });
      },
      onApprove: function(data, actions) {
        //alert('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
        //console.log('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
        //window.location = "sub_details.php?subscriptionID=" + data.subscriptionID + "&access_token="+token;
      }
    }).render('#paypal-button-container-P-0LX400607L776923RMMSUNZQ'); // Renders the PayPal button. Replace with your plan ID

  </script>
  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <div class="column">
    <p>
      PREMIUM PLAN<br />$40 per month<br />Free Trial 1 month
    </p>
    <div id="paypal-button-container-P-17U64777VN3856526MMTSCSQ"></div> <!-- Replace with your plan ID -->
  </div>
  <script type="text/javascript">
    paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'blue',
          layout: 'vertical',
          label: 'subscribe'
      },
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          'plan_id': 'P-17U64777VN3856526MMTSCSQ' // Replace with your plan ID
        });
      },
      onApprove: function(data, actions) {
        //alert('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
        //console.log('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
        //window.location = "sub_details.php?subscriptionID=" + data.subscriptionID + "&access_token="+token;
      }
    }).render('#paypal-button-container-P-17U64777VN3856526MMTSCSQ'); // Renders the PayPal button. Replace with your plan ID

  </script>
  </body>
</html>