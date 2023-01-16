<?php
session_start();
error_reporting(0);
$webtype= $_GET['usertype'];

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
            <a class="navbar-brand" href="#pablo">Receipts List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Choose User Type
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form action="tables.php" method="post">
                  <button class="dropdown-item" name="btn1" value="1" button type="submit">Vet Clinics</a>
                  <button class="dropdown-item" name="btn2" value="2" button type="submit">Pet Store</a>
                  <button class="dropdown-item" name="btn3" value="3" button type="submit">Pet Lovers</a>
                </form>
                </div>
              </div>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <?php
                if($_POST['btn1']||($webtype=="vetclinic")){
                  echo '
                  <a class="navbar-brand" href="#pablo">My Subscription Receipts</a>';
                  
                }
                else if($_POST['btn2']||($webtype=="petstore")){
                  echo '
                  <a class="navbar-brand" href="#pablo">Pet Store User List</a>';
                }
                else if($_POST['btn3']||($webtype=="Petlover")){
                  echo '
                  <a class="navbar-brand" href="#pablo">Pet Lovers User List</a>';
                }
                else{
                  echo '
                  <a class="navbar-brand" href="#pablo">Vet Clinic User List</a>';
                }

                ?>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      
<?php

    
    
if(empty($_POST)&&(($webtype!="petstore")&&($webtype!="Petlover")))
{
  $table = $db->collection('vetclinic')->document($id)->collection('subscriptionlist');
  }
else
{if( $_POST['btn1']||($webtype=="vetclinic"))
    {
      $table = $db->collection('vetclinic')->document($id)->collection('subscriptionlist');
    }
    else if($_POST['btn2']||($webtype=="petstore")){
    $table = $db->collection('petstore');


    
    }
    else if($_POST['btn3']||($webtype=="Petlover")){
      $table = $db->collection('Petlover');
      print_r('Petlover');//for mobile users
    }
    else
  {
    $table = $db->collection('vetclinic')->document($id)->collection('subscriptionlist');
  }
    }

    //$table = $db->collection('vetclinic');
    //$table = $db->collection('vetclinic');
    if($_POST['btn3']||($webtype=="Petlover")){
      $query = $table->orderBy('Email');
      $snapshot = $query->documents();
    }
    else
    {
      $query = $table->orderBy('currentdate');
      $snapshot = $query->documents();
    }

    $role=1;
    $num_rows=1;
    if($role==1)
    {

    if ($num_rows > 0) {

        
      if($_POST['btn3']||($webtype=="Petlover"))
      {
        echo
        "   <div>
                        <th >Name</th>
                        <th >Age</th>
                        <th >Email</th>
                        <th >Mobile</th>
                        <th >Address</th>
                        <th class='text-right'> Options </th>
                       
   
      
                        
                </thead> ";
        foreach ($snapshot as $document) {
          if ($document->exists()) {
            $userwebinfoid = $document->data()['Email'];
            print_r("
                <tbody>
                <tr>
                <td>
                ".$document->data()['Name']."
                </td>
                <td>
                ".$document->data()['Age']."
                </td>
                <td>
                ".$document->data()['Email']."
                </td>
                <td>
                ".$document->data()['Mobile']."
                </td>
                <td>
                ".$document->data()['Address']."
                </td>
                <td class='text-right'>
                <a class='btn btn-success' href='./usermobileinfo.php?userwebinfoid=".$userwebinfoid."'</a>more info.
                </td>
                </tr>
              </tbody> ");
              //$lastusername = $document->data()['username'];       
        }  else {
          printf('Empty' );
      }}   
        echo "</div>" ;
    
    
      }
      else if($_POST['btn1']||$_POST['btn2']||$webtype=="vetclinic"||$webtype=="petstore"){
        
        echo
        "   <div>
                        <th >Username</th>
                        <th >Status</th>
                        <th >PayerID</th>
                        <th >Date</th>
                        <th class='text-right'> Options </th>
                       
                        
                </thead> ";
        foreach ($snapshot as $document) {

          $table2 = $table->document($document->data()['username'])->collection('subscription');
          
          //printf('%s => %s' . PHP_EOL, $document->id(),  $document->data()['username']);
          //}
          
          if ($document->exists()) 
          {
            //$_SESSION['userwebid']=  $document->data()['username'];
            $userwebinfoid = $document->data()['username'];

            print_r("
                <tbody>
                <tr>
                <td>
                ".$document->data()['username']."
                </td>
                <td>
                ".$document->data()['status']."
                </td>
                <td>
                ".$document->data()['payerID']." 
                </td>
                <td>
                ". $document2->data()['date']."
                </td>
                <td class='text-right'>
                <a class='btn btn-success' href='./userwebinfo.php?userwebinfoid=".$userwebinfoid."'</a>more info.
                </td>
                </tr>
              </tbody> ");
              //$lastusername = $document->data()['username'];       
          }  
         
        echo "</div>" ;
    
    
    }}
    else if(!$_POST['btn3'] && !$_POST['btn2']&&!$_POST['btn1'])
    {
      echo
      "   <div>
                      <th >Logo</th>
                      <th >Store Name</th>
                      <th >User Name</th>
                      <th >Owners Name</th>
                      <th >Email Address</th>
                      <th class='text-right'> Options </th>
                     
                      
              </thead> ";
      foreach ($snapshot as $document) {
        if ($document->exists()) {
          //$_SESSION['userwebid']=  $document->data()['username'];
          $userwebinfoid = $document->data()['username'];
          $folderpath = "../assets/img/default-avatar.png";

          print_r("
              <tbody>
              <tr>
              <td>
              <img id='display' style='width:50px; height:50px;' class='avatar border-gray' src='".$document->data()['imagelink']."'  onerror='this.src='../assets/img/default-avatar.png';'>
                
              </td>
              <td>
              ".$document->data()['brandname']."
              </td>
              <td>
              ".$document->data()['username']."
              </td>
              <td>
              ".$document->data()['fname']."
              ".$document->data()['lname']."
              </td>
              <td>
              ".$document->data()['email']."
              </td>
              <td class='text-right'>
              <a class='btn btn-success' href='./userwebinfo.php?userwebinfoid=".$userwebinfoid."'</a>more info.
              </td>
              </tr>
            </tbody> ");
            //$lastusername = $document->data()['username'];       
      }  else {
        printf('Empty' );
    }}   
      echo "</div>" ;
  
  
  
    }
  }

    else {    echo "<p class='text-black text-center bg-danger'>Your reservation list is empty!<p>"; }
    
    } ?>

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


