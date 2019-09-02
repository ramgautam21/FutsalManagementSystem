<?php 


$delete_conn =mysqli_connect('localhost','root','','fms');
		
$id=$_GET['id'];

$sql="DELETE from `booking` where id='$id'";
$query=mysqli_query($delete_conn,$sql);
if($query){
	header("location:admin_home.php");
}
else{
	echo"error";
}

?>