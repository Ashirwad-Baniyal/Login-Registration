
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="outer-box">
<div class="inner-box">
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      include 'database.php';
      $fullname =$_POST["fullname"];
      $email =$_POST["email"];
      $password =$_POST["password"];
      $cpassword =$_POST["cpassword"];
      $error ="";
      $sql ="SELECT * FROM userinfodata Where email='$email'";
      $res=mysqli_query($con,$sql);
      $rowCount = mysqli_num_rows($res);
      if($rowCount>0){
        echo '<div style="background-color: #dc3545; color: white; padding: 10px; border-radius:4px">
        Email Already Exists!
    </div>';
      }
      elseif($password != $cpassword){
        echo '<div style="background-color: #dc3545; color: white; padding: 10px; border-radius:4px">
        Password does not match
    </div>';
         } 
    else{
      $query="insert into userinfodata (fullname,email,password) values ('$fullname','$email','$password')";
      $result=mysqli_query($con,$query);
      if($result){
        echo '<div style="background-color:#5cb85c; color: white; padding: 10px; border-radius:4px">
        Successfully Login
    </div>';}
      else{
        die("Something went wrong");
      }
    }
  }
  
?> 
    <header class="signup-header">
  <h1>Signup</h1>
  <p>It just take 30 seconds</p>
    </header>
    <main class="signup-body">
        <form action="registration.php" method="POST">
         <p>
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="fullname" placeholder="Enter your Name" required>
          </p>
          <p>
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" name="email" placeholder="Enter your Email "required>  
          </p>
          <p>
         <label for="password">Your Password</label>
          <input type="password" name="password" id="password" name="password" placeholder="Enter your password">
          </p><p>
            <label for="cpassword">Confirm Your Password</label>
            <input type="password" name="cpassword" id="cpassword" name= "cpassword" placeholder="Confirm your password">
          </p>
         <p>
            <input type="submit" id="submit" value="Create Accout">
         </p>
        </form>
    </main>
    <footer class="signup-footer">
     <p>Already have an account? <a href="login.php">Login</a></p>
    </footer>
</div>
   <div class="circle c1"></div>
   <div class="circle c2"></div>

    </div>
</body>
</html>