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
         .btnn{
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
  padding: 9px 25px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;
        }
        </style>

</head>

<body class="user-profile">

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
            <a class="navbar-brand" href="#pablo">Post Pets</a>
            
            <a class='btn btn-info float-right' id='list' name='list' href="listofpets.php">Pet List</a>
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
                <a class="dropdown-item" href="./logout.php">Logout</a>
                <a class="dropdown-item"  href="./terms.php">Terms and Agrrement</a>
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
        <div class="row" >
          <div class="col-md-5" >
            <div class="card">
              <div class="card-header">
                <h5 class="title">Pet Image</h5>
              </div>
              <div class="card-body">
                
              <div class="image" style="height:60%; ">
                <img id="display3" src="" alt="not set" onerror="this.src='../assets/img/bg5.jpg';">
              </div>
<br/>
              <div class="row">
                    <div class="col-md-11 pr-1" >
                        <label>Pet Image</label>
                        <!-- <input type="file" class="form-control" name="prodimg" id="prodimg" required>-->
                         <!-- <button type="button" class="btn btn-primary" id="upload_btn2">Upload</button> -->
<br/>
                      </div>
              </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-7">
          <div class="card">
              <div class="card-header">

                <h5 class="title">Pet Information :</h5>
              </div>
              <div class="card-body">
              <form action="" method="post" id="petform" name="form1">
              <div class="row">
                    <div class="col-md-12 pr-1">
                        <label style="color:red;">Pet Image*</label>
                        <input type="file" class="form-control" name="petimg" id="petimg" onchange="preview()" required>
                      
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Name*</label>
                        <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Category*</label>
                        <input type="text" class="form-control" name="Category" id="Category" placeholder="Category" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Price*</label>
                        <input type="number" class="form-control" name="Price" id="Price" placeholder="Price" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Breed*</label>
                        <input type="text" class="form-control" name="Breed" id="Breed" placeholder="Breed" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;"> Pet Sex*</label>
                        <input type="text" class="form-control" name="Sex" id="Sex" placeholder="Sex" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Color*</label>
                        <input type="text" class="form-control" name="Color" id="Color" placeholder="Color" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Eye Color*</label>
                        <input type="text" class="form-control" name="Eye" id="Eye" placeholder="Eye Color" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Weight*</label>
                        <input type="text" class="form-control" name="Weight" id="Weight" placeholder="Weight in kg" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Birthdate*</label>
                        <input type="date" class="form-control" name="Birthdate" id="Birthdate" placeholder="Birthdate" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Age*</label>
                        <input type="text" class="form-control" name="Age" id="Age" placeholder="Age" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Pet Description*:</label>
                        <textarea rows="4" cols="80" class="form-control" name="Description" id="Description" placeholder="Additional Pet Info" required></textarea>
                      </div>
                    </div>
                  </div>
                  <button class="btn1 btn-info" id="uploadpet" name="button1" value="" class="login100-form-btn" button type="submit" >
							Add Pet
						</button>
            <button value="reset" class="btnn btn-primary" button type="reset" id="imgreset" onclick="back()">
							Clear Fields
						</button>
                </form>
                
            
              </div>
            </div>
          </div>


        </div>
      </div>
      <?php include './footer.php';?>
    </div>
  </div>

  
<script type="module">

var col = "<?php echo $num; ?>";
sessionStorage.setItem ("Col",col);
var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);

var addedDocRef = "<?php echo $addedDocRef ?>";
sessionStorage.setItem ("AddedDocRef",addedDocRef);
</script>

<script>
function preview(){
  display3.src=URL.createObjectURL(event.target.files[0]);
}

function back(){
  display3.src="../assets/img/bg5.jpg";
}

</script>

  <!--   Core JS Files   -->
  <!--<script type="module" src="../uploadimg3.js"></script>-->
  <script type="module" src="../uploadimg4.js"></script>
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

