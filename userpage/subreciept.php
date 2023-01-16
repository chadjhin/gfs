<?php
session_start();
error_reporting(0);

define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

    $num = $_SESSION['checkuser'];
    
    if(isset($_SESSION['user_id']))
    {
      $userid22=$_SESSION['user_id'];
    }
    else if(isset($_GET['userid']))
    {
      $userid22=$_GET['userid'];
    }

      $docRef = $db->collection($num)->document($userid22)->collection('subscriptionlist')->document($_GET['subdocid']);
    $snapshot = $docRef->snapshot();
   /* if ($snapshot->exists()) {
      printf('Document data:' . PHP_EOL);
      print_r($snapshot->data());
      print_r($snapshot->data()['username']);
  } else {
      printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
  }*/
    

$num = $_SESSION['checkuser'];
$iduser = $userid22;
$prodid = $_SESSION['prodname'];
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
  <link href="../assets/css/reciept.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  

</head>

<body class="user-profile">

<?php 

if(isset($_GET['userid']))
  {
     include '../admin/header-admin.php';
  }
  else if (!isset($_GET['userid']))
  {
    include './header-user1.php';
  }

?>

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
            <a class="navbar-brand" href="#pablo">View Receipt</a>
            <?php 

            if(isset($_SESSION['user_id']))
            {
              print_r("<a class='btn btn-info float-right' id='list' name='list' href='sublist.php'>Receipt List</a>");
            }
            else if(isset($_GET['userid']))
            {
              print_r("<a class='btn btn-info float-right' id='list' name='list' href='sublist.php?userid=".$userid22."&usertype=".$num."'>Receipt List</a>");
            
                 
            }

            ?>
            
            </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Welcome To Petik, <?PHP printf($userid22)?></a>
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

      <div class="panel-header panel-header-sm" >
      </div>
      <div class="content" >
        <div class="center" >
          
          <div class="center">
          <div class="card">
              <div class="card-header">

                <h5 class="title">Subscription Receipt :</h5>
              </div>
              <div class="card-body">

              <table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td >
                                        <h3>Thank you for using our website PETik</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td><?php print_r($snapshot->data()['username']);?><br>ID #<?php print_r($_GET['subdocid']);?><br><?php print_r($snapshot->data()['currentdate']);?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Subscription Plan</td>
                                                            <td class="alignright">Premium Plan</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td class="alignright"><?php print_r($snapshot->data()['status']);?></td>
                                                        </tr>
                                                        <?php if($snapshot->data()['status']!="ACTIVE")
                                                        {
                                                        echo'
                                                        <tr>
                                                            <td>Cancellation Date</td>
                                                            <td class="alignright">'.$snapshot->data()['cancel_time'].'</td>
                                                        </tr>';
                                                      }
                                                        ?>
                                                        <tr>
                                                            <td>Payment Address</td>
                                                            <td class="alignright"><?php print_r($snapshot->data()['payment_email_address']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Subscriber ID</td>
                                                            <td class="alignright"><?php print_r($snapshot->data()['subscriberID']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Amount Payed</td>
                                                            <td class="alignright"> ₱550.00</td>
                                                        </tr>
                                                        
                                                        <tr class="total">
                                                            <td class="alignleft" width="80%">Total</td>
                                                            <td class="alignright">$ 10.00</td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                <tr>
                                    <td >
                                        PETik Website
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
                  
                
            
              </div>
            </div>
          </div>


        </div>
      </div>
      <?php include './footer.php';?>
    </div>
  </div>



<!-- Modal -->



<script type="module">

var col = "<?php echo $num; ?>";
sessionStorage.setItem ("Col",col);
var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);
var prod = "<?php echo $prodid ; ?>";  
sessionStorage.setItem("Prodid",prod); 
</script>

<script>
function preview(){
  display3.src=URL.createObjectURL(event.target.files[0]);
}


</script>

  <!--   Core JS Files   -->
  <!--<script type="module" src="../uploadimg3.js"></script>-->
  <script type="module" src="../uploadimg4.js"></script>
  <script type="module" src="deletedocs1.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  
</body>

</html>

