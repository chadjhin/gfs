<?php
error_reporting(0);
define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

$userprofile = new firestore(collection:'vetclinic');
$check1=$userprofile->checkvet($_SESSION['user_id']);

if($check1)
    {
      $_SESSION['checkuser']='vetclinic';
      $docRef = $db->collection('vetclinic')->document($_SESSION['user_id']);
    $snapshot = $docRef->snapshot();
   // $sdfs=$userprofile->snapshot();
    }
else
{
  $_SESSION['checkuser']='petstore';
  $docRef = $db->collection('petstore')->document($_SESSION['user_id']);
    $snapshot = $docRef->snapshot();
    
}
$num = $_SESSION['checkuser'];
$iduser = $_SESSION['user_id'];
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
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

  <style> #map_canvas { margin: 0; padding: 0; height: 400px; 
        width: 400px; }
        .btn1 {
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
  padding: 9px 25px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;
        }
        .btn4 {
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
          padding: 3px 25px;
          border-radius:.99rem;
          border: none;
          margin: 6px 2px;
          
        }.btn5 {
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
          padding: 9px 25px;
          border-radius:.25rem;
          border: none;
          margin: 6px 2px;
          
        }
        .hide{
  opacity: 0;
  width: 0;
  float: left; /* Reposition so the validation message shows over the label */
 height: 0; border: none; position: absolute; pointer-events: none;
}.hide2{
  opacity: 0;
  width: 0;
  float: left; /* Reposition so the validation message shows over the label */
 height: 0; border: none; position: absolute; pointer-events: none;
}
        </style>
</head>

<body class="user-profile">

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
              echo ' <a class="navbar-brand" href="#">Pet Store User Profile</a>';
            }
            else if ( $_SESSION['usertype'] =='vetclinic')
            {
              echo ' <a class="navbar-brand" href="#">Vet Clinic User Profile</a>';
            }
            ?>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Welcome to PETik, <?PHP printf($_SESSION['user_id'])?></a>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <button type="button" class="btn4 btn-dark" id="upload_btn" style='float:right;' onclick="location.href='uploaddoc.php'">Unverified</button>
              <img id="display" style='width:100px; height:100px; float:left; margin-right:10px;' class="avatar border-gray" src="<?php print_r($snapshot->data()['imagelink']) ?>"  alt="not set" onerror="this.src='../assets/img/default-avatar.png';" required>
              <br/><h5 class="title"> <?php if( $_SESSION['checkuser'] == 'petstore' )
              {

                echo"Petstore";
              }
              else
              {
                echo"Vetclinic";

              }
               
              ?> Information</h5><label style="color:red;" >Logo Pic *</label><br/>
              
              
              <div class="input-group mb-3">
              <div class="custom-file">
                <div class="col-md-3 pl-1">
              <input type="file" style='margin-left:5px;'class="form-control" name="image" id="image" onchange="preview()">
                </div>
              <button type="button" class="btn1 btn-info" id="upload_btn">Upload</button>
              </div>
              </div>

              <div class="card-body">
              <form action="profileupdate.php" method="post">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Store Name *</label>
                        <input type="text" class="form-control" name="brandname" placeholder="Store Name" value="<?php print_r($snapshot->data()['brandname']) ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group" >
                        <label for="exampleInputEmail1" style="color:red;">Business Email address *</label>
                        <input type="email" class="form-control" placeholder="Business Email address" name="email" value="<?php print_r($snapshot->data()['email']) ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Owner First Name *</label>
                        <input type="text" class="form-control" name="fname" placeholder="Owner First Name" value="<?php print_r($snapshot->data()['fname']) ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label style="color:red;">Owner Last Name *</label>
                        <input type="text" class="form-control" name="lname" placeholder="Owner Last Name" value="<?php print_r($snapshot->data()['lname']) ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Business Address *</label>
                        <input type="text" class="form-control" name="address" placeholder="Business Address" value="<?php print_r($snapshot->data()['address']) ?>" required>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label style="color:red;">Contact Number *</label>
                        <input type="number" class="form-control" name="number" placeholder="Phone Number" value="<?php print_r($snapshot->data()['number']) ?>" required>
                      </div>
                    </div>
                    <!--<div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label style="color:red;">Contact Person Number *</label>
                        <input type="number" class="form-control" name="contact" placeholder="Contact Number" value="<?php print_r($snapshot->data()['contact']) ?>" required>
                      </div>
                    </div>-->
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Short Description:</label>
                        <textarea rows="4" cols="80" class="form-control" name="about" placeholder="Here you can put your description" ><?php print_r($snapshot->data()['about']) ?></textarea>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-info" id="1" name="button1" value="petstore" class="login100-form-btn" button type="submit">
							Save
						</button>&nbsp;
            
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" >
              Find my Location
            </button> 
            
            <button class="btn4 btn-info" id="loc1" hidden>Location has been Set</button>
            <button  class="btn4 btn-danger" id="loc2" hidden>Location Not Set</button>
            <input id="long" class="hide2" name="long" placeholder="Longitude" value="<?php print_r($snapshot->data()['long']) ?>" required>
            <input id="lati" class="hide" name="lati" placeholder="Latitude" value="<?php print_r($snapshot->data()['lati']) ?>" required>
            <button  class="btn4 btn-primary" id="loc3" hidden>Location Updated</button>
            </button> <button style="float:right;" class="btn5 btn-danger" button type="submit" data-toggle="modal" data-target="#deleteaccmodal">
							Delete
						</button>
                </form>
               <script>
              
window.addEventListener('DOMContentLoaded',async function() {checkloc()});

              function checkloc()
              {
                if($('.hide').length && $('.hide').val().length )
                {
                  let element1 = document.getElementById("loc1");
                  //element1.setAttribute("hidden","hidden");
                    element1.removeAttribute("hidden");
                }
                else
                {
                  let element2 = document.getElementById("loc2");
                  //element1.setAttribute("hidden","hidden");
                    element2.removeAttribute("hidden");
                }
              }
              function setloc()
              {
                let element3 = document.getElementById("loc3");
                  //element1.setAttribute("hidden","hidden");
                    element3.removeAttribute("hidden");

                    let element2 = document.getElementById("loc2");
                  element2.setAttribute("hidden","hidden");

                    let element1 = document.getElementById("loc1");
                  element1.setAttribute("hidden","hidden");
              }
            </script>


      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Click on the Map for your Specific Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php require './userlocation.php';?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick=setloc() >Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deleteaccmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Delete this Account?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btnn btn-danger" id="deletusereacc" onClick="location.href='profileupdate.php?buttonid=deletusereacc'">Yes</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="deleteaccmodal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Successfully deleted your Account!</p>
        </div>
        <div class="modal-footer"> 
          
          <button type="button" class="btn btn-default" onClick="location.href='logout.php'">Continue</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->


  <!--   Core JS Files   -->

  <!--  <script type="module" src="../uploadimg2.js"></script> -->
  <script type="module" src="../uploadimg4.js"></script>
  <script type="module" src="../userpage/deletedocs1.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCx_MTN7DUx0ijSV_vGtZ_pPvCbY9N3w08"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
</body>

</html>

<script type="module">
var col = "<?php echo $num; ?>";
sessionStorage.setItem("Col",col);
var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);


function preview(){
  display.src=URL.createObjectURL(event.target.files[0]);
}
function preview2(){
  display2.src=URL.createObjectURL(event.target.files[0]);
}

console.log(docu,col);
console.log(addedDocRef);
</script>
