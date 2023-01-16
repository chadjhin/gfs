<?php
//session_start();
error_reporting(0);
define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);
if (empty($_SESSION['user_id']))
{
    header("Location:index.php?sessionfalse");
    die();
}
$token = $_GET['access_token'];
$setid = $_GET['setid'];
$type=$_SESSION['usertype'];


$docRef = $db->collection($type)->document($_SESSION['user_id'])->collection('subscription')->document('sub_details');
$exists= $docRef->snapshot()->exists();
$snapshot = $docRef->snapshot();
$subscriberID = $snapshot->data()['subscriberID'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PETik CAPSTONE PROJECT
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <script src="https://www.paypal.com/sdk/js?client-id=AQkV82d1ECHzVcx-gfAokqIoMfMOL8B5RNLxarnnuJUdrNZe2Yp4896rgoo4q7au3waASVpKV86ly6eR&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>

  <style>

  </style>

</head>

<body class="">
<script>
    var token = '<?php echo $token;?>';
    var setid = '<?php echo $setid;?>';
    var subscriberID = '<?php echo $subscriberID ?>';
</script>
  <?php include 'header-user1.php';?>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">Subscription</a>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Here to Stay, <?PHP printf($_SESSION['user_id'])?>?</a>
            </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="./about.php">About Us</a>
                <a class="dropdown-item"  href="./terms.php">Terms and Agrrement</a>
                  <a class="dropdown-item" href="./logout.php">Logout</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
        
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title" style="text-align:center;">BASIC PLAN</h4>
                
              </div>
              <div class="card-body">
                <h5 style="text-align:center;">$10.99</h5>
                <p style="text-align:center; line-height:2.5;">
                    monthly billing<br />Free Trial 1 week<br />12 billing cycles<br />allowed missed billing cycles: 1
                </p>
                <div style="padding: 20px;">
<!--///////////////////////////////////////////////////////////////////---plan 1---/////////////////////////////////////////////////////////-->
                <?php 
                if(($exists) && ($snapshot->data()['PlanID'] == "P-22041881MF2897426MMWXM2Y") && ($snapshot->data()['status'] =='ACTIVE'))
                {
                  echo'
                <div >
                <button  class="btn1 btn-success" style="	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" disabled>
                Your Subscribed to this Plan </button>
                <button  class="btn1 btn-danger" style=" margin-top:11px;	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" onclick="unsubscribe()">
                Cancel this Plan </button>
                </div>
                </div><br/><br/>
                <script type="text/javascript">
                    function unsubscribe() {
                      window.location = "accessTokenCancel.php?subscriberID="+subscriberID;
                    }
                </script>';
                }
                else if(($exists) && ($snapshot->data()['PlanID'] != "P-22041881MF2897426MMWXM2Y"))
                {
                  echo'
                <div >
                <button  class="btn1 btn-info" style="	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" onclick="downgrade()">
                Downgrade to this Plan</button>
                <button  class="btn1 btn-danger" style=" background-color:black; margin-top:11px;	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;"  disabled>
                Not Satisfied with Current Plan?</button>
                </div>
                </div><br/><br/>
                <script type="text/javascript">
                    function downgrade() {
                      var planid = "P-22041881MF2897426MMWXM2Y";
                      window.location = "downgradeplan.php?subscriberID="+subscriberID+"&accesstoken="+token+"&planID="+planid;
                    }
                </script>';
                }
                else
                {
                echo'
                <div id="paypal-button-container-P-22041881MF2897426MMWXM2Y"></div>
                </div>
                <script type="text/javascript">
                    paypal.Buttons({
                    style: {
                        shape: "pill",
                        color: "blue",
                        layout: "vertical",
                        label: "subscribe"
                    },
                    createSubscription: function(data, actions) {
                        return actions.subscription.create({
                        "plan_id": "P-22041881MF2897426MMWXM2Y"  
                        });
                    },
                    onApprove: function(data, actions) {
                        window.location = "sub_details.php?subscriptionID="+data.subscriptionID + "&access_token="+token+ "&setid="+setid;
                    }
                    }).render("#paypal-button-container-P-22041881MF2897426MMWXM2Y");

                </script>';
                  }
                    ?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
          <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title" style="text-align:center;">REGULAR PLAN</h4>
                
              </div>
              <div class="card-body">
                <h5 style="text-align:center;">$20.99</h5>
                <p style="text-align:center; line-height:2.5;">
                    monthly billing<br />Free Trial 1 month<br />12 billing cycles<br />allowed missed billing cycles: 2
                </p>
                <div style="padding: 20px;">
<!--///////////////////////////////////////////////////////////////////---plan 2---/////////////////////////////////////////////////////////-->
                <?php 
                if(($exists) && ($snapshot->data()['PlanID'] == "P-6BX18547FB462621GMMWXOTI") && ($snapshot->data()['status'] =='ACTIVE'))
                {
                  echo'
                <div >
                <button  class="btn1 btn-success" style="	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" disabled>
                Your Subscribed to this Plan </button>
                <button  class="btn1 btn-danger" style=" margin-top:11px;	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" onclick="unsubscribe()">
                Unsubscribe to this Plan </button>
                </div>
                </div><br/><br/>
                <script type="text/javascript">
                    function unsubscribe() {
                      window.location = "accessTokenCancel.php?subscriberID="+subscriberID+"&accesstoken="+token;
                    }
                </script>';
                }
                else if(($exists) && ($snapshot->data()['PlanID'] != "P-6BX18547FB462621GMMWXOTI"))
                {
                if($snapshot->data()['PlanID'] == "P-22041881MF2897426MMWXM2Y")
                {
                  echo'
                <div >
                <button  class="btn1 btn-info" style="	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" onclick="upgrade()">
                Upgrade to this Plan</button>';}
                else if($snapshot->data()['PlanID'] == "P-8VC0031466147322WMMWXPOA")
                {
                  echo'
                  <div >
                  <button  class="btn1 btn-info" style="	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" onclick="downgrade2()">
                  Downgrade to this Plan</button>';}
                echo'
                <button  class="btn1 btn-danger" style=" background-color:black; margin-top:11px;	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;"  disabled>
                Not Satisfied with Current Plan?</button>
                </div>
                </div><br/><br/>
                <script type="text/javascript">
                    var planid = "P-6BX18547FB462621GMMWXOTI";
                    function upgrade() {

                      window.open("upgradeplan.php?subscriberID="+subscriberID+"&accesstoken="+token+"&planID="+planid , "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=117,left=517,width=500,height=590");
                      
                    }
                    function downgrade2() {
                      window.location = "downgradegradeplan.php?subscriberID="+subscriberID+"&accesstoken="+token+"&planID="+planid;
                    }
                </script>';
                  }
                else{
                echo'
                    <div id="paypal-button-container-P-6BX18547FB462621GMMWXOTI"></div>
                    </div>
                    <script type="text/javascript">
                        paypal.Buttons({
                        style: {
                            shape: "pill",
                            color: "blue",
                            layout: "vertical",
                            label: "subscribe"
                        },
                        createSubscription: function(data, actions) {
                            return actions.subscription.create({
                            "plan_id": "P-6BX18547FB462621GMMWXOTI" 
                            });
                        },
                        onApprove: function(data, actions) {
                            window.location = "sub_details.php?subscriptionID="+data.subscriptionID + "&access_token="+token+ "&setid="+setid;
                        }
                        }).render("#paypal-button-container-P-6BX18547FB462621GMMWXOTI"); 

                    </script>';
                      }
                  ?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
          <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title" style="text-align:center;">PREMIUM PLAN</h4>
                
              </div>
              <div class="card-body">
                  
              <h5 style="text-align:center;">$40.99</h5>
                <p style="text-align:center; line-height:2.5;">
                    monthly billing<br />Free Trial 1 month<br />unlimited billing cycles<br />allowed missed billing cycles: 3
<!--///////////////////////////////////////////////////////////////////---plan 3---/////////////////////////////////////////////////////////-->                    
                </p>
                <div style="padding: 20px;">
                <?php 
                if(($exists) && ($snapshot->data()['PlanID'] == "P-8VC0031466147322WMMWXPOA") && ($snapshot->data()['status'] =='ACTIVE'))
                {
                  echo'
                <div >
                <button  class="btn1 btn-success" style="	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" disabled>
                Your Subscribed to this Plan </button>
                <button  class="btn1 btn-danger" style=" margin-top:11px;	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" onclick="unsubscribe()">
                Unsubscribe to this Plan </button>
                </div>
                </div><br/><br/>
                <script type="text/javascript">
                    function unsubscribe() {
                      window.location = "accessTokenCancel.php?subscriberID="+subscriberID+"&accesstoken="+token;
                    }
                </script>';
                }
                else if(($exists) && ($snapshot->data()['PlanID'] != "P-8VC0031466147322WMMWXPOA"))
                {
                  echo'
                <div >
                <button  class="btn1 btn-info" style="	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;" onclick="upgrade2()">
                Upgrade to this Plan</button>
                <button  class="btn1 btn-danger" style=" background-color:black; margin-top:11px;	width: 265px; Height: 35px; text-align: center;border-radius: 20px; border:none;"  disabled>
                Not Satisfied with Current Plan?</button>
                </div>
                </div><br/><br/>
                <script type="text/javascript">
                    function upgrade2() {
                      var planid="P-8VC0031466147322WMMWXPOA";
                      window.open("upgradeplan.php?subscriberID="+subscriberID+"&accesstoken="+token+"&planID="+planid , "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=117,left=517,width=500,height=590");
                      
                    }
                </script>';
                }
                else{
                echo'
                <div id="paypal-button-container-P-8VC0031466147322WMMWXPOA"></div>
                </div>
                <script type="text/javascript">
                    paypal.Buttons({
                    style: {
                        shape: "pill",
                        color: "blue",
                        layout: "vertical",
                        label: "subscribe"
                    },
                    createSubscription: function(data, actions) {
                        return actions.subscription.create({
                        "plan_id": "P-8VC0031466147322WMMWXPOA" 
                        });
                    },
                    onApprove: function(data, actions) {
                        window.location = "sub_details.php?subscriptionID="+data.subscriptionID + "&access_token="+token+"&setid="+setid;
                    }
                    }).render("#paypal-button-container-P-8VC0031466147322WMMWXPOA"); 

                </script>';}
                ?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>

      <?php include 'footer.php';?>

    </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
</body>

</html>