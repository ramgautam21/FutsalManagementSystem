<?php include('user_engine.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Log In</title>
</head>
<body>
	<div class="login_logo">
		<img src="images/Sunway_Futsal.png">
	</div>
	<div class="login">
       <h1>Login</h1>
       <form method="POST" action="user_login.php">
		   <div class="textbox">
		   	  <i class="fas fa-user"></i>
		   	  <input type="text" name="email" placeholder="Email">
		   	</div>
	        <div class="textbox">

		   	  <i class="fas fa-lock"></i>
		   	  <input type="password" name="password" placeholder="Password">
		   	 </div>
		   	 <input class ="btn" type="submit" name="user_login_btn" value="Login"><br>

		   	 <a class="a1" href="forget_password.php">Forgot Password?</a><br><br>
		   	 Don't have an account?&nbsp<a href="user_registration.php">Create one</a>
	   	 </form>
	</div>

</body>
</html>