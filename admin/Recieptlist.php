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
         .btnn{
          font-size:13px;
          cursor:pointer;
  padding: 10px 16px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;
        }
        </style>
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
                  echo '
                  <a class="navbar-brand" href="#pablo">My Subscription Receipts</a>';

                ?>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      
<?php

    
    $table = $db->collection($_GET['usertype'])->document($_GET['userid'])->collection('subscriptionlist');
  
      $query = $table->orderBy('currentdate','DESC');
      $snapshot = $query->documents();
    

    $role=1;
    $num_rows=1;
    if($role==1)
    {

    if ($num_rows > 0) {

      echo
        "   <div>
                        <th >Subscription ID</th>
                        <th >Status</th>
                        <th >Payment Adress</th>
                        <th >Document ID</th>
                        <th >Date</th>
                        <th class='text-right'> Options </th>
                       
                        
                </thead> ";
        foreach ($snapshot as $document) {

          
          if ($document->exists()) 
          {
            $userwebinfoid = $document->data()['username'];
            $documentid = $document->id();
            print_r("
                <tbody>
                <tr>
                <td>
                ".$document->data()['subscriberID']."
                </td>
                <td>
                ".$document->data()['status']."
                </td>
                <td>
                ".$document->data()['payment_email_address']." 
                </td>
                <td>
                ".$document->id()." 
                </td>
                <td>
                ".$document->data()['currentdate']."
                </td>
                <td class='text-right'>
                <a class='btn btn-success' href='./subreciept.php?userwebinfoid=".$userwebinfoid."&subdocid=".$document->id()."&&checkuser=".$_GET['usertype']."'>View</a>
                
                ");
                
          
            print_r("
                </tr>
              </tbody> ");
                
            //$lastusername = $document->data()['username'];       
      }  else {
        printf('Empty' );
    }   
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


    <!-- Modal -->
    <div class="modal fade" id="myModalreciept" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Delete this eciept?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btnn btn-danger" id="deletereciept">Yes</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalreciept2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Successfully deleted the receipt!</p>
        </div>
        <div class="modal-footer">
        <button type='button' class='btn btn-default'
  onClick='location.href="sublist.php"'>Dismiss</button>

           </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->


  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script type="module" src="deletedocs1.js"></script>
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

<script  type="text/javascript">
function setvar(val){
var col = "<?php echo $_SESSION['checkuser']; ?>";
sessionStorage.setItem ("Col",col);
var docu = "<?php echo $_SESSION['user_id']; ?>";
sessionStorage.setItem("Docu",docu);

var documentid = val;  
sessionStorage.setItem("Documentid",documentid); }
</script>

<script type="text/javascript"> 
function showMyModalSetTitle(myTitle, myBodyHtml) {

/*
 * '#myModayTitle' and '#myModalBody' refer to the 'id' of the HTML tags in
 * the modal HTML code that hold the title and body respectively. These id's
 * can be named anything, just make sure they are added as necessary.
 *
 */

$('#myModalTitle').html(myTitle);
$('#myModalBody').html(myBodyHtml);

$('#myModal').modal('show');
}</script>
