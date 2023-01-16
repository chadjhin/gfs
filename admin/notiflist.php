<?php
session_start();
error_reporting(0);
$setid = $_GET['setid'];
$type=$_SESSION['usertype'];

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
  <link href="../assets/X-Notify-main/notiflist.css" rel="stylesheet" />
 

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
            <a class="navbar-brand" href="#pablo">Notification List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Choose User Type
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                
                </div>
              </div>
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
                <a class="dropdown-item" href="./about.php">About Us</a>
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

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <div class="wrapper">




<div class="notifications">

<?php


    $table = $db->collection($_SESSION['checkuser'])->document($_SESSION['user_id'])->collection('notifications');
  
    $query = $table->orderBy('currentdate','DESC');
    $snapshot = $query->documents();
  

    $iduser = $_SESSION['user_id'];

    $table222 = $db->collection('Petlover');
      $query222 = $table222->orderBy('Name');
      $snapshot222 = $query222->documents();


      foreach ($snapshot222 as $document) {
        $petloveremail = $document->data()['Email'];
        //echo  $petloveremail ;
        $table2 = $db->collection('Petlover')->document($petloveremail)->collection('appointments');
        $query2 = $table2->orderBy('date');
        $snapshot2 = $query2->documents();
        foreach ($snapshot2 as $document2) {
          $webid = $document2->data()['owner'];

          if ($document2->exists() && $webid==$iduser) {
            print_r(" 
            <div class='notifications__item'>
            <div class='notifications__item__content'>
              <span class='notifications__item__title'>".$document2->data()['date']."</span>
              <span class='notifications__item__message'>you have a new appointment</span>
            </div>
        
            <div>
              <div class='notifications__item__option archive js-option'>
                <i class='fas fa-folder'></i>
              </div>
              <div class='notifications__item__option delete js-option'>
                <i class='fas fa-trash'></i>
              </div>
            </div>
          </div>
          ");      
            

          }

        }

     }   

        foreach ($snapshot as $document) {

          
          if ($document->exists()) 
          {
            $documentid = $document->id();
            $userwebinfoid = $document->data()['username'];

    if($document->data()['status']=="ACTIVE")
    {
            print_r(" 
            <div class='notifications__item'>
            <div class='notifications__item__content'>
              <span class='notifications__item__title'>".$document->data()['currentdate']."</span>
              <span class='notifications__item__message'>you subscribed to a plan</span>
            </div>
        
            <div>
              <div class='notifications__item__option archive js-option'>
                <i class='fas fa-folder'></i>
              </div>
              <div class='notifications__item__option delete js-option'>
                <i class='fas fa-trash'></i>
              </div>
            </div>
          </div>
          ");      
          }
        else if($document->data()['status']!="ACTIVE")
        {
                print_r(" 
                <div class='notifications__item'>
                <div class='notifications__item__content'>
                  <span class='notifications__item__title'>".$document->data()['currentdate']."</span>
                  <span class='notifications__item__message'>you cancelled your subsctiription plans plan</span>
                </div>
            
                <div>
                  <div class='notifications__item__option archive js-option'>
                    <i class='fas fa-folder'></i>
                  </div>
                  <div class='notifications__item__option delete js-option'>
                    <i class='fas fa-trash'></i>
                  </div>
                </div>
              </div>
              ");      
              }
              
        }}
         
        echo "</div>" ;
    
    
    
  ?>
</div>
</div>

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
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>


<script type="module">

(function(){

/*
* Get all the buttons actions
*/
let optionBtns = document.querySelectorAll( '.js-option' );

for(var i = 0; i < optionBtns.length; i++ ) {

  /*
  * When click to a button
  */
  optionBtns[i].addEventListener( 'click', function ( e ){

    var notificationCard = this.parentNode.parentNode;
    var clickBtn = this;
    /*
    * Execute the delete or Archive animation
    */
    requestAnimationFrame( function(){ 

      archiveOrDelete( clickBtn, notificationCard );

      /*
      * Add transition
      * That smoothly remove the blank space
      * Leaves by the deleted notification card
      */
      window.setTimeout( function( ){
        requestAnimationFrame( function() {
          notificationCard.style.transition = 'all .4s ease';
          notificationCard.style.height = 0;
          notificationCard.style.margin = 0;
          notificationCard.style.padding = 0;
        });

        /*
        * Delete definitely the animation card
        */
        window.setTimeout( function( ){
          notificationCard.parentNode.removeChild( notificationCard );
        }, 1500 );
      }, 1500 );
    });
  })
}

/*
* Function that adds
* delete or archive class
* To a notification card
*/
var archiveOrDelete = function( clickBtn, notificationCard ){
  if( clickBtn.classList.contains( 'archive' ) ){
    notificationCard.classList.add( 'archive' );
  } else if( clickBtn.classList.contains( 'delete' ) ){
    notificationCard.classList.add( 'delete' );
  }
}

})()
</script>