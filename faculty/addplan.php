<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="addplan.css">
    <title>Add module</title>
</head>
<body>
<header>
<h1>AttendEase</h1>
</header>

<div id="mySidenav" class="sidenav">
  <a href="https://localhost/miniprojectattendenceSem3/Attendencemain/AttendEase.html" id="about">Home</a>
  <a href="faculty_front.php" id="blog">Persona</a>
  <!-- <a href="#" id="projects">see</a>
  <a href="#" id="contact">Contact</a> -->
</div>

<main></main>
<div class="main2">
            <h1 class="secondhead_main2">Add Module</h1>
            <div class="container_main2">
        <form  action="" method="post">
            <div class="form-group">
                <label for="name" >Module Name:</label>
                <input type="text" id="module_name" name="module_name" required>
            </div>
            <div class="form-group">
                <label for="name" >Topic:</label>
                <input type="text" id="topic_name" name="topic_name" required>
            </div>
            <div class="form-group">
                <label for="name" >Date:</label>
                <input type="date" name="date" id="date" required>
            </div>
             <!-- --------------------------------------------------time is here -->
             <!-- <div class="form-group">
                <label for="name" >Time:</label>
                <input type="time" name="timing" id="date" required>
            </div> -->
            <div class="child2 form-group">Select Time </div><div class="dateboxchild">
                     <!-- Dropdown starts for time-->
                 
                 <div class="select_time"><select name="time" id="" class="lecture_slot" >
                 <option value="null" >--S-E-L-E-C-T--</option>
               
                  <!-- Dropdown php starts for time -->
                  <?php
        require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
        $result=mysqli_query($conn, "SELECT * FROM  lecture_slot_table") or die(mysqli_error($conn));
        $gray=0;
        while($row=mysqli_fetch_assoc($result)){
            
            $lecture_starts=$row['lecture_starts'];
            $lecture_ends=$row['lecture_ends'];
        
       
        if($gray%2){
            ?>
                     <option value="<?php echo $lecture_starts . '--' . $lecture_ends; ?>" style="background-color:#f2f2f2;" ><?php echo "$lecture_starts"."--"."$lecture_ends "; ?></option>
                     
                     <?php
        }
        else{
            ?>
                     <option value="<?php echo $lecture_starts . '--' . $lecture_ends; ?>" ><?php echo "$lecture_starts"."--"."$lecture_ends "; ?></option>
                     
                     <?php
        }
        $gray++;
      }

        ?> </select ></div>
                  <!-- Dropdown php ends for time -->
                  <!-- Dropdown ends for time -->
                  </div>
            
            
            
            <button type="submit" id="submit" name="submit">Add</button>
        </form>
        </div>
        </div>
        </main>
        <?php
if(isset($_POST['submit'])){
    require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';

    $module_name=$_POST['module_name'];
    $topic_name=$_POST['topic_name'];
    $date=$_POST['date'];
    $time=$_POST['time'];

    $sql="INSERT INTO teaching_plan(`module_name`,`topic_name`,`date`,`time`) VALUE ('$module_name','$topic_name','$date','$time')";
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