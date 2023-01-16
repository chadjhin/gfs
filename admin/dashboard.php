<?php
session_start();
if ($_SESSION['admin_id'] !='3yBsyU7BYV4APf0vR4oD')
{
  //$varcheck=$_SESSION['admin_id'];
    header("Location:index.php?sessionfalse $varcheck");
    die();
}


define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

    $vetsubcount=0;
    $vetcount=0;
    $revcountvet=0;
    $totalrevcountvet=0;
    $tablevet = $db->collection('vetclinic');
    $queryvet = $tablevet->orderBy('username');
    $snapshotvet = $queryvet->documents();
    foreach ($snapshotvet as $documentvet) {
      if ($documentvet->exists()) {
        $vetcount++;
        $userwebinfoidvet = $documentvet->data()['username'];

        $subsRefvet = $db->collection('vetclinic')->document($userwebinfoidvet)->collection('subscriptionlist');

        $subqueryvet = $subsRefvet->where('status', '=', 'ACTIVE');
        $subsdocumentsvet = $subqueryvet->documents();
        foreach ($subsdocumentsvet as $subsdocumentvet) {
            if ($subsdocumentvet->exists()) {
              
              $vetsubcount++;
            }}

            $subqueryvet2 = $subsRefvet->orderBy('currentdate','DESC');
            $subsdocumentsvet2 = $subqueryvet2->documents();
            foreach ($subsdocumentsvet2 as $subsdocumentvet2) {
                if ($subsdocumentvet2->exists()) {
                  
                  $revcountvet++;
                }}

      }} 

    $petsubcount=0;
    $petcount=0;
    $revcountpet=0;
    $totalrevcountpet=0;
    $tablepet = $db->collection('petstore');
    $querypet = $tablepet->orderBy('username');
    $snapshotpet = $querypet->documents();
    foreach ($snapshotpet as $documentpet) {
      if ($documentpet->exists()) {
        $petcount++;
        $userwebinfoidpet = $documentpet->data()['username'];

        $subsRefpet = $db->collection('petstore')->document($userwebinfoidpet)->collection('subscriptionlist');

        $subquerypet = $subsRefpet->where('status', '=', 'ACTIVE');
        $subsdocumentspet = $subquerypet->documents();
        foreach ($subsdocumentspet as $subsdocumentpet) {
            if ($subsdocumentpet->exists()) {
              
              $petsubcount++;
            }}


            $subquerypet2 = $subsRefpet->orderBy('currentdate','DESC');
            $subsdocumentspet2 = $subquerypet2->documents();

            foreach ($subsdocumentspet2 as $subsdocumentpet2) {
                if ($subsdocumentpet2->exists()) {
                  
                  $revcountpet++;
                }}


      }} 

      $totalrevpet=$revcountpet*10;
      $totalrevvet=$revcountvet*10;

      $totalrevboth= $totalrevpet+$totalrevvet;

      $totalsubcount = $petsubcount +  $vetsubcount;

      $totalcount = $petcount +  $vetcount;


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
  
  <?php include './header-admin.php';?>

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
            <a class="navbar-brand" href="#">Dashboard</a>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Welcome to Petik, Admin</a>
            </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../userpage/logout.php">Logout</a>
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
        <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total</h5>
                <h4 class="card-title"> No. Subscribers</h4>
                
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
                  <h1  style="text-align: center;"><?php  echo $totalsubcount; ?></h1>
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
                <h4 class="card-title">No. of Users</h4>
                
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area"  style="font-size: 3vw; overflow: hidden;">
                  <h1  style="text-align: center;"><?php  echo $totalcount; ?></h1>
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
              </div>
              <div class="card-body">
                <div class="chart-area">
                <div class="chart-area"  style="font-size: 3vw; overflow: hidden;">
                  <h1  style="text-align: center;"><?php  echo $totalrevboth;  ?></h1>
                </div>
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
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>
<?php
//session_destroy();
?>