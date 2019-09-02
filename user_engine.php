<?php 

session_start();

$name ='';
$address = '';
$number = '';
$username='';
$email='';
$password1='';
$password2='';
$password='';
$sql='';
$result= '';
$time_from='';
$time_to='';
$date='';
$message = '';
$count = 0;
$email_count = 0;
$email_count1 = 0;

$conn = new mysqli("localhost","root","","fms");

if ($conn->connect_error) {
	echo "Error Coonecting Database....";
}

if (isset($_POST['register_btn'])) {
	user_registration();
}
if (isset($_POST['go_back'])) {
	header("location:userlogin.php");
}

if (isset($_POST['user_login_btn'])) {
	user_login();
}
if (isset($_POST['user_logout'])) {
	unset($_SESSION['logged_id']);
	session_destroy();
	header('location:user_login.php');
}
if (isset($_POST['booking_btn'])) {
	Make_Booking();
}
if (isset($_POST['reset_btn'])) {
    reset_password();
}
if (isset($_POST['cancel_btn'])) {
  header('location:user_login.php');
}
if (isset($_POST['update_btn'])) {
   update_profile();
}




function user_registration(){

	global $conn ,$name,$address,$number,$username,$email,$email_count,$email_count1;

    $name = validate($_POST['name']);
    $address = validate($_POST['address']);
    $email = validate($_POST['email']);
    $number = $_POST['number'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

   $reg_email = "SELECT * FROM `registered_user`" ;

	$result=mysqli_query($conn,$reg_email);


	if(mysqli_num_rows($result)>=0){
	 
	 while($rows=mysqli_fetch_assoc($result)){
            
		$registered_email = $rows['email'];

		if ($registered_email == $email) {
			$email_count++;
		}
	}
}

$reg_email2 = "SELECT * FROM `registration`" ;

	$result1=mysqli_query($conn,$reg_email2);


	if(mysqli_num_rows($result1)>=0){
	 
	 while($rows=mysqli_fetch_assoc($result1)){
            
		$registered_email1 = $rows['email'];

		if ($registered_email1 == $email) {
			$email_count1++;
		}
	}
}


if($email_count1 <=0){

if($email_count<=0){   

    if($password1 != $password2){
		echo "<script type='text/javascript'>alert('Password doesn't match!')</script>";
	}
	else{
		$password = md5($password1);

		$sql = "INSERT INTO `registration` (`id`, `name`, `address`, `email`, `mobile`, `password`) VALUES (NULL, '$name', '$address', '$email', '$number', '$password');";
		if($conn->query($sql)===TRUE){
			echo "<script type='text/javascript'>alert('Registration request send. Please wait for admin response. Thank You!!!')</script>";

		}
		else{
			echo "<script type='text/javascript'>alert('Registration request Faild.')</script>";
		}
		
	
	}   
}
else{
    echo "<script type='text/javascript'>alert('Existing User found with this Email. Thank You.')</script>";;
}
}
else{
    echo "<script type='text/javascript'>alert('Registration request has pending with this Email.Please wait for Admin response. Thank You.')</script>";;
}
}

function user_login(){
	global $sql,$email,$password,$conn,$result;

	$email = validate($_POST['email']);
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM registered_user where email='$email' AND password='$password' LIMIT 1";
    
	$result = $conn->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user = $data['email'];
			$_SESSION['email']=$logged_user;
			$_SESSION['name']=$data['name'];
			$_SESSION['logged_id']=$data['id'];
			header('location:user_home.php');

		}
		else{
			echo "<script type='text/javascript'>alert('Invalid Username or Password')</script>";
		}
}

function Make_Booking(){

  global $count,$conn;

	$input_time_from = $_POST['time_from'];
	$input_time_to = $_POST['time_to'];
	$input_date = $_POST['date'];
	$message = $_POST['message'];
	$today_date = date('Y-m-d');
	$log_id = $_SESSION['logged_id'];

	if ($input_time_from < $input_time_to) {
		
	if($today_date <= $input_date){

	$fetch_sql = "SELECT * FROM `booking`" ;

	$result=mysqli_query($conn,$fetch_sql);


	if(mysqli_num_rows($result)>=0){
	 
	 while($rows=mysqli_fetch_assoc($result)){
            
		$db_time_form =  $rows['time_from'];
		$db_time_to = $rows['time_to'];
		$db_date = $rows['date'];
  
 
        if (($input_time_from == $db_time_form || $input_time_to == $db_time_to) && $input_date == $db_date) {
            // echo "Time already Booked.1 ".$db_time_form." ".$db_time_to;
            echo "<script type='text/javascript'>alert('Time already booked.')</script>";
            $count++;
            // exit();	
        }
        elseif(($input_time_from < $db_time_form && $input_time_to > $db_time_form) && $input_date == $db_date){
            // echo "Time is already booked.2 ".$db_time_form." ".$db_time_to;
            echo "<script type='text/javascript'>alert('Time already booked.')</script>";
            $count++;
            // exit();
        }
        elseif(($input_time_to < $db_time_to && $input_time_to > $db_time_form) && $input_date == $db_date){
            // echo "Time is already booked.3 ".$db_time_form." ".$db_time_to;
            echo "<script type='text/javascript'>alert('Time already booked.')</script>";
            $count++;
            // exit();
        }
        elseif (($input_time_from < $db_time_form && $db_time_to < $input_time_to) && $input_date == $db_date) {
        	// echo "Time is already booked.4 ".$db_time_form." ".$db_time_to;
        	echo "<script type='text/javascript'>alert('Time already booked.')</script>";
        	$count++;
        	// exit();
        }
        elseif (($input_time_from < $db_time_to && $db_time_to < $input_time_to) && $input_date == $db_date) {
        	//echo "Time is already booked.5 ".$db_time_form." ".$db_time_to;
        	echo "<script type='text/javascript'>alert('Time already booked.')</script>";
        	$count++;
        	// exit();

        }
    }
    
        if ($count<1) {

   		   $insert_sql = "INSERT INTO `booking` (`id`, `time_from`, `time_to` , `date`, `message`, `userid`) VALUES (NULL, '$input_time_from', '$input_time_to' , '$input_date', '$message', '$log_id')";

	  			 if($conn->query($insert_sql)===TRUE){
   	        			echo "<script type='text/javascript'>alert('Booking Successfull.')</script>";
	    			}
	    			else
		  				 echo "<script type='text/javascript'>alert('Booking Error.')</script>";

        }
        
    
   }

}
  else{
	echo "<script type='text/javascript'>alert('Outdated Booking Attemped.')</script>";
   }
}
   else{
   	echo "<script type='text/javascript'>alert('Invalid Input.')</script>";
   }
}

function reset_password(){

	global $conn;

	$email = $_POST['email'];

    $sql = "SELECT * FROM registered_user where email='$email'";
    
    $result=mysqli_query($conn,$sql);

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

function update_profile(){
	global $conn;

	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['mobile'];
	$password = $_POST['password'];
	$encryp_password = md5($password);
	$id = $_SESSION['logged_id'];

	$sql = "UPDATE registered_user SET name='$name', address = '$address',
	 password = '$encryp_password', mobile = '$contact' WHERE id='$id'";

	if($conn->query($sql)===TRUE){
   	    echo "<script type='text/javascript'>alert('Update Successfull.')</script>";			
	  }
	  else{
	  	echo "<script type='text/javascript'>alert('Error')</script>";
	  }

}


function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

 ?>