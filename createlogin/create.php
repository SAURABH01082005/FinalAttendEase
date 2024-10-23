<!-- //js script add karni hai alert ki -->
<?php
$showAlert=false;
if($_SERVER['REQUEST_METHOD']== 'POST'){
   // $showAlert=true;
    require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
    $name=$_POST['name'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($password==$cpassword ){

        $sql="INSERT INTO `createlogin` (`srno`, `name`, `password`, `date`) VALUES (NULL, '$name', '$password',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
    }

}


?>

<!DOCTYPE html>
<html>

<head>
    <title>AttendEase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="create4.css">
</head>

<body>
    <header>
        <h1>AttendEase</h1>
    </header>
    <main>
        
        <h1 class="secondhead">Create logins</h1>
        <div class="container">
        <form id="attendance-form" action="" method="post">
            <div class="form-group">
                <label for="name" >Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="course">Password:</label>
                <input type="text" name="password" id="course"  required>
            </div>
            <div class="form-group">
                <label for="course">Confirm Password:</label>
                <input type="text" name="cpassword" id="course" required>
            </div>
            
            <button type="submit" id="submit">Create</button>
        </form>
        </div>

       
           
        </main>

        <?php  if($showAlert) 
          {  ?>
           <script>
        alert("Student have added successfully!")
    </script>
          <?php 
          }   ?>
   
</body>

</html>