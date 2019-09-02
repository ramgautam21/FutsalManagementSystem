<?php include('user_engine.php');?>
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

.login_logo{
 /* position: absolute;*/
  top:0%;
  left: 22%;
}
.login_logo > img {
  width: 100%;
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
  /*content: "";
  clear: both;*/
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
  <div style="width: 100%;height: 8vh;background-color: green;"></div>
<div class="login_logo">
   <img src="images/Sunway_Futsal.png">
</div>
<div style="width: 100%;height: 9vh;background-color: green;"></div>
<div class="tab">
  <button class="tablinks" onclick="futsalFunction(event, 'Make Booking')" id="defaultOpen">MAKE BOOKING</button>
  <button class="tablinks" onclick="futsalFunction(event, 'View Booking')">BOOKING LIST</button>
  <button class="tablinks" onclick="futsalFunction(event, 'View Your Booking')">YOUR BOOKING LIST</button>
  <br><br><br><br><br><br><br><br><br><br>
  <label style="color: white;font-size: 17px;text-transform: uppercase;padding: 22px;"><?php echo $_SESSION['name'];?></label><br>
  <?php  $date = date('d/m/Y');?>
  <label style="color: white;font-size: 17px;padding: 22px;"><?php echo $date;  ?></label><br>
  <label style="color: white;font-size: 17px;padding: 22px;">USER</label>
  <br><br><br><br>
  <button class="tablinks" onclick="futsalFunction(event, 'Update Account')">UPDATE ACCOUNT</button><br>
  <form method="POST" action="user_home.php">
   <input type="submit" id="btn" name="user_logout" value="LOG OUT"></input>
   </form>
</div>
<!-- ================================================================== -->
<div id="Make Booking" class="tabcontent">
  <form action="user_home.php" method="POST" style="border:1px solid #ccc;">
  <div class="container">
    <h1 style="color: green;">Book Your Time</h1>
    <p style="color: green;">Please check booking-list.</p>
    <hr>

    <label><b>Date</b></label>
    <input type="date" name="date" required>

    <label><b>Time From</b></label>
    <select required name="time_from">
            <option></option>
            <option value="6">6 am</option>
            <option value="7">7 am</option>
            <option value="8">8 am</option>
            <option value="9">9 am</option>
            <option value="10">10 am</option>
            <option value="11">11 am</option>
            <option value="12">12 pm</option>
            <option value="13">1 pm</option>
            <option value="14">2 pm</option>
            <option value="15">3 pm</option>
            <option value="16">4 pm</option>
            <option value="17">5 pm</option>
            <option value="18">6 pm</option>
            <option value="19">7 pm</option>            
          </select>

    <label><b>Time To</b></label>
    <select required name="time_to">
            <option></option>
            <option value="7">7 am</option>
            <option value="8">8 am</option>
            <option value="9">9 am</option>
            <option value="10">10 am</option>
            <option value="11">11 am</option>
            <option value="12">12 pm</option>
            <option value="13">1 pm</option>
            <option value="14">2 pm</option>
            <option value="15">3 pm</option>
            <option value="16">4 pm</option>
            <option value="17">5 pm</option>
            <option value="18">6 pm</option>
            <option value="19">7 pm</option>
            <option value="20">8 pm</option>            
          </select>

          <label><b>Message</b></label><br>
          <textarea  style="height: 11vh; width: 100%;" name="message"></textarea><br>

    <div class="clearfix">
      <input id="btn" type="submit" name="booking_btn" style="width: 100%;" value="BOOK"></input>
    </div>
    <div id="g.msg">
       <p style="color: green;"></p>
    </div>
    <div id="r.msg">
       <p style="color: red;"></p>
    </div>
  </div>
</form>
</div>
<!-- ============================================================= -->
<div id="View Booking" class="tabcontent">
  <table>
    <div class="example">
      <center>
        <h1 style="color: green;">Booking List</h1>
      </center>
      <form method="POST" action="user_home.php">
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
  $result=mysqli_query($conn,$sql);

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
<div id="View Your Booking" class="tabcontent">
  <table>
    <div class="example">
      <center>
        <h1 style="color: green;">Your Booking List</h1>
        <label><b>If you want to <span style="color: blue;">Update</span> or <span style="color: blue;">Cancel</span> your booking please feel free to contact us.</b></label><br><br>
      <label style="color: green;"><b>Ram Gautam: 9863835671</b></label><br>
      <label style="color: green;"><b>Rajesh Neupane: 9822427686</b></label><br>
      <label style="color: green;"><b>Pradeep Neupane: 9861043707</b></label><br><br><br>

      <label style="color: red;"><b>You can only Update or Cancel booking before 3 hours of your booking time.</b></label>
      </center><br><br><br>
   </div>

  <?php 

    $value = $_SESSION['logged_id'];
    $sql="SELECT * from `booking` where userid = '$value';";
    
    $result=mysqli_query($conn,$sql);

    echo '<tr>';
       echo '<th>Booking Id</th>';
       echo '<th>Date</th>';
       echo '<th>Time</th>';
       echo '<th>Message</th>';
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

        echo '<td>'.$rows['message'];
      }
    }

    ?>
</table>
</div>
<!-- =================================================================== -->
<div id="Update Account" class="tabcontent">

<?php 

$update_conn = new mysqli('localhost','root','','fms');

  $user_id = $_SESSION['logged_id'];

  $sql="SELECT * FROM `registered_user` WHERE id ='$user_id'";
  $result=mysqli_query($update_conn,$sql);

  $row=mysqli_fetch_assoc($result);

 ?>


  <form action="user_home.php" method="POST">
  <div class="container">
    <h1 style="color: green;">Update Your Account</h1>
    <p style="color: green;">Please edit field to update your account.</p>
    <hr>
       <label><b>Name</b></label>
       <input type="text" name="name" value="<?php echo $row['name'] ?>" required>

       <label><b>Address</b></label>
       <input type="text" name="address" value="<?php echo $row['address'] ?>" required>

       <label><b>Contact No</b></label>
       <input type="text" name="mobile" value="<?php echo $row['mobile'] ?>" required>

       <label><b>New Password</b></label>
       <p style="color: red;">Must change password to update account.</p>
       <input type="password" name="password" required>

    <div class="clearfix">
      <input type="submit" id="btn" name="update_btn" style="width: 100%;" value="Update"></input>

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
