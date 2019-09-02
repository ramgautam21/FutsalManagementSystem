<?php 

$accept_conn =mysqli_connect('localhost','root','','fms');
		
$id=$_GET['id'];


 
    $reg_sql="SELECT * FROM `registration` WHERE id='$id';";
	$result=mysqli_query($accept_conn,$reg_sql);

	if(mysqli_num_rows($result)>0){

    while($rows=mysqli_fetch_assoc($result)){
    
    	
				$name = $rows['name'];
				$address = $rows['address'];
				$email = $rows['email'];
				$mobile = $rows['mobile'];
				$password = $rows['password'];
				

				$insert_sql = "INSERT INTO `registered_user` (`id`, `name`, `address`, `email`, `mobile`, `password`) VALUES (NULL, '$name', '$address', '$email', '$mobile', '$password')";
				if($accept_conn->query($insert_sql)===TRUE){
			
			$sql_delt="DELETE from `registration` where id='$id'";
            mysqli_query($accept_conn,$sql_delt);

                
			    $msg = "Dear ".$name.", Your registration has been Successfull. Now you can Login your Account. Thank you.\nYou can Login by Using: \nEmail: ".$email."\nPassword: ".$password;

			    $recipient = $email;
			    $subject = "Registration Successfull";
			    $mailheaders = "Sunway Futsal\n";
			    
			    mail($recipient,$subject,$msg,$mailheaders);




			header("location:admin_home.php");



		}
		else{
			"<script type='text/javascript'>alert('Registration errors.')</script>";
		}
			}
		}
				

 ?>