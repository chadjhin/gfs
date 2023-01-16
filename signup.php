<?php
 require_once 'firestore.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign-Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
<link href="css1.css" rel="stylesheet" />
<!--===============================================================================================-->
<link href="css/style.css" rel="stylesheet" type="text/css">     <!--style.css document-->
   <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->     <!--font-awesome-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <!--bootstrap-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--googleapis jquery-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!--font-awesome-->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>                          <!--bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>           <!--bootstrap-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>            <!--bootstrap-->
</head>
<style>
.flex-column { 
       max-width : 260px;
   }
           
.container {
            background: #f9f9f9;
        }
      
.img {
            margin: 5px;
        }

.logo img{
	 width:150px;
	 height:250px;
	margin-top:90px;
	margin-bottom:40px;
}
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
/*.button{
	display:  block;
	width: 115px;
	Height: 25px;
	background: blue;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	color: white;
	font-weight: bold;
	Line-Height:25px;
	
}*/
</style>
</head>


<body>

		<div class="container-login100" style="background-image: url('https://images.pexels.com/photos/7516509/pexels-photo-7516509.jpeg?auto=compress&cs=tinysrgb&w=600');">
        
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Please Sign-Up
				</span>
                
				<form id= "form1" action="signupuser.php" method="post" class="login100-form validate-form p-b-33 p-t-5">
                
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="txt" name="username" id="username" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="email"  id="email"  id="email" name="email" placeholder="Email" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password"  id="password" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, at least one special character and at least 8 or more characters" required>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Confirm Password" required>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

					<br/><h4 style="text-align:center; font-family:Times New Roman; color:#808080;">Sign-Up As:</h4 >
					<div class="container-login100-form-btn m-t-32">
						<button id="1" name="button1" value="petstore" class="login100-form-btn" button type="submit" >
							Pet store
						</button>
						<button id="2" name="button2" value="vetclinic" class="login100-form-btn" button type="submit">
							vet clinic
						</button>
					</div> <h4 style="text-align:center; font-family:Times New Roman; color:#808080;">Or</h4 >
								<a class="btn btn-info" style="border-radius:20px; margin-left:145px;" href="../gfs/userindex/index(orig).php">
								GO BACK
								</a>
					</div>
				</form>
			</div>
		</div>


<!-- Modal -->
<div class="modal fade" id="myModalpt" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
			
  <h2>Terms and Agreements</h2>
        </div>
        <div class="modal-body">
          <div class="panel-header panel-header-sm" >
      </div>
      <div class="content" >
        <div class="center" >
          
          <div class="center">
          <div class="card">
              <div class="card-header">

              </div>
              <div class="card-body">
              <div id="terms-container">
  <p>By using this website, you agree to the following terms and conditions:</p>
  <ul>
    <li>You are allowed to fill in your information and location of your store on the website, but you will need to subscribe in order to send documents to the admin for verification purposes.</li>
    <li>The subscription fee is non-refundable, and you will not be able to cancel your subscription or request a refund after subscribing.</li>
    <li>The verification process may take up to 5 business days to complete, and your store's location will not be displayed on the website until it has been verified by the admin.</li>
    <li>You are responsible for ensuring that the information you have provided is accurate and up-to-date, and for keeping your subscription active in order to maintain your presence on the website.</li>
    <li>The website reserves the right to remove or suspend any store's account from the website at any time, for any reason, at its sole discretion.</li>
    <li>The website is not responsible for any errors or omissions in the information provided by users, or for any disputes or problems that may arise between users.</li>
  </ul>
  <p>If you sign up, you agree to these terms and conditions and acknowledge that you have read and understood them.</p>



  <br/>

<br/>

              
                  
                
            
              </div>
            </div>
          </div>


        </div>
      </div>
        </div>
        <div class="modal-footer">
          
  <input type="checkbox" id="terms-checkbox" required> I have read and agree to the terms and conditions.
  <button type="button" id = "continue" class="btn btn-default" data-dismiss="modal">Continue</button>
         
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->


<script>

var yesButton = document.getElementById("continue");
var checkbox = document.getElementById("terms-checkbox");
yesButton.disabled = true;

checkbox.addEventListener("change", function() {
    yesButton.disabled = !this.checked;
});

</script>

<script type="module" src="showmodal.js"></script>
</body>
</html>
