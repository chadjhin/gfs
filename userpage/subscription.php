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
  <script src="https://www.paypal.com/sdk/js?client-id=AQkV82d1ECHzVcx-gfAokqIoMfMOL8B5RNLxarnnuJUdrNZe2Yp4896rgoo4q7au3waASVpKV86ly6eR&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
  
  <script src="../assets/X-Notify-main/x-notify.js"></script>
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
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title" style="text-align:center;">FREE PLANs</h4>
                
              </div>
              <div class="card-body">
                <h5 style="text-align:center;">₱550.00</h5>
                <p style="text-align:center; line-height:2.5;">
                    Limited functionality<br />Cannot verify your account<br />Store wont show be seen by Petlovers<br/>
                </p>
                <div style="padding: 20px;">
<!--///////////////////////////////////////////////////////////////////---Free Trial---/////////////////////////////////////////////////////////-->
                <?php 
                if(($exists) && ($snapshot->data()['PlanID'] == "P-22041881MF2897426MMWXM2Y") && ($snapshot->data()['status'] =='ACTIVE'))
                {
                  echo'
                <div >
                <button  class="btn1 btn-primary" style="	width: 500px; Height:55px; text-align: center;border-radius: 40px; border:none;" disabled>
                You are already subscribed to a plan </button>
                <button  class="btn1 btn-primary" style=" margin-top:17px;	width: 500px; Height: 55px; text-align: center;border-radius: 40px; border:none;" disabled>
                You cant use free plan anymore </button>
                </div>
                </div><br/><br/>
                ';}
                else{
                  echo'
                <div >
                <button  class="btn1 btn-success" style="	width: 500px; Height:55px; text-align: center;border-radius: 40px; border:none;" disabled>
                You are currently using Free Plan </button>
                <button  class="btn1 btn-danger" style=" margin-top:17px;	width: 500px; Height: 55px; text-align: center;border-radius: 40px; border:none;" disabled>
                Upgrade to a Premium Plan to use all functionality </button>
                </div>
                </div><br/><br/>
               ';}
                    ?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title" style="text-align:center;">PREMIUM PLAN</h4>
                
              </div>
              <div class="card-body">
                <h5 style="text-align:center;">₱10.00</h5>
                <p style="text-align:center; line-height:2.5;">
                    Account eligible for verification <br />Store will be shown to Petlovers<br />Full functionality<br />
                </p>
                <div style="padding: 20px;">
<!--///////////////////////////////////////////////////////////////////---plan 1---/////////////////////////////////////////////////////////-->

<!-- <button  class="btn1 btn-danger" style=" margin-top:17px;	width: 500px; Height: 55px; text-align: center;border-radius: 40px; border:none;" onclick="unsubscribe()">
                Cancel this Plan </button>-->
                
                
                <?php 
                if(($exists) && ($snapshot->data()['PlanID'] == "P-22041881MF2897426MMWXM2Y") && ($snapshot->data()['status'] =='ACTIVE'))
                {
                  echo'
                <div >
                <button  class="btn1 btn-success" style="	width: 500px; Height:55px; text-align: center;border-radius: 40px; border:none;" disabled>
                Your Subscribed to this Plan </button>
                <button  class="btn1 btn-success" style=" margin-top:17px;	width: 500px; Height: 55px; text-align: center;border-radius: 40px; border:none;" disabled>
                You cant cancel until subscription ends </button>
                </div>
                </div><br/><br/>
                <script type="text/javascript">
                    function unsubscribe() {
                      window.location = "accessTokenCancel.php?subscriberID="+subscriberID;
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

<script type="module">
console.log("start");
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";

  import { getFirestore, query,where,onSnapshot,limit,orderBy,startAfter, collection, addDoc, getDocs, serverTimestamp  } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  
var setid = "<?php echo $setid; ?>";
sessionStorage.setItem("Docuid",setid);

var type = "<?php echo $type; ?>";
sessionStorage.setItem("Typeuser",type);

			document.addEventListener("DOMContentLoaded", () => {
				const Notify = new XNotify();

				let success = document.getElementById("success");
				let error = document.getElementById("error");
				let alert = document.getElementById("alert");
				let info = document.getElementById("info");
        

        
const firebaseConfig = {
  authDomain: "petik-357402.firebaseapp.com",
  projectId: "petik-357402",
  storageBucket: "petik-357402.appspot.com",
  messagingSenderId: "361499100540",
  appId: "1:361499100540:web:af4233dd53e4bab0f750f9",
  measurementId: "G-GPSTS95XWC"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

var date = "<?php 
    date_default_timezone_set('Asia/Manila');
    $date = date('d-m-y h:i:s'); 
    echo $date; ?>";
sessionStorage.setItem("Currentdate",date);

var Docuid = sessionStorage.getItem("Docuid");  // store value of user id which is username
var Typeuser = sessionStorage.getItem("Typeuser");
var Currentdate  = sessionStorage.getItem("Currentdate");


const q = query(collection(db, Typeuser,Docuid,'subscription'), where('status', '==', 'ACTIVE'));
const unsubscribe = onSnapshot(q, (snapshot) => {
  snapshot.docChanges().forEach((change) => {
    if (change.type === "added") {

      Notify.success({ 
						title: "You have 1 new notification", 
						description: "Succesfully subscribed to the subscription plan", 
						duration: 4000
					});
    }
    if (change.type === "modified") {
      Notify.alert({ 
						title: "You have 1 new notification", 
						description: "Succesfully modified the subscription plan", 
						duration: 4000
					});
    }
    if (change.type === "removed") {

      Notify.error({ 
						title: "You have 1 new notification", 
						description: "Succesfully cancelled the subscription plan", 
						duration: 4000
					});
    }
  });
});



             success.addEventListener("click", () => {
					Notify.success({ 
						title: "A Successful Event", 
						description: "The description of a successful event.", 
						duration: 4000
					});
				});

				error.addEventListener("click", () => {
					Notify.error({
						title: "Some Error",
						description: "Description of said error.",
						duration: 4000
					});
				});

				alert.addEventListener("click", () => {
					Notify.alert({
						title: "Just a Warning",
						description: "Description of the alert or warning.",
						duration: 4000
					});
				});

				info.addEventListener("click", () => {
					Notify.info({
						title: "Just Some Info",
						description: "Longer version of the information.",
						duration: 4000
					});
				});

				custom.addEventListener("click", () => {
					Notify.info({
						width: "300px",
						borderRadius: "4px",
						title: "Customized Notification",
						description: "Description of the notification.",
						duration: 10000,
						background: "rgb(0,0,30)",
						color: "rgb(0,200,255)"
					});
				});
			});
		</script>