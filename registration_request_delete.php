<?php 


$delete_conn =mysqli_connect('localhost','root','','fms');
		
$id=$_GET['id'];



$sql="DELETE from `registration` where id='$id'";
//$query=mysqli_query($delete_conn,$sql);
if($delete_conn->query($sql)===TRUE){
	

	  $msg = "Dear ".$name.", Your registration has been Faild. Please contact us for query.\n\nContact Number:\nRam Gautam: 9863835671\n\nThank You!!!";

			    $recipient = $email;
			    $subject = "Registration Successfull";
			    $mailheaders = "Sunway Futsal\n";
			    
			    mail($recipient,$subject,$msg,$mailheaders);

			    header("location:admin_home.php");
}
else{
	echo"error";
}

 ?>