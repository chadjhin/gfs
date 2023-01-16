<?php
session_start();
global $db;


    $id=$_SESSION['user_id'];
    $type=$_SESSION['usertype'];
    
$docReft = $db->collection($type)->document($_SESSION['user_id'])->collection('subscription')->document('sub_details');
$exists= $docReft->snapshot()->exists();
$snapshott = $docReft->snapshot();


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
<style>
    .one {
  word-spacing: 99px;
}
  </style>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <div class="logo">
        <a class="typography-line">
          <h3 style="color:white;  margin-left:10px;">PETik</h3>
          <?php
    if( $_SESSION['usertype'] =='petstore')
    {
      echo'<h6 style="color:white; margin-left:10px;" >PETSTORE</h6>';
    }
    else if( $_SESSION['usertype'] =='vetclinic')
    {
      echo'<h6 style="color:white; margin-left:10px;" >VETCLINIC</h6>';
    }
    ?>
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper" style="overflow:hidden;">
        <ul class="nav">
          <li class="active">
            <a href="./userdashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active " >
          <a href="#error1" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
              <i class="now-ui-icons education_atom"></i>
              <i class="now-ui-icons arrows-1_minimal-down" style="float: right;"></i>
              <p>Manage</p> 
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php  
            if( $_SESSION['usertype'] =='petstore')
            {
              echo'<a class="dropdown-item" href="./user2.php?setid='.$id.'='.$type.'">Profile</a>
              <a class="dropdown-item" href="./listofproducts.php?setid='.$id.'='.$type.'">Products</a>
              <a class="dropdown-item" href="./listofpets.php?setid='.$id.'='.$type.'">Pets</a>';
            }else if( $_SESSION['usertype'] =='vetclinic')
            {
              echo'<a class="dropdown-item" href="./user2.php?setid='.$id.'='.$type.'">Profile</a>
              <a class="dropdown-item" href="./listofservices.php?setid='.$id.'='.$type.'">Services</a>
              <a class="dropdown-item" href="./listofvets.php?setid='.$id.'='.$type.'">Vets</a>';
            }
            
            
            ?>
            
          </div>
          </li>
          <li class="active ">
          <?php  
            if( $_SESSION['usertype'] =='petstore')
            {
              echo'<a href="./cart.php">
              <i class="now-ui-icons location_map-big"></i>
              <p>Cart Orders</p>
            </a>';
            }
            else if( $_SESSION['usertype'] =='vetclinic')
            {
              echo'<a href="./appointment.php">
              <i class="now-ui-icons location_map-big"></i>
              <p>Appointments</p>
            </a>';
            }?>
            
          </li>
          <li class="active  " >

<?php 
if(!$exists || $exists  && ($snapshott->data()['status'] =='CANCELLED'))
{
  echo '<a href="./uploaddoc.php"  style="pointer-events: none; background-color: lightgray; " >
              <i class="now-ui-icons users_single-02"></i>
              <p>Documents</p>
            </a>';

}
else
{
  echo '<a href="./uploaddoc.php" >
              <i class="now-ui-icons users_single-02"></i>
              <p>Documents</p>
            </a>';

}
?>


          </li>
          <li class="active "> <?php
          echo'<a href="./notiflist.php?setid='.$id.'='.$type.'">'; 
          ?>
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="active ">
            <a href="./sublist.php">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Receipts</p>
            </a>
          </li>
          <li class="active">
            <?php 
            echo'<a href="./messagetab.php?setid='.$id.'='.$type.'">';
              ?>
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Messages</p>
            </a>
          </li>
          <li class="active">
            <?php 
            echo'<a href="./accessToken.php?setid='.$id.'">';
              ?>
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Subscription</p>
            </a>
          </li>
          <li class="active "> <?php
          echo'<a href="./terms.php">'; 
          ?>
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Terms and Conditions</p>
            </a>
          </li>
          <li class="active "> <?php
          echo'<a href="./about.php">'; 
          ?>
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>About Us</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
</body>