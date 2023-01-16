<?php
session_start();
error_reporting(0);

define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);
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
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
<style>
.btn1 {
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
  padding: 9px 25px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;

  
        }

        .nav-tab {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: blue;
  border-bottom: 1px solid blue;
  border-radius: 10px;
}

.nav-item {
  text-decoration: none;
  color: white;
  padding: 10px;
  font-weight: bold;
  border-radius: 10px;
}

.nav-item:hover {
  background-color: blue;
  color: white;
  border-radius: 10px;
}
</style>

</head>

<body class="">
  
<?php include './header-user1.php';?>

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
            <a class="navbar-brand" href="#pablo">List of Appointments</a> <br/><br/><br/>
            <div class="nav-tab">
  <a class="nav-item" href='PaidAppointments.php'>View Appointment History</a>
</div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              
            </ul>&nbsp;&nbsp;&nbsp;
           
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">List</h4>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      
<?php


    $iduser = $_SESSION['user_id'];

    $table = $db->collection('Petlover');
      $query = $table->orderBy('Name');
      $snapshot = $query->documents();
   
        
        echo
      "   <div>
      <th >Name</th>
      <th >Email</th>
      <th >Service</th>
      <th >Price</th>
      <th >Date</th>
      <th >Vet</th>
                      <th class='text-right'> Status </th>
                     
                      
              </thead> ";
              
              foreach ($snapshot as $document) {
                  $petloveremail = $document->data()['Email'];
                  //echo  $petloveremail ;
                  $table2 = $db->collection('Petlover')->document($petloveremail)->collection('appointments');
                  $query2 = $table2->orderBy('date', 'DESC');
                  $snapshot2 = $query2->documents();
                  foreach ($snapshot2 as $document2) {
                    $webid = $document2->data()['owner'];

                    if ($document2->exists() && $webid==$iduser &&  $document2->data()['datepayed']==null) {
                      print_r("
                      <tbody>
                      <tr>
                      <td>
                      ".$document->data()['Name']."
                      </td>
                      <td>
                      ".$document2->data()['email']."
                      </td>
                      <td>
                      ".$document2->data()['name']."
                      </td>
                      <td>
                      ₱".$document2->data()['price']."
                      </td>
                      <td>
                      ".$document2->data()['date']."
                      </td>
                      <td>
                      ".$document2->data()['vet']."
                      </td>
                      <td class='text-right'>
                      <a class='btn btn-primary' href='#'>Pending</a>
                       
                      </td>
                      </tr>
                    </tbody> ");
                      

                    }

                  }
   
               }   
      echo "</div>" ;
  
  
    
    
   ?>

                  </table>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <?php include '/gfs/footer.php';?>
    </div>
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
</body>

</html>
