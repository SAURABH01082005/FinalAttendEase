<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="addstudent.css">
    <title>Add student</title>
</head>
<body>
         <header>
        <h1>AttendEase</h1>
        </header>


        <div id="mySidenav" class="sidenav">
  <a href="https://localhost/miniprojectattendenceSem3/Attendencemain/AttendEase.html" id="about">Home</a>
  <a href="HOD_front.php" id="blog">Persona </a>
  <!-- <a href="#" id="projects">see</a>
  <a href="#" id="contact">Contact</a> -->
</div>
        <main>
            <h1 class="secondhead">Add Student</h1>
            <div class="container">
        <form  action="" method="post">
            <div class="form-group">
                <label for="name" >Student Name:</label>
                <input type="text" id="name" name="student_name" required>
            </div>
            <div class="form-group">
                <label for="name" >Student ID :</label>
                <input type="text" name="student_id" id="student_name">
            </div>
            
            
            <button type="submit" id="submit" name="submit">Create</button>
        </form>
        </div>

        

      </main>



      <?php
if(isset($_POST['submit'])){
    require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';

    //  $student_name=$_POST['student_name'];
     $student_name=$_POST['student_name'];
    $student_id=$_POST['student_id'];
   

    $sql="INSERT INTO student_info(`student_name`,`student_id`) VALUE ('$student_name','$student_id')";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
   
    // echo "Student have added successfully!";
    ?>
    <script>
        alert("Student have added successfully!")
    </script>
    <?php
}

?>
    
</body>
</html>