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
  .olderbtn2{
        border-radius: 10px; 
        border:none; 
        color:gray;     
  }
        
        
        .container2 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 5px 0;
}.scroll2 {
    max-height: 440px;
    overflow-y: auto;
    margin-top: 5px;
    display:flex;
    flex-direction: column-reverse;
}
        </style>

</head>

<body class="" >

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
            <a class="navbar-brand" href="#pablo">Inquiries</a>
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
          
          <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="height: 30px;">
                <h5 class="title">Messages: <?php echo $_GET['name']; ?> </h5>
              </div>
              <div class="card-body"  style="height: 30rem;">

<?php

                  
if (empty($_SESSION['user_id']))
{
    header("Location:index.php?sessionfalse");
    die();
}

    $iduser = $_GET['mobileid'];
    $_SESSION['receiver']=$_GET['emailid']; // set session when click store id of the person to message
    $receiver = $_SESSION['receiver']; 

            
?>
             <script type="module" src="message6.js"></script>  
                
                        <div style="  text-align:center;">
                            <button class="olderbtn2 " id="oldermessage">see older messages</button>
                        </div>
                    <div id="chatbox" class="scroll2">
                        <?php
                       
                         $demo = array("demo1"=>"1","demo2"=>"2","demo3"=>"3","demo4"=>"4","demo5"=>"5","demo6"=>"6");
                         $divid = array();
                         $count = 0;
                         
                        $display= "display";
                      foreach ($demo as $msg => $date) {  // put display none to hide each array div id that has no value 
                        $divid[] = $msg.$date;
                        $imgid[] = $display.$count;
                        echo'
                        
                        <div id = '.$divid[$count].' class="container2" style =" position: relative; display:none;"> 
                        <img id='.$imgid[$count].' style="width:50px; height:50px; " class="avatar border-gray" src="../assets/img/default-avatar.png" onerror="this.src="../assets/img/default-avatar.png";">
                 
                        <p id='.$msg.' style="margin-top:15px; "></p>
                          <span id='.$date.' style=" position:absolute; bottom: 0; font-size: 10px; color:gray;"></span>
                        </div>';
                        $count++;
                      }
                        ?>
                </div>
            </div>
            <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  -->     
  
            
              <div class="card-footer" >
              <form action="" id="messageform" name="messageform">
                <div class="row">
                  <div class="col-md-1 pr-1" style = "margin-right:10px;">
                    <input style="border-radius: 55rem;" name="submitmsg" class="btn1 btn-info" type="submit" id="submitmsg" >
                  </div>
                  <div class="col-md-10 pr-1">            
                    <input style="margin-top:12px;" name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Create A Message" required>
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

  
<script type="module">

var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);


var docu2 = "<?php echo $receiver; ?>";
sessionStorage.setItem("Receiver",docu2);
</script>



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
