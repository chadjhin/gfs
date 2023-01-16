<?php
session_start();
error_reporting(0);
if(isset($_POST['idbtn']))
{
    $_SESSION['petname']=$_POST['idbtn'];
    //printf($_SESSION['petname']);
}
else if(isset($_GET['prodname']))
{ 
  $_SESSION['servname']=$_GET['prodname'];
    
}
else if((!isset($_GET['prodname']))&&(!isset($_POST['idbtn'])))
{
  echo'error';
}

define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);
    if(isset($_GET['userid']))
    {
      $userid22=$_GET['userid'];
    }
    else  if(isset($_SESSION['user_id']))
    {
      $userid22=$_SESSION['user_id'];
    }
  

      $_SESSION['checkuser']='petstore';
      $docRef = $db->collection('petstore')->document($userid22)->collection('pets')->document($_SESSION['petname']);
    $snapshot = $docRef->snapshot();
   // $sdfs=$userprofile->snapshot();
    
$num = $_SESSION['checkuser'];
$iduser =$userid22;
$petid = $_SESSION['petname'];
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
 else if(!isset($_GET['userid']))
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
            <a class="navbar-brand" href="#pablo">View / Edit Pets</a>
            <?php 
 if(isset($_GET['userid']))
{
  print_r("<a class='btn btn-info float-right' id='list' name='list' href='listofpets.php?userid=".$userid22."&usertype=".$num."'>Pet List</a>");

     
}
else if(isset($_SESSION['user_id']))
            {
              
              print_r("<a class='btn btn-info float-right' id='list' name='list' href='listofpets.php'>Pet List</a>");
            }
            

            ?>
            </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Service of, <?PHP printf($iduser) ?></a>
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
                <img id="display3" src="<?php print_r($snapshot->data()['petimglink']) ?>" alt="not set" onerror="this.src='../assets/img/bg5.jpg';">
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
              <button style="float:right;" class="btnn btn-danger" button type="submit" data-toggle="modal" data-target="#myModalpt">
							Delete
						</button>
                <h5 class="title">Pet Information :</h5>
              </div>
              <div class="card-body">
              <form action="" method="post" id="viewform" name="form1">
              <div class="row">
                    <div class="col-md-12 pr-1">
                        <label>Pet Image</label>
                        <input type="file" class="form-control" name="petimg" id="petimg" onchange="preview()"  >
                      
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Name</label>
                        <input type="text" class="form-control" name="Name" id="Name" placeholder="Name"  value="<?php print_r($_SESSION['petname'])?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Category</label>
                        <input type="text" class="form-control" name="Category" id="Category" placeholder="Category" value="<?php print_r($snapshot->data()['Category']) ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Price</label>
                        <input type="number" class="form-control" name="Price" id="Price" placeholder="Price" value="<?php print_r($snapshot->data()['Price']) ?>" >
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Breed</label>
                        <input type="text" class="form-control" name="Breed" id="Breed" placeholder="Breed" value="<?php print_r($snapshot->data()['Breed']) ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Sex</label>
                        <input type="text" class="form-control" name="Sex" id="Sex" placeholder="Sex" value="<?php print_r($snapshot->data()['Sex']) ?>" >
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Color</label>
                        <input type="text" class="form-control" name="Color" id="Color" placeholder="Color" value="<?php print_r($snapshot->data()['Color']) ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Eye Color</label>
                        <input type="text" class="form-control" name="Eye" id="Eye" placeholder="Eye Color" value="<?php print_r($snapshot->data()['Eye']) ?>" >
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Weight</label>
                        <input type="text" class="form-control" name="Weight" id="Weight" placeholder="Weight in kg" value="<?php print_r($snapshot->data()['Weight']) ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Birthdate</label>
                        <input type="date" class="form-control" name="Birthdate" id="Birthdate" placeholder="Birthdate" value="<?php print_r($snapshot->data()['Birthdate']) ?>" >
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Pet Age</label>
                        <input type="text" class="form-control" name="Age" id="Age" placeholder="Age" value="<?php print_r($snapshot->data()['Age']) ?>" >
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Pet Description:</label>
                        <textarea rows="4" cols="80" class="form-control" name="Description" id="Description" placeholder="Additional Pet Info" ><?php print_r($snapshot->data()['Description']) ?></textarea>
                      </div>
                    </div>
                  </div>
                  <button class="btn1 btn-info" id="vieweditpet" name="vieweditpet" value="" class="login100-form-btn" button type="submit" >
							Edit Pet
						</button>
                </form>
                
            
              </div>
            </div>
          </div>


        </div>
      </div>


    </div>
  </div>

  
<script type="module">

var col = "<?php echo $num; ?>";
sessionStorage.setItem ("Col",col);
var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);

var pet = "<?php echo $petid ; ?>";  
sessionStorage.setItem("Petid",pet); 

console.log(docu,col);

</script>

<script>
function preview(){
  display3.src=URL.createObjectURL(event.target.files[0]);
}


</script>

 <!-- Modal -->
 <div class="modal fade" id="myModalpt" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Delete this Pet?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btnn btn-danger" id="deletepet">Yes</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalpet" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Successfully deleted this pet!</p>
        </div>
        <div class="modal-footer">
        <?php
 if(isset($_SESSION['user_id']))
 {
   
  print_r("<button type='button' class='btn btn-default' 
   onClick='location.href='listofpets.php' >Continue</button>
   ");}
 else if(isset($_GET['userid']))
 {
   print_r("<button type='button' class='btn btn-default' 
   onClick='location.href='listofpets.php?usertype=".$num."&userid=".$userid22."' >Continue</button>
   "); 
 }
          ?>
          </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->

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

