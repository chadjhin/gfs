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
if(isset($_POST['idbtn']))
{
    $_SESSION['servname']=$_POST['idbtn'];
    
}
else if(isset($_GET['prodname']))
{ 
  $_SESSION['servname']=$_GET['prodname'];
    
}


else if((!isset($_GET['prodname']))&&(!isset($_POST['idbtn'])))
{
  echo'error';
}

    if(isset($_GET['userid']))
    {
      $userid22=$_GET['userid'];
    }
    else if(isset($_SESSION['user_id']))
    {
      $userid22=$_SESSION['user_id'];
    }


//$userprofile = new firestore(collection:'petstore');

      $_SESSION['checkuser3']='vetclinic';
      $docRef = $db->collection('vetclinic')->document($userid22)->collection('services')->document($_SESSION['servname']);
    $snapshot = $docRef->snapshot();
   // $sdfs=$userprofile->snapshot();
    

$num = $_SESSION['checkuser3'];
$iduser = $userid22;
$servid = $_SESSION['servname'];
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

<?php 

if(isset($_GET['userid']))
{
 
 include '../admin/header-admin.php';
}
else if(isset($_SESSION['user_id'])||!isset($_GET['userid']))
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
            <a class="navbar-brand" href="#pablo">Edit / View Services</a>
            <?php 
            if(isset($_GET['userid']))
            
            {
              print_r("<a class='btn btn-info float-right' id='list' name='list' href='listofservices.php?userid=".$userid22."&usertype=".$num."'>Service List</a>");
                 
            }
            else if(isset($_SESSION['user_id']))
            {
              
              print_r("<a class='btn btn-info float-right' id='list' name='list' href='listofservices.php'>Service List</a>");       
            }

            ?>
            </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Service of <?PHP printf($userid22)?></a>
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
                <h5 class="title">Service Image</h5>
              </div>
              <div class="card-body">
                
              <div class="image" style="height:60%; ">
                <img id="display3" src="<?php print_r($snapshot->data()['servimglink']) ?>" alt="not set" onerror="this.src='../assets/img/bg5.jpg';">
              </div>
<br/>
              <div class="row">
                    <div class="col-md-11 pr-1" >
                        <label>Service Image</label>
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

              <button style="float:right;"class="btnn btn-danger" type="submit" data-toggle="modal" data-target="#myModall">
							Delete
						</button>
                <h5 class="title">Service Information :</h5>
              </div>
              <div class="card-body">
              <form action="" method="post" id="servform2" name="form1">
              <div class="row">
                    <div class="col-md-12 pr-1">
                        <label>Service Image</label>
                        <input type="file" class="form-control" name="prodimg" id="prodimg" onchange="preview()">
                      
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Service Name</label>
                        <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" value="<?php print_r($_SESSION['servname'])?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Service Category</label>
                        <input type="text" class="form-control" name="Category" id="Category" placeholder="Category" value="<?php print_r($snapshot->data()['Category']) ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Service Price</label>
                        <input type="number" class="form-control" name="Price" id="Price" placeholder="Price" value="<?php print_r($snapshot->data()['Price']) ?>" >
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Vet</label>
                        <input type="text" class="form-control" name="Vet" id="Vet" placeholder="Vet" value="<?php print_r($snapshot->data()['Vet']) ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Service Description:</label>
                        <textarea rows="4" cols="80" class="form-control" name="Description" id="Description" placeholder="Your Product Description"><?php print_r($snapshot->data()['Description']) ?></textarea>
                      </div>
                    </div>
                  </div>
                  <button class="btn1 btn-info" id="vieweditserv" name="vieweditserv" class="login100-form-btn" button type="submit" >
							Edit Service
						</button>
                </form>
                
            
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

   <!-- Modal -->
   <div class="modal fade" id="myModall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Delete this Service?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btnn btn-danger" id="deleteserv">Yes</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Successfully deleted this Service!</p>
        </div>
        <div class="modal-footer">
          <?php
 if(isset($_SESSION['user_id']))
 {
   
  print_r("<button type='button' class='btn btn-default' 
   onClick='location.href='listofservices.php' >Continue</button>
   ");}
 else if(isset($_GET['userid']))
 {
   print_r("<button type='button' class='btn btn-default' 
   onClick='location.href='listofservices.php?usertype=".$num."&userid=".$userid22."' >Continue</button>
   ");
              
 }
          ?>
         </div>
      </div>
      
    </div>
  </div>
<!-- Modal usertype=".$num."&userid=".$iduser." -->
  
<script type="module">

var col = "<?php echo $num; ?>";
sessionStorage.setItem ("Col",col);
var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);
var serv = "<?php echo $servid ; ?>";  
sessionStorage.setItem("Servid",serv); 

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

