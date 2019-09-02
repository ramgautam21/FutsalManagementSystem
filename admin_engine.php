<?php 

session_start();

$email='';
$password ='';

$admin_conn = new mysqli('localhost','root','','fms');

if ($admin_conn->connect_error){
	echo "Error Connecting Database...";
}
if (isset($_POST['user_login_btn'])) {
	admin_login();
}
if (isset($_POST['admin_registration'])) {
	admin_registration();
}
if (isset($_POST['profile_update_btn'])) {
	Update_Account();
}
if (isset($_POST['admin_logout'])) {
	unset($_SESSION['admin_logged_id']);
	session_destroy();
	header('location:admin_login.php');
}
if (isset($_POST['reset_btn'])) {
    reset_password();
}
if (isset($_POST['cancel_btn'])) {
  header('location:admin_login.php');
}

function admin_login(){

	global $email,$admin_conn,$password;

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
    $enrycp_login_password = md5($password);


	$sql = "SELECT * FROM `admin_ragistration` where email='$email' AND password='$enrycp_login_password'";

    
	    $result = $admin_conn->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user_admin = $data['email'];
			$_SESSION['email']=$logged_user_admin;
			$_SESSION['adminname']=$data['name'];
			$_SESSION['admin_logged_id']=$data['id'];
			header('location:admin_home.php');

		}
		else{
			echo "<script type='text/javascript'>alert('Invalid Username or Password')</script>";
		}

}

function admin_registration(){

	global $admin_conn;

   $name = $_POST['name'];
   $address = $_POST['address'];
   $email = $_POST['email'];
   $mobile = $_POST['mobile'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $enrycp_password = md5($password);

   if($password == $cpassword){

	$reg_sql="SELECT * FROM `admin_ragistration`";
	$result=mysqli_query($admin_conn,$reg_sql);

	if(mysqli_num_rows($result)>0){

    while($rows=mysqli_fetch_assoc($result)){
    
	$db_email = $rows['email'];
	   if ($email != $db_email) {

	   	  $sql = "INSERT INTO `admin_ragistration` (`id`, `name`, `address`, `email`, `contact`, `password`) VALUES (NULL, '$name', '$address', '$email', '$mobile', '$enrycp_password');";
		if($admin_conn->query($sql)===TRUE){
			echo "<script type='text/javascript'>alert('Registration Sucessfull')</script>";

		}
					else{
						echo "<script type='text/javascript'>alert('Registration errors.')</script>";
					}
	   	
	   }
	   else{
	   	    echo "<script type='text/javascript'>alert('Exhisting user found.')</script>";
	   }			
	
	}
}
}
else{
	
    // echo "<script type='text/javascript'>alert('Password Doesn't match.')</script>";
    echo "<script type='text/javascript'>alert('Password doesn't match.)</script>";
    }			
}

function Update_Account(){
	global $admin_conn;

	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['mobile'];
	$password = $_POST['password'];
	$encryp_password = md5($password);
	$id = $_SESSION['admin_logged_id'];

	$sql = "UPDATE admin_ragistration SET name='$name', address = '$address',
	 password = '$encryp_password', contact = '$contact' WHERE id='$id'";

	if($admin_conn->query($sql)===TRUE){
   	    echo "<script type='text/javascript'>alert('Update Successfull.')</script>";			
	  }
	  else{
	  	echo "<script type='text/javascript'>alert('Error')</script>";
	  }
}

function reset_password(){

	global $admin_conn;

	$email = $_POST['email'];

    $sql = "SELECT * FROM admin_ragistration where email='$email'";
    
    $result=mysqli_query($admin_conn,$sql);

   if(mysqli_num_rows($result)>0){

    while($rows=mysqli_fetch_assoc($result)){
    
      
        $name=$rows['name'];
        $password=$rows['password'];

       $msg = "Dear ".$name.", You can use this password to re-login.\n\nPassword: ".$password."\n\nThank you.";

          $recipient = $email;
          $subject = "Resetting Your Password";
          $mailheaders = "Sunway Futsal\n";
          
          mail($recipient,$subject,$msg,$mailheaders);

          echo "<script type='text/javascript'>alert('Please Check your email to get your password.Thank you.')</script>";

    }
  }
    else{
      echo "<script type='text/javascript'>alert('Error Occurred.')</script>";
    }
}

function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}




 ?>