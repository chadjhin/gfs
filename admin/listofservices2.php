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
            <a class="navbar-brand" href="#pablo">Services List</a> <br/><br/><br/>
            
            <!--<a class='btn btn-info float-right' id='add' name='add' href="postservices.php">Add Service</a>-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              
            </ul>&nbsp;&nbsp;&nbsp;
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
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
                <h4 class="card-title">Service List</h4> 
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      
<?php


      $_SESSION['checkuser']='vetclinic';
        
    $type = $_SESSION['checkuser'];
    $iduser = $_GET['userid'];
    $services="services";

  $table = $db->collection("$type/$iduser/$services");
  

     $query = $table->orderBy('Name');

     
    $snapshot = $query->documents();
   
    

    $role=1;
    $num_rows=1;
    if($role==1)
    {

    if ($num_rows > 0) {
        
        
        echo
        "   <div>
                        <th >Picture</th>
                        <th >Name</th>
                        <th >Category</th>
                        <th >Price</th>
                        <th >Vet</th>
                        <th class='text-right'> Options </th>
                       
                                        
                </thead> ";
        foreach ($snapshot as $document) {
          if ($document->exists()) {
            $name=$document->data()['Name'];
            $petname=$document->data()['Name'];
            print_r("
                <tbody>
                <tr>
                <td>
                <img id='display' style='width:50px; height:50px;' class='avatar border-gray' src='".$document->data()['servimglink']."'onerror='this.src='../assets/img/default-avatar.png';'>
                  
                </td>
                <td>
                ".$document->data()['Name']."
                </td>
                <td>
                ".$document->data()['Category']."
                </td>
                <td>
                ".$document->data()['Price']."
                </td>
                <td>
                ".$document->data()['Vet']."
                </td>
                <td class='text-right'>
                <form action='servicedetail.php?prodname=".$name."' method='post'>
                <button class='btn btn-success' type='submit' id='idbtn' name='idbtn' value='".$name."'  placeholder='more info.'>more info.</button>
                </form>
                </td>
                </tr>
              </tbody> ");
              //$lastusername = $document->data()['username'];       
        }  else {
          printf('Empty' );
      } }
        echo "</div>" ;
    
        //$nextQuery = $table->orderBy('username')->startAfter([$lastusername]);
        //$snapshot = $nextQuery->documents();
    }
    
    else {    echo "<p class='text-black text-center bg-danger'>Pet list is empty!<p>"; }
    
    } ?>

                  </table>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
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
</body>

</html>
