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

  <style> #map_canvas { margin: 0; padding: 0; height: 400px;  /* The height is 400 pixels */
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
            <a class="navbar-brand" href="#pablo">User Profile</a>
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
                <a class="dropdown-item" href="./about.php">About Us</a>
                <a class="dropdown-item"  href="./terms.php">Terms and Agrrement</a>
                  <a class="dropdown-item" href="./logout.php">Logout</a>
                </div>
              </li>
              <button type="button" class="btn4 btn-dark" id="upload_btn" onclick="location.href='uploaddoc.php'">Unverified</button>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">

                <h5 class="title"> <?php print_r($_SESSION['checkuser']) ?> info.</h5>
              </div>
              <div class="card-body">
              <form action="profileupdate.php" method="post">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" class="form-control" name="brandname" placeholder="Brand Name" value="<?php print_r($snapshot->data()['brandname']) ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php print_r($snapshot->data()['email']) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php print_r($snapshot->data()['fname']) ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php print_r($snapshot->data()['lname']) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>Business Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Business Address" value="<?php print_r($snapshot->data()['address']) ?>">
                      </div>
                    </div>
                    <div class="col-md-5 pl-1">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" name="number" placeholder="Phone Number" value="<?php print_r($snapshot->data()['number']) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Location Latitutde</label>
                        <input id="lati" type="decimal" class="form-control" name="lati" placeholder="Latitude" value="<?php print_r($snapshot->data()['lati']) ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Location Longitude</label>
                        <input id="long"  type="decimal" class="form-control" name="long" placeholder="Longitude" value="<?php print_r($snapshot->data()['long']) ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number"   class="form-control" name="postal" placeholder="ZIP Code" value="<?php print_r($snapshot->data()['postal']) ?>">
                      </div>
                    </div>
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
							Update info
						</button>&nbsp;
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" >
              Find my Location
            </button>
                </form>
                
            
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user" >
              <div class="image" style="height: 13rem;">
                <img  id="display2" src="<?php print_r($snapshot->data()['bgimagelink']) ?>" alt="not set" onerror="this.src='../assets/img/bg5.jpg';">
              </div>
              <div class="card-body">
                <div class="author"><img id="display" class="avatar border-gray" src="<?php print_r($snapshot->data()['imagelink']) ?>"  alt="not set" onerror="this.src='../assets/img/default-avatar.png';">
                  
                  <h5 class="title" style="color: darkorange;"><?php print_r($snapshot->data()['brandname']) ?></h5>
                  <p class="description">
                  <?php print_r($snapshot->data()['address']);?>
                  </p>
                  <p class="description">
                  <?php print_r($snapshot->data()['number']);?>
                  </p>
                  <p class="description">
                  <?php print_r($snapshot->data()['fname']); print_r($snapshot->data()['lname']); ?>
                  </p>
                  
                </div>
                <p class="description text-center">
                <?php print_r($snapshot->data()['about']) ?>
                </p>
              </div>
              <hr>
              <div class="button-container">
              <div class="row">
                    <div class="col-md-6 pr-1" >
                        <label>Background Pic</label>
                        <input type="file" class="form-control" name="image2" id="image2"  onchange="preview2()">
                        <button type="button" class="btn1 btn-info" id="upload_btn2">Upload</button>
                      </div>
                    <div class="col-md-6 pl-1">
                        <label >Logo Pic</label>
                        <input type="file" class="form-control" name="image" id="image" onchange="preview()">
                        <button type="button" class="btn1 btn-info" id="upload_btn">Upload</button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <?php include './footer.php';?>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <!--   Core JS Files   -->

  <!--  <script type="module" src="../uploadimg2.js"></script> -->
  <script type="module" src="../uploadimg4.js"></script>
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
