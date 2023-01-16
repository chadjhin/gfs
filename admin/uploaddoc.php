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


    $docRef = $db->collection( $_GET['checkuser'])->document($_GET['userwebinfoid'])->collection('documents')->document('docufiles');
    $snapshot = $docRef->snapshot();


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
        }.btnn{
          
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
            <a class="navbar-brand" href="#pablo">Verify Your Account</a>
            </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Documents of User, <?PHP printf($_GET['userwebinfoid'])?></a>
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
          
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
              <a class='btn btn-success float-right' style="margin-right:20px;" id='list' name='list' href='sendnotify.php?checkuser=<?php echo $_GET['checkuser'];?>&&userwebinfoid=<?php echo $_GET['userwebinfoid']; ?>&&approvebuttonid=approve'>Approve</a>
                <h5 class="title">Document Files :</h5>
              </div>
              <div class="card-body">
              
              <div class="row">
                    <div class="col-md-6 pr-1">
                    <form action="sendnotify.php?checkuser=<?php echo $_GET['checkuser']; ?>&&userwebinfoid=<?php echo $_GET['userwebinfoid']; ?>" method="post" id="myForm" name="docform">


<div class="image"  style="height: 13rem;">

<?php 
$document_data = $snapshot->data();
$content = $document_data['bc'];
$type = $document_data['bc'];
$src=$content;
// Use the <embed> tag to embed the document into the HTML page
//echo '<embed src="data:' . $type . '; base64,' . base64_encode($content) . '" width="200" height="200">';
?>
<iframe src="<?php echo $src; ?>" style="height: 13rem; width: 35rem;" ></iframe>


</div>
<div class="row">
<div class="col-md-11 pr-1" >
<a href="<?php print_r($snapshot->data()['bc']) ?>">
<label>BARANGAY CLEARANCE</label>
</a>
</div>
</div>
                    </div>

                    <div class="col-md-6 pr-1">
<div class="image"  style="height: 13rem;">

<?php 
$document_data = $snapshot->data();
$content = $document_data['bir'];
$type = $document_data['bir'];
$src=$content;
// Use the <embed> tag to embed the document into the HTML page
//echo '<embed src="data:' . $type . '; base64,' . base64_encode($content) . '" width="200" height="200">';
?>
<iframe src="<?php echo $src; ?>"style="height: 13rem; width: 35rem;"></iframe>
</div>
<div class="row">
<div class="col-md-11 pr-1" >
<a href="<?php print_r($snapshot->data()['bir']) ?> ">
<label>BIR REGISTRATION</label>
</a>
</div>
</div>
                    </div>
              </div><br/>
              <div class="row">
              <div class="col-md-6 pr-1">
<div class="image"  style="height: 13rem;">

<?php 
$document_data = $snapshot->data();
$content = $document_data['mbp'];
$type = $document_data['mbp'];
$src=$content;
// Use the <embed> tag to embed the document into the HTML page
//echo '<embed src="data:' . $type . '; base64,' . base64_encode($content) . '" width="200" height="200">';
?>
<iframe src="<?php echo $src; ?>"style="height: 13rem; width: 35rem;"></iframe>
</div>
<div class="row">
<div class="col-md-11 pr-1" >
<a href="<?php print_r($snapshot->data()['mbp']) ?>">
<label>MAYORS BUSSINESS PERMIT</label>
</a>
</div>
</div>
                    </div>
                    <div class="col-md-6 pr-1">
                    
<div class="image"  style="height: 13rem;">

<?php 
$document_data = $snapshot->data();
$content = $document_data['spa'];
$type = $document_data['spa'];
$src=$content;
// Use the <embed> tag to embed the document into the HTML page
//echo '<embed src="data:' . $type . '; base64,' . base64_encode($content) . '" width="200" height="200">';
?>
<iframe src="<?php echo $src; ?> " style="height: 13rem; width: 35rem;"></iframe>
</div>
<div class="row">
<div class="col-md-11 pr-1" >
<a href="<?php print_r($snapshot->data()['spa']) ?>">
<label>SPECIAL PERMIT</label>
</a>
</div>
</div>
                    </div>
              </div><br/>
              <div class="row">
              <div class="col-md-6 pr-1">
                     
<div class="image"  style="height: 13rem;">

<?php 
$document_data = $snapshot->data();
$content = $document_data['sss'];
$type = $document_data['sss'];
$src=$content;
// Use the <embed> tag to embed the document into the HTML page
//echo '<embed src="data:' . $type . '; base64,' . base64_encode($content) . '" width="200" height="200">';
?>
<iframe src="<?php echo $src; ?>"style="height: 13rem; width: 35rem;"></iframe>
</div>
<div class="row">
<div class="col-md-11 pr-1" >
<a href="<?php print_r($snapshot->data()['sss']) ?>">
<label>SSS REGISTRATION</label>
</a>
</div>
</div>
                    </div>
                    
              
                    <div class="col-md-6 pr-1">
                    <input type="text" style="width:560; height:190;" class="form-control" name="note" placeholder="Add Note" required>
                    <button class="btn btn-danger" style="float:right; margin-right:20px"  id="1" name="button1" button type="submit">
							Decline
						</button>
      </div>
              </div>
                 
                </form>

              </div>
            </div>
          </div>

          

          

        </div>
      </div>
      <?php include './footer.php';?>
    </div>
  </div>




  <!--   Core JS Files   -->
  <!--<script type="module" src="../uploadimg3.js"></script>-->
  <script type="module" src="../uploaddoc.js"></script>
  <script type="module" src="../docfiles.js"></script>
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

