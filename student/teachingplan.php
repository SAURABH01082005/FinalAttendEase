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
    <link rel="stylesheet" href="teachingplan1.css">
    <title>Teaching plan</title>
</head>
<body>
<header>
        <h1>AttendEase</h1>
        </header>


        <div id="mySidenav" class="sidenav">
  <a href="https://localhost/miniprojectattendenceSem3/Attendencemain/AttendEase.html" id="about">Home</a>
  <a href="student_front.php" id="blog">Persona</a>
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
  
</main>

</body>
</html>