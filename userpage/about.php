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
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>

  <style>
    * {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container-alien {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Four columns side by side */
.column {
  float: left;
  width: 25%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
/* Socials */
.fa {
  padding: 20px;
  font-size: 10px;
  width: 20px;
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

/* Form */
.form{
  width:290px;
  height:345px;
  background:#e6e6e6;
  border-radius:8px;
  box-shadow:0 0 40px -10px black;
  padding:60px 60px;
  max-width:calc(100vw - 40px);
  box-sizing:border-box;
  font-family:'Montserrat',sans-serif;
  position:relative}
form-input{
  width:100%;
  padding:10px;
  box-sizing:border-box;
  font-family:'Montserrat',sans-serif;
  transition:all .3s;
  border-bottom:2px solid #bebed2}
form-input:focus{
  border-bottom:2px solid #78788c}
form-p:before{
  content:attr(type);
  display:block;
  font-size:14px;
  color:#5a5a5a}
form-button{
  float:right;
  font-family:'Montserrat',sans-serif;
  border:2px solid #78788c;
  color:#5a5a6e;
  cursor:pointer;
  transition:all .3s}
form-button:hover{
  background:#78788c;
  color:#fff}

/* Glow Button */
.glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}
</style>
</head>

<body class="">
  
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
            <a class="navbar-brand" href="#pablo">About Us</a> <br/><br/><br/>
            
            <!--<a class='btn btn-info float-right' id='add' name='add' href="postservices.php">Add Service</a>-->
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
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title"> About Us</h4>
              </div>
              <div class="card-body">
                <p style="text-align:center; line-height:2.5;">
                PETik allows you to locate nearby pet stores and vet clinics. It's easy to view and inquire offered services that is suitable for your pets and can reserve appointments in your ideal clinic. PETik makes it easy to buy pet foods, toys, grooming supplies, or other items for your pet and can reserve products and pick them up in the physical store.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Our Team</h4>
              </div>
              <div class="card-body">
                <div class="container-alien">
                    <div class="mySlides">
                        <div class="numbertext">1 / 4</div>
                        <img src="../assets/img/osman.JPG" style="width:100%">
                        <h4>Osmand Hadjiamer S. Decampong</h2>
                        <p class="title">Hipster</p>
                        <a href="https://www.facebook.com/usman.decampong" class="fa fa-facebook"></a>
                        <a href="mailto:osmand.decampong@ctu.edu.ph" class="fa fa-google"></a>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 4</div>
                        <img src="../assets/img/rieame.jpg" style="width:100%">
                        <h4>Chandel Jyne C. Carabio</h2>
                        <p class="title">Hipster</p>
                        <a href="https://www.facebook.com/chadnel.jhin" class="fa fa-facebook"></a>
                        <a href="mailto:chandeljyne.carabio@ctu.edu.ph" class="fa fa-google"></a>
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 4</div>
                        <img src="../assets/img/alien.jpg" style="width:100%">
                        <h4>Lyca May R. Roslinda</h2>
                        <p class="title">Hipster</p>
                        <a href="https://www.facebook.com/lyca.may/" class="fa fa-facebook"></a>
                        <a href="mailto:lycamay.roslinda@ctu.edu.ph" class="fa fa-google"></a>
                    </div>
                        
                    <div class="mySlides">
                        <div class="numbertext">4 / 4</div>
                        <img src="../assets/img/chandel.jpg" style="width:100%">
                        <h4>Reiame D. Delfin</h2>
                        <p class="title">Hipster</p>
                        <a href="https://www.facebook.com/reiame.delfin" class="fa fa-facebook"></a>
                        <a href="mailto:reiame.delfin@ctu.edu.ph" class="fa fa-google"></a>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                    <div class="row">
                        <div class="column">
                        <img class="demo cursor" src="../assets/img/osman.JPG" style="width:100%" onclick="currentSlide(1)">
                        </div>
                        <div class="column">
                        <img class="demo cursor" src="../assets/img/rieame.jpg" style="width:100%" onclick="currentSlide(2)">
                        </div>
                        <div class="column">
                        <img class="demo cursor" src="../assets/img/alien.jpg" style="width:100%" onclick="currentSlide(3)">
                        </div>
                        <div class="column">
                        <img class="demo cursor" src="../assets/img/chandel.jpg" style="width:100%" onclick="currentSlide(4)">
                        </div>
                    </div>
                    <script>
                    let slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                    showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                    showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("demo");
                    let captionText = document.getElementById("caption");
                    if (n > slides.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                    captionText.innerHTML = dots[slideIndex-1].alt;
                    }
                    </script>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Contact Us</h4>
              </div>
              <div class="card-body">
                <form class="form" action="mailto:osmand.decampong@ctu.edu.ph">
                    <p class="form-p"  type="Name:">Name:<input class="form-input" placeholder="Write your name here.."></input></p>
                    <p class="form-p" type="Email:">Email:<input class="form-input"  placeholder="Let us know how to contact you back.."></input></p>
                    <p class="form-p" type="Message:">Message:<input class="form-input"  placeholder="What would you like to tell us.."></input></p>
                    <center>
                        <button class="form-button">Send Message</button>
                    </center>
                </form>
              </div>
            </div>
          </div>
        </div> 

        <div class="text-center">
            <div><br><br>
                <button class="glow-on-hover" type="button">GET STARTED!</button>
            </div>
        </div>
      </div>

      <?php include 'footer.php';?>

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
</body>

</html>