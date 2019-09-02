<?php include('user_engine.php'); ?>
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
.input[type=email]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

.input[type=email]:focus{
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
  padding: 16px;
  width: 40%;
  margin-left: 30%;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

  <div class="container">
    <h1>Forgotten Password?</h1>
    <p>Enter your registered email id. We will help you to find your account.</p>
    <hr>
    
    <form method="POST" action="forget_password.php">
       <label for="email"><b>Email</b></label>
        <input class="input" type="email" placeholder="Enter Email" name="email" required>
         <div class="clearfix">          
          <input style="background-color: green;" id="btn" type="submit" class="cancelbtn" name="reset_btn" value="Submit"></input>
         </div>
    </form>
    <form method="POST" action="forget_password.php">
      <div class="clearfix">          
          <input style="background-color: red;" id="btn" type="submit" class="cancelbtn" name="cancel_btn" value="Back"></input>
         </div>
        
    </form>

  </div>

</body>
</html>

