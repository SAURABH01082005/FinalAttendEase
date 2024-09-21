<!-- //js script add karni hai alert ki -->
<!-- //js script add karni hai alert ki -->

<!-- //js script add karni hai alert ki -->

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
    $showAlert=true;
    $name=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `Faculty_login` WHERE `faculty_name`='$name' AND `password`='$password'";
    $result=mysqli_query($conn,$sql);
    // echo var_dump($result);
    $num= mysqli_num_rows($result);
   if($num)
  {
//    header("location: /Attendencemain/AttendEase.html");
    //  header("Location: " . $_SERVER['HTTP_REFERER']);
    header("location: faculty_front.php");
   $showAlert=false;
  }
    
   else{
       //    header("location: signin.php");
       ?>
<script>
    alert("Invalid Credential!");
</script>
<?php

   }

session_start();
$_SESSION['username']=$name;
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login - Attendance Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style_signin6.css">

</head>

<body>
    <header>
        <h1>AttendEase</h1>
    </header>

    <div id="mySidenav" class="sidenav">
  <a href="https://localhost/miniprojectattendenceSem3/Attendencemain/AttendEase.html" id="about">Home</a>
  <!-- <a href="faculty_front.php" id="blog">Persona</a> -->
  <!-- <a href="#" id="projects">see</a>
  <a href="#" id="contact">Contact</a> -->
</div>
    <main>
    <h1 class="secondhead">Faculty Login</h1>
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