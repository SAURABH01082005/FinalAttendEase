<form action="" method="post">
    <input type="text" name="student_name" placeholder="Student Name" required >
    <input type="submit" value="Add student" name="submit">
</form>


<?php
if(isset($_POST['submit'])){
    require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';

    $student_name=$_POST['student_name'];

    $sql="INSERT INTO roughphp(`student_name`) VALUE ('$student_name')";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
   
    echo "Student have added successfully!";
}

?>