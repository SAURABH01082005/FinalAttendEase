<!-- //js script add karni hai alert ki -->

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
    $showAlert=true;
    $name=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `createlogin` WHERE `name`='$name' AND `password`='$password'";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
   if($num)
  {
   header("location: attendance.html");
   $showAlert=false;
  }
    
   else
   header("location: signin.php");

}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login - Attendance Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style_signin2.css">

</head>

<body>
    <header>
        <h1>AttendEase</h1>
    </header>
    <main>
    <h1 class="secondhead">Login</h1>
    <div class="container">
        <form id="login-form" action="" method="POST">
            <div class="form-group">
                <label for="username name">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password name">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
          <!-- <button type="submit" id="login">Login</button> -->
  
          <!-- <a href="" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login</a> -->
          <button type="submit" id="submit">Login</button>
        </form>
        <a href="" class="link">Forgot Password? </a><p></p>
        <a href="">Forgot Username?</a>
        </div>
    </main>
   
  
   <!-- <script src="script.js"></script> -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>