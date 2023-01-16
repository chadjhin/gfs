<?php
session_start();
error_reporting(0);

define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;
if (empty($_SESSION['user_id']))
{
    header("Location:index.php?sessionfalse");
    die();
}
/*
if(isset($_POST['idbtn']))
{
    $_SESSION['petname']=$_POST['idbtn'];
    //printf($_SESSION['petname']);
}
else if(!isset($_POST['idbtn']))
{
    echo'error';
}*/


$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

//$userprofile = new firestore(collection:'petstore');

    /*  $_SESSION['checkuser']='petstore';
      $docRef = $db->collection('petstore')->document($_SESSION['user_id'])->collection('pets')->document($_SESSION['petname']);
    $snapshot = $docRef->snapshot(); */
    
$num = $_SESSION['checkuser'];
$iduser = $_SESSION['user_id'];

if($num=='vetclinic')
{
$petcount=0;
$prodcount=0;
$tablepet =$db->collection('vetclinic')->document($iduser )->collection('vets');
$tableprod =$db->collection('vetclinic')->document($iduser )->collection('services');
$querypet = $tablepet->orderBy('Name');
$queryprod = $tableprod->orderBy('Name');
$snapshotpet = $querypet->documents();
$snapshotprod = $queryprod->documents();
foreach ($snapshotpet as $documentpet) {
  if ($documentpet->exists()) {
    $petcount++;
  }} 
  foreach ($snapshotprod as $documentprod) {
    if ($documentprod->exists()) {
      $prodcount++;
    }} 
}

else if($num=='petstore')
{


$petcount=0;
$prodcount=0;
$tablepet =$db->collection('petstore')->document($iduser )->collection('pets');
$tableprod =$db->collection('petstore')->document($iduser )->collection('products');
$querypet = $tablepet->orderBy('Name');
$queryprod = $tableprod->orderBy('Name');
$snapshotpet = $querypet->documents();
$snapshotprod = $queryprod->documents();
foreach ($snapshotpet as $documentpet) {
  if ($documentpet->exists()) {
    $petcount++;
  }} 
  foreach ($snapshotprod as $documentprod) {
    if ($documentprod->exists()) {
      $prodcount++;
    }} 
}




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
</head>

<body class="">
  
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
            
            
            <?php 
            if( $_SESSION['usertype'] =='petstore')
            { 
              echo ' <a class="navbar-brand" href="#">Pet Store Dashboard</a>';
            }
            else if ( $_SESSION['usertype'] =='vetclinic')
            {
              echo ' <a class="navbar-brand" href="#">Vet Clinic Dashboard</a>';
            }
            ?>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Welcome to Petik, <?PHP printf($_SESSION['user_id'])?></a>
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
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
              <?php 
            if( $_SESSION['usertype'] =='petstore')
            { 
              echo ' <h5 class="card-category">Total</h5>
              <h4 class="card-title">No. of Products</h4>';
            }
            else if ( $_SESSION['usertype'] =='vetclinic')
            {
              echo '<h5 class="card-category">No. of services uploaded</h5>
              <h4 class="card-title"> Sample</h4>';
            }
            ?>
                
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Check</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <div class="chart-area"  style="font-size: 3vw; overflow: hidden;">
                  <h1  style="text-align: center;"><?php 
                  if( $_SESSION['usertype'] =='petstore')
                  { 
                    echo $prodcount;
                  }
                  else if ( $_SESSION['usertype'] =='vetclinic')
                  {
                    echo $prodcount;
                  }  ?></h1>
                </div>
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
              <?php 
            if( $_SESSION['usertype'] =='petstore')
            { 
              echo ' <h5 class="card-category">Total</h5>
              <h4 class="card-title">No. of Pets</h4>';
            }
            else if ( $_SESSION['usertype'] =='vetclinic')
            {
              echo '<h5 class="card-category">No. of Vets uploaded</h5>
              <h4 class="card-title"> Sample</h4>';
            }
            ?>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Check</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <div class="chart-area"  style="font-size: 3vw; overflow: hidden;">
                  <h1  style="text-align: center;"><?php
                  if( $_SESSION['usertype'] =='petstore')
                  { 
                    echo $petcount;
                  }
                  else if ( $_SESSION['usertype'] =='vetclinic')
                  {
                    echo $petcount;
                  }   ?></h1>
                </div>
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
              <h5 class="card-category">Total</h5>
                <h4 class="card-title">Revenue (USD)</h4>
                  
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Check</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="barChartSimpleGradientsNumbers"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                </div>
              </div>
            </div>
          </div>
        </div> 
<?php
$userprofile = new firestore(collection:'vetclinic');
$check1=$userprofile->checkvet($_SESSION['user_id']);

if($check1)
    {
      $_SESSION['checkuser']='vetclinic';
      $docRef = $db->collection('vetclinic')->document($_SESSION['user_id']);
    $snapshot = $docRef->snapshot();
    if($snapshot->data()['brandname'])
    {
      $a=2;
    }
    }
else
{
  $_SESSION['checkuser']='petstore';
  $docRef = $db->collection('petstore')->document($_SESSION['user_id']);
    $snapshot = $docRef->snapshot();
    if($snapshot->data()['brandname'])
    {
      $a=2;
    }
    
}
if($a!=2)
{
  
?>
        <br/><h2 style="text-align: center; margin-bottom:0px;">New to PETik?</h2>
        <h6 style="text-align: center; margin-top:0px;">Finish setting up your profile</h6>
            <div class="text-center">';
            
                <button onClick="location.href='/../gfs/userpage/user2.php' " style="background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 25px;
                margin: 4px 2px;
                cursor: pointer; border-radius: 12px;">Create Your Profile
                </button>
            </div>
        <?php }
        ?>
      </div>

      <?php include 'footer.php';?>

    </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script type="module" src="../total.js"></script>
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

var col = "<?php echo $num; ?>";

sessionStorage.setItem ("Col",col);
var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);


console.log(docu,col);

</script>