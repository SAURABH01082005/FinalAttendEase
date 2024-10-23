<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="teachingplan.css">
    <title>Teaching plan</title>
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
        <main>
            <div class="container_main1">
            <h1 class ="secondhead_main1">Teaching plan for acadmics</h1>
            <div class="under_container_main1">
            <table  cellspacing="0"><form action="" method="post" class="TableContainer_main1">
                <tr>
                <th>Module name</th>
                <th>Topics</th>
                <th>Date</th>
                <th>Time</th>
                </tr>
                
                <?php
                require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
                $result=mysqli_query($conn,"SELECT * FROM teaching_plan")  or die(mysqli_error($conn));
                $module_name="helllo";
                $module_count=1;
                $topic_count=1;
                while($row=mysqli_fetch_assoc($result)){
                    
                    $present_module_name=$row['module_name'];
                    $topic_name=$row['topic_name'];
                    $date=$row['date'];
                    $time=$row['time'];
                    if($present_module_name==$module_name){
                        ?>
                        <tr>
                        <td class="module_name"></td>
                        <?php
                    }
                    else
                    {

                        ?>
                        <tr style="background-color:#f2f2f2;">
                    <td class="module_name" > <?php echo "$module_count".".  "."$present_module_name"; ?></td>
                        <?php
                         $module_count++;
                         $topic_count=1;
                    }
                    
                    $module_name=$row['module_name'];
                    ?>
                    <td> <?php echo "$topic_count".". "."$topic_name"; ?></td>
                    <td> <?php echo "$date"; ?></td>
                    <td> <?php echo "$time"; ?></td>
                    </tr>
                    <?php
                    $topic_count++;
                }
                ?>

            </form></table></div>
            <div class="separator"></div>
        </div>
            
        
           

            <!-- module-adding -->
             <link rel="stylesheet" href="addplan.css">
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
                     <option value="<?php echo $lecture_starts .'--'. $lecture_ends ; ?>"  ><?php echo "$lecture_starts"."--"."$lecture_ends "; ?></option>
                     
                     <?php
        }
        $gray++;
      }

        ?> </select ></div>
                  <!-- Dropdown php ends for time -->
                  <!-- Dropdown ends for time -->
                  </div>
            
            <!-- --------------------------------------------------time is here -->
            
            
            
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