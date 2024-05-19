<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <!--Stylesheet-->
   
</head>
<body>
    
    <div class="background">
   
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="login.php" method="POST"> 
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        include "database.php";
    
        $sql = "SELECT * FROM userinfodata WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
        if($user){
            // Compare passwords directly
            if($password == $user["password"]) {
                header("Location: welcome.php");
                exit();
            } else {
                echo '<div style="background-color: #C83F49; color: #990000; padding: 10px; border-radius: 4px;z-index:2;">Wrong Password!</div>';
            }
        } else {
            echo '<div style="background-color: #C83F49; color: #990000; padding: 10px; border-radius: 4px">Email does not exist!</div>';
        }
    }
    ?>

    <h3>Login Here</h3>

        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="username" name="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <p>
            <input type="submit" id="submit" value="Login">
         </p>
        <footer class="login-footer">
     <p>Don't have an account? <a href="registration.php">SignUp</a></p>
    </footer>
    </form>
</body>
</html>
