<?php include('admin_engine.php');?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box}
body {
  font-family: "Lato", sans-serif;
  margin: 0;
  padding: 0;
}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #0e0829;
  width: 30%;
  height: 650px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: white;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: white;
  color: black;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 12px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 650px;
}

/*Make Booking table ==============================================================*/

input, select, textarea{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input:focus{
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
#btn {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

#btn:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 0px;
  width: 40%;
  margin-left: 30%;
  height: 600px;
}

/* Clear floats */
.clearfix::after {
  display: table;

}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

/*View Booking List====================================================================*/


* {
  box-sizing: border-box;
}

form.example input {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
/*=============================================================================*/


</style>
</head>
<body>
  
<div class="tab">
  <button class="tablinks" onclick="futsalFunction(event, 'Today Booking')" id="defaultOpen">TODAY's BOOKING LIST</button>
  <button class="tablinks" onclick="futsalFunction(event, 'View Booking')">BOOKING LIST</button>
  <button class="tablinks" onclick="futsalFunction(event, 'All Booking')">ALL BOOKING</button>
  <button class="tablinks" onclick="futsalFunction(event, 'Pending Registration')">PENDING REGISTRATION</button>
  <button class="tablinks" onclick="futsalFunction(event, 'Admin registration')">REGISTRATION</button>
  <br><br><br><br><br><br>
  <label style="color: white;font-size: 17px;text-transform: uppercase;padding: 22px;"><?php echo $_SESSION['adminname'];?></label><br>
  <?php  $date = date('d/m/Y');?>
  <label style="color: white;font-size: 17px;padding: 22px;"><?php echo $date;  ?></label><br>
  <label style="color: white;font-size: 17px;padding: 22px;">ADMIN</label>
  <br><br>
  <button class="tablinks" onclick="futsalFunction(event, 'Update Account')">UPDATE ACCOUNT</button><br>
  <form method="POST" action="admin_home.php">
   <input type="submit" id="btn" name="admin_logout" value="LOG OUT"></input>
   </form>
</div>
<!-- ================================================================== -->
<div id="Today Booking" class="tabcontent">
    <table>
      <center>
    <h1 style="color: green;">Today's Booking List</h1>
    </center>
  
    <?php 

   $booking_date = date('Y-m-d');

   echo '<tr>';
       echo '<th>Booking Id</th>';
       echo '<th>Date</th>';
       echo '<th>Time</th>';
       echo '<th></th>';
    echo '</tr>';
  $sql="SELECT * FROM `booking` WHERE date ='$booking_date';";
  $result=mysqli_query($admin_conn,$sql);

  if(mysqli_num_rows($result)>0){

    while($rows=mysqli_fetch_assoc($result)){
    
      echo '<tr style="background-color:#044640; color:yellow;" >';
        echo '<td>'.$rows['id'].'</td>';
        echo '<td>'.$rows['date'].'</td>';

        if ($rows['time_from']==6){
          $time_from ="6 am"; 
        }
        if ($rows['time_from']==7){
          $time_from ="7 am"; 
        }
        if ($rows['time_from']==8){
          $time_from ="8 am"; 
        }
        if ($rows['time_from']==9){
          $time_from ="9 am"; 
        }
        if ($rows['time_from']==10){
          $time_from ="10 am";  
        }
        if ($rows['time_from']==11){
          $time_from ="11 am";  
        }
        if ($rows['time_from']==12){
          $time_from ="12 pm";  
        }
        if ($rows['time_from']==13){
          $time_from ="1 pm"; 
        }
        if ($rows['time_from']==14){
          $time_from ="2 pm"; 
        }
        if ($rows['time_from']==15){
          $time_from ="3 pm"; 
        }
        if ($rows['time_from']==16){
          $time_from ="4 pm"; 
        }
        if ($rows['time_from']==17){
          $time_from  ="5 pm";  
        }
        if ($rows['time_from']==18){
          $time_from ="6 pm"; 
        }
        if ($rows['time_from']==19){
          $time_from ="7 pm"; 
        }


        if ($rows['time_to']==7){
          $time_to ="7 am"; 
        }
        if ($rows['time_to']==8){
          $time_to ="8 am"; 
        }
        if ($rows['time_to']==9){
          $time_to ="9 am"; 
        }
        if ($rows['time_to']==10){
          $time_to ="10 am";  
        }
        if ($rows['time_to']==11){
          $time_to ="11 am";  
        }
        if ($rows['time_to']==12){
          $time_to ="12 pm";  
        }
        if ($rows['time_to']==13){
          $time_to ="1 pm"; 
        }
        if ($rows['time_to']==14){
          $time_to ="2 pm"; 
        }
        if ($rows['time_to']==15){
          $time_to ="3 pm"; 
        }
        if ($rows['time_to']==16){
          $time_to ="4 pm"; 
        }
        if ($rows['time_to']==17){
          $time_to  ="5 pm";  
        }
        if ($rows['time_to']==18){
          $time_to ="6 pm"; 
        }
        if ($rows['time_to']==19){
          $time_to ="7 pm"; 
        }
        if ($rows['time_to']==20){
          $time_to ="8 pm"; 
        }

        echo '<td>'
        .$time_from.'<span style="color:red;"> to </span> '.
        $time_to.
        '</td>';

        echo '<td>
        <a style="color:red;"href="delete.php?id='.$rows['id'].'">Delete</a>
        </td>';
      }
    }
    
?>
</table> 
</div>
<!-- ============================================================= -->
<div id="View Booking" class="tabcontent">
  <table>
    <div class="example">
      <center>
        <h1 style="color: green;">Booking List</h1>
      </center>
      <form method="POST" action="admin_home.php">
          <label><b>Date</b></label><br>
          <input style="font-size: 20px;" type="date" name="booking_date">
          <input type="submit" id="btn" name="booking_submit_btn" value="Search"></input><br><br>
      </form>
   </div>

<?php 
    if (isset($_POST['booking_submit_btn'])) {


   $booking_date =$_POST['booking_date'];

   echo '<tr>';
       echo '<th>Booking Id</th>';
       echo '<th>Date</th>';
       echo '<th>Time</th>';
    echo '</tr>';

    $sql="SELECT * FROM `booking` WHERE date ='$booking_date';";
  $result=mysqli_query($admin_conn,$sql);

  if(mysqli_num_rows($result)>0){

    while($rows=mysqli_fetch_assoc($result)){
    
      echo '<tr style="background-color:#044640; color:yellow;" >';
        echo '<td>'.$rows['id'].'</td>';
        echo '<td>'.$rows['date'].'</td>';

        if ($rows['time_from']==6){
          $time_from ="6 am"; 
        }
        if ($rows['time_from']==7){
          $time_from ="7 am"; 
        }
        if ($rows['time_from']==8){
          $time_from ="8 am"; 
        }
        if ($rows['time_from']==9){
          $time_from ="9 am"; 
        }
        if ($rows['time_from']==10){
          $time_from ="10 am";  
        }
        if ($rows['time_from']==11){
          $time_from ="11 am";  
        }
        if ($rows['time_from']==12){
          $time_from ="12 pm";  
        }
        if ($rows['time_from']==13){
          $time_from ="1 pm"; 
        }
        if ($rows['time_from']==14){
          $time_from ="2 pm"; 
        }
        if ($rows['time_from']==15){
          $time_from ="3 pm"; 
        }
        if ($rows['time_from']==16){
          $time_from ="4 pm"; 
        }
        if ($rows['time_from']==17){
          $time_from  ="5 pm";  
        }
        if ($rows['time_from']==18){
          $time_from ="6 pm"; 
        }
        if ($rows['time_from']==19){
          $time_from ="7 pm"; 
        }


        if ($rows['time_to']==7){
          $time_to ="7 am"; 
        }
        if ($rows['time_to']==8){
          $time_to ="8 am"; 
        }
        if ($rows['time_to']==9){
          $time_to ="9 am"; 
        }
        if ($rows['time_to']==10){
          $time_to ="10 am";  
        }
        if ($rows['time_to']==11){
          $time_to ="11 am";  
        }
        if ($rows['time_to']==12){
          $time_to ="12 pm";  
        }
        if ($rows['time_to']==13){
          $time_to ="1 pm"; 
        }
        if ($rows['time_to']==14){
          $time_to ="2 pm"; 
        }
        if ($rows['time_to']==15){
          $time_to ="3 pm"; 
        }
        if ($rows['time_to']==16){
          $time_to ="4 pm"; 
        }
        if ($rows['time_to']==17){
          $time_to  ="5 pm";  
        }
        if ($rows['time_to']==18){
          $time_to ="6 pm"; 
        }
        if ($rows['time_to']==19){
          $time_to ="7 pm"; 
        }
        if ($rows['time_to']==20){
          $time_to ="8 pm"; 
        }

        echo '<td>'
        .$time_from.'<span style="color:red;"> to </span> '.
        $time_to.
        '</td>';
      }
    }
     
    
    }

?>

</table> 
</div>

<!-- ============================================================= -->
<div id="All Booking" class="tabcontent">
  <table>
    <div class="example">
      <center>
        <h1 style="color: green;">All Booking</h1>
        <p>You can <span style="color: red;">Delete</span> Old Booking from here.</p>
      </center>
   </div>

  <?php 
    $sql="SELECT * from `booking`;";
    
    $result=mysqli_query($admin_conn,$sql);

    echo '<tr>';
       echo '<th>Booking Id</th>';
       echo '<th>Date</th>';
       echo '<th>Time</th>';
       echo '<th>Message</th>';
       echo '<th></th>';
    echo '</tr>';

  if(mysqli_num_rows($result)>0)
    {
    while($rows=mysqli_fetch_assoc($result)){
    
      echo '<tr style="background-color:#044640; color:yellow;" >';
        echo '<td>'.$rows['id'].'</td>';
        echo '<td>'.$rows['date'].'</td>';

        if ($rows['time_from']==6){
          $time_from ="6 am"; 
        }
        if ($rows['time_from']==7){
          $time_from ="7 am"; 
        }
        if ($rows['time_from']==8){
          $time_from ="8 am"; 
        }
        if ($rows['time_from']==9){
          $time_from ="9 am"; 
        }
        if ($rows['time_from']==10){
          $time_from ="10 am";  
        }
        if ($rows['time_from']==11){
          $time_from ="11 am";  
        }
        if ($rows['time_from']==12){
          $time_from ="12 pm";  
        }
        if ($rows['time_from']==13){
          $time_from ="1 pm"; 
        }
        if ($rows['time_from']==14){
          $time_from ="2 pm"; 
        }
        if ($rows['time_from']==15){
          $time_from ="3 pm"; 
        }
        if ($rows['time_from']==16){
          $time_from ="4 pm"; 
        }
        if ($rows['time_from']==17){
          $time_from  ="5 pm";  
        }
        if ($rows['time_from']==18){
          $time_from ="6 pm"; 
        }
        if ($rows['time_from']==19){
          $time_from ="7 pm"; 
        }


        if ($rows['time_to']==7){
          $time_to ="7 am"; 
        }
        if ($rows['time_to']==8){
          $time_to ="8 am"; 
        }
        if ($rows['time_to']==9){
          $time_to ="9 am"; 
        }
        if ($rows['time_to']==10){
          $time_to ="10 am";  
        }
        if ($rows['time_to']==11){
          $time_to ="11 am";  
        }
        if ($rows['time_to']==12){
          $time_to ="12 pm";  
        }
        if ($rows['time_to']==13){
          $time_to ="1 pm"; 
        }
        if ($rows['time_to']==14){
          $time_to ="2 pm"; 
        }
        if ($rows['time_to']==15){
          $time_to ="3 pm"; 
        }
        if ($rows['time_to']==16){
          $time_to ="4 pm"; 
        }
        if ($rows['time_to']==17){
          $time_to  ="5 pm";  
        }
        if ($rows['time_to']==18){
          $time_to ="6 pm"; 
        }
        if ($rows['time_to']==19){
          $time_to ="7 pm"; 
        }
        if ($rows['time_to']==20){
          $time_to ="8 pm"; 
        }

        echo '<td>'
        .$time_from.'<span style="color:red;"> to </span> '.
        $time_to.
        '</td>';

        echo '<td>'.$rows['message'].'</td>';
        echo '<td>
        <a style="color:red;"href="delete.php?id='.$rows['id'].'">Delete</a>
        </td>';
      }
    }

    ?>

</table>
</div>
<!-- ==================================================================== -->

<div id="Pending Registration" class="tabcontent">
  <table>
    <div class="example">
      <center>
        <h1 style="color: green;">User Regestration Request</h1>
        <p>Please response-> <span style="color: green;">(Accept</span> / <span style="color: red;">Delete)</span></p>
      </center>
   </div>

  <?php 
    $sql="SELECT * from `registration`;";
    
    $result=mysqli_query($admin_conn,$sql);

    echo '<tr>';
       echo '<th>Name</th>';
       echo '<th>Address</th>';
       echo '<th>Email</th>';
       echo '<th>Mobile</th>';
       echo '<th></th>';
    echo '</tr>';

  if(mysqli_num_rows($result)>0)
    {
    while($rows=mysqli_fetch_assoc($result)){
    
      echo '<tr style="background-color:#044640; color:yellow;" >';
        echo '<td>'.$rows['name'].'</td>';
        echo '<td>'.$rows['address'].'</td>';
        echo '<td>'.$rows['email'].'</td>';
        echo '<td>'.$rows['mobile'].'</td>';
        echo '<td><a style="color:blue;" href="registration_request_accept.php?id='.$rows['id'].'">Accept</a> / <a style="color:red;"href="registration_request_delete.php?id='.$rows['id'].'">Delete</a></td>';
      }
    }

    ?>

</table>
</div>

<!-- =================================================================== -->

<div id="Admin registration" class="tabcontent">

  <form action="admin_home.php" method="POST">
  <div class="container">
    <h1 style="color: green;">Admin Registration</h1>
    <hr>
       <label><b>Name</b></label>
       <input type="text" name="name" required>

       <label><b>Address</b></label>
       <input type="text" name="address"required>

       <label><b>Email</b></label>
       <input type="email" name="email"required>

       <label><b>Contact No</b></label>
       <input type="text" name="mobile" required>

       <label><b>Password</b></label>
       <input type="password" name="password" required>

       <label><b>Confirm Password</b></label>
       <input type="password" name="cpassword" required>

    <div class="clearfix">
      <input type="submit" id="btn" name="admin_registration" style="width: 100%;" value="Register"></input>

    </div>
  </div>
</form>
</div>

<!-- =================================================================== -->
<div id="Update Account" class="tabcontent">

<?php 

  $admin_id = $_SESSION['admin_logged_id'];

  $sql="SELECT * FROM `admin_ragistration` WHERE id ='$admin_id'";
  $result=mysqli_query($admin_conn,$sql);

  $row=mysqli_fetch_assoc($result);

 ?>


  <form action="admin_home.php" method="POST">
  <div class="container">
    <h1 style="color: green;">Update Your Account</h1>
    <p style="color: green;">Please edit field to update your account.</p>
    <hr>
       <label><b>Name</b></label>
       <input type="text" name="name" value="<?php echo $row['name'] ?>" required>

       <label><b>Address</b></label>
       <input type="text" name="address" value="<?php echo $row['address'] ?>" required>

       <label><b>Contact No</b></label>
       <input type="text" name="mobile" value="<?php echo $row['contact'] ?>" required>

       <label><b>New Password</b></label>
       <p style="color: red;">Must change password to update account.</p>
       <input type="password" name="password" required>

    <div class="clearfix">
      <input type="submit" id="btn" name="profile_update_btn" style="width: 100%;" value="Update"></input>

    </div>
  </div>
</form>
</div>
<!-- ========================================================================= -->

<script>
function futsalFunction(evt, event) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(event).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
