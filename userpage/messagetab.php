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
        .btn5 {
          
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

<body>
  
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
            <a class="navbar-brand" href="#pablo">Inquiry Chatbox</a> <br/><br/><br/>
            
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
                <a class="dropdown-item"  href="./terms.php">Terms and Agrrement</a>
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
                <h4 class="card-title">Pet Lovers Messages</h4> 
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      
<?php

    $iduser = $_SESSION['user_id'];
    $count=0;
    $count1=0;
    //echo $iduser;

  $table = $db->collection('Petlover');
  
     $query = $table->orderBy('Name');
    $snapshot = $query->documents();
   

        
        
        foreach ($snapshot as $document) {

          $emailref = $db->collection($_SESSION['usertype'])->document($iduser);
          $snapshotdoc2 = $emailref->snapshot();
            $webemail = $snapshotdoc2->data()['email'];

          $petloveremail = $document->data()['Email'];
          $subsRef = $db->collection('Petlover')->document($petloveremail)->collection('messages')->document($webemail);
          $snapshotdoc = $subsRef->snapshot();

          
      
       
          if ($snapshotdoc->exists() && $snapshotdoc->data()['statusweb']!="DELETED" ) {

            $data = array(
              'id' => $snapshotdoc->data()['id'],
              'reciever' => $snapshotdoc->data()['reciever']
          );
            $json = json_encode($data);
                  
                  print_r("
                <tbody>
                <tr>
                <td>
                ".$document->data()['Name']."
                </td>
                <td>
                (".$document->data()['Email'].")
                </td>
                <td class='text-right'>
                <a class='btn btn-success' href='./messagelist.php?mobileid=".$document->data()['Email']."&&emailid=".$webemail."&&name=".$document->data()['Name']."'>view message.</a>
                
                
                <button class='btn1 btn-danger' type='submit' data-toggle='modal' data-target='#myModalmsg'> 
							Delete
						</button>
                
                </td>
                </tr>
              </tbody> ");
                
              
          }
              //////////////////////////////////////////////////////
              //<button  class='btn5 btn-danger' type='submit' data-toggle='modal' data-target='#deletemessagemodal'>





              //$lastusername = $document->data()['username'];       
        }  
        echo "</div>" ;
    
        //$nextQuery = $table->orderBy('username')->startAfter([$lastusername]);
        //$snapshot = $nextQuery->documents();
    
    
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

  <script type="module">


</script>

  <!-- Modal -->
<div class="modal fade" id="myModalmsg" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Delete this Message?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btnn btn-danger" id="deletusereacc" onClick="location.href='deletemessage.php?buttondeletemessage=set&&mobileid=<?php echo $snapshotdoc->data()['id'] ;?>&&emailid=<?php echo $snapshotdoc->data()['receiver']; ?>&&name=<?php echo $document->data()['Name'] ; ?>'">Yes</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalmsg2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Successfully deleted this message!</p>
        </div>
        <div class="modal-footer"> 
          
          <button type="button" class="btn btn-default" onClick="location.href='messagetab.php'">Continue</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
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
