<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
<link href="css1.css" rel="stylesheet" />
<!--===============================================================================================-->
</head>


<body>

	<div class="container-login100" style="background-image: url('https://images.pexels.com/photos/7516509/pexels-photo-7516509.jpeg?auto=compress&cs=tinysrgb&w=600');">

		<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login / Sign-Up 
                    <br/><br/>
                    <p class="hint-text">Welcome to petik website!</p>
				</span>
                
			<form action="login.php" method="post" class="login100-form validate-form p-b-33 p-t-5">
                
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="text" placeholder="Username" required>
					<span class="focus-input100" data-placeholder="&#xe82a;"></span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="pass" placeholder="Password" required>
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>

				<div class="container-login100-form-btn m-t-32">
					<button class="login100-form-btn" button type="submit">
						Login
					</button>  
				</div>			
			</form>          
		</div>
	</div>
</body>
</html>
