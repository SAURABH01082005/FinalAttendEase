<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Faculty</title>
    <link rel="stylesheet" href="markattendence4.css">
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
      
            <!-- <input type="checkbox" value="class" name="class"> -->
             <div class="container">
             <div class="under_container">
             <!-- style="table-layout: fixed; width: 100% !important;" -->
             <form action="" method="post">
            <table class="TableContainer" >
                    <tr class="row1">
                        <th class="th1">Id</th>
                        <th class="th2">Student Name</th>
                        <th class="th3">P</th>
                        <th class="th4">A</th>
                        <th class="th5">E</th>
                        <th class="th6">H</th>
                        <th class="justification" id="justification" class="th">Justification</th>
                    </tr>
                    <?php
                 require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
                 $result=mysqli_query($conn, "SELECT * FROM  student_info") or die(mysqli_error($conn));
                 $color=1;
                 $srno=0;
                 while($row=mysqli_fetch_assoc($result)){
                 $color++;
 
                 // echo $row['student_name'];
                 $student_name=$row['student_name'];
                 $student_id=$row['student_id'];
               ?>
                 <?php
                 if($color%2==0){
                    $srno++;
                    ?>
                    <tr>
                    <td class="student_id"><?php echo $student_id; ?></td>   
                 <td class="firstrow_name" style="width: 600px;">
                 <?php echo "$srno"."."."$student_name"; ?>
                 </td>
                 <!-- <label for="studnet_selected"> -->
                 <td >
                    <input type="checkbox" name="student_present[]" value="<?php echo $student_id; ?>" >
                 </td>
                 <td >
                    <input type="checkbox" name="student_absent[]" value="<?php echo $student_id; ?>" >
                 </td>
                 <td>
                    <input type="checkbox" name="student_leave[]" value="<?php echo $student_id; ?>">
                 </td>
                 <td>
                    <input type="checkbox" name="student_holiday[]" value="<?php echo $student_id; ?>" >
                 </td>
                 <td>
                    <input type="text" name="justification" class="justification">
                 </td>
                 <!-- </label> -->

                  </tr>
                    <?php

                 }

                 else
                 {   
                    $srno++;
                 ?>
                <tr style="background-color:#f2f2f2;">
                <td class="student_id"><?php echo $student_id; ?></td>
                 <td class="firstrow_name ">
                 <?php echo "$srno"."."."$student_name"; ?>
                 </td>
                 <td >
                    <input type="checkbox" name="student_present[]" value="<?php echo $student_id; ?>">
                 </td>
                 <td >
                    <input type="checkbox" name="student_absent[]" value="<?php echo $student_id; ?>">
                 </td>
                 <td>
                    <input type="checkbox" name="student_leave[]" value="<?php echo $student_id; ?>">
                 </td>
                 <td>
                    <input type="checkbox" name="student_holiday[]" value="<?php echo $student_id; ?>">
                 </td>
                 <td>
                    <input type="text" name="justification" class="justification">
                 </td>

                  </tr>
                    <?php
                 }
                }
                 ?>
                   
                
                 
                 
                </table>
                
                   
                <div class="select_date"><div class="child2">Select Date (optional) </div><div class="dateboxchild"><input type="date" name="date" style="margin-right:50px;" ></div>
                  <div class="select_time"><div class="child2">Select Time </div>
                  <!-- Dropdown starts for time-->
                  
                  <div class="dateboxchild">
                   <select name="time" id="" class="lecture_slot" name="time" style="margin-left:8px;">
                   <option value="" value="none">--S-E-L-E-C-T--</option>
                 
                    <!-- Dropdown php starts for time -->
                    <?php
          require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
          $result=mysqli_query($conn, "SELECT * FROM  lecture_slot_table") or die(mysqli_error($conn));
          $gray=0;
          while($row=mysqli_fetch_assoc($result)){
              
              $lecture_starts=$row['lecture_starts'];
              $lecture_ends=$row['lecture_ends'];
          
         
              $print_lecture_time = "$lecture_starts -- $lecture_ends"; 
          if($gray%2){
              
                     echo  "<option value='$print_lecture_time' style='background-color:#f2f2f2;' >$print_lecture_time</option>";
                       
                       
          }
          else{
              
                      echo "<option value='$print_lecture_time'>$print_lecture_time</option>";
                       
                      
          }
          $gray++;
        }
  
          ?> </select >
                    <!-- Dropdown php ends for time -->
                    <!-- Dropdown ends for time -->
                    </div></div></div>
                 
                     
                   <!-- Dropdown -->
                   <div class="select_module_name"> <div class="dropdown">Select Module Name</div> 
                   <select name="module_name" id="">
                   <option value="none">--S-E-L-E-C-T--</option>
                   <!-- Dropdown php starts -->
                   <?php
          require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
          $result=mysqli_query($conn, "SELECT * FROM  teaching_plan") or die(mysqli_error($conn));
  
          $pre_module_name="hello";
          while($row=mysqli_fetch_assoc($result)){
              
              $module_name=$row['module_name'];
              $topic_name=$row['topic_name'];
              date_default_timezone_set('Asia/Kolkata');
              $date=$row['date'];
              // if($module_name){
              //     echo ;
              // }
               $present_date=date("Y-m-d");
              if($module_name!=$pre_module_name){
              
                     echo "<option value='$module_name' style='background-color:#f2f2f2;'>$module_name</option>";
                       
                      
          }
      $pre_module_name=$module_name;}
                       ?>
                   <!-- Dropdown php ends -->
                      </select></div>
                 
                  <div class="topic_teached">Enter Topic Teached <input type="text" name="module_topic" id=""  placeholder="Enter text"/></div>
                   
                     
                    <input type="submit" name="addAttendenceBTN">
                   
                   
                   
            </form>
          </div>
          </div>
         

<?php
//date logic starts

if(isset($_POST['addAttendenceBTN'])){
    //adding module to databse start
    $module_name=$_POST['module_name'];
    $module_topic=$_POST['module_topic'];
    $date=$_POST['date'];
    $time=$_POST['time'];
     $result=mysqli_query($conn,"INSERT INTO  module_selection(`module_name`,`module_topic`,`date`,`time`)  VALUES('$module_name','$module_topic','$date','$time') ") or die(mysqli_error($conn));
    

    //adding module to databse end

    date_default_timezone_set("Asia/calcutta");

    if($_POST['date']==NULL){
        $select_date=date("Y-m-d");
    }
    else
    {
        $select_date=$_POST['date'];
    }
    // echo $select_date;



//date logic ends

$attendence_month=date("m",strtotime($select_date));
$attendence_year=date("Y",strtotime($select_date));

if(isset($_POST['student_present'])){
    $student_present=$_POST['student_present'];
    $attendence="P";

    foreach($student_present as $atd){
        $result=mysqli_query($conn,"INSERT INTO attendencerough(`student_id`,`current_date`,`attendence_month`,`attendence_year`,`attendence`)  VALUES('$atd','$select_date','$attendence_month','$attendence_year','$attendence') ") or die(mysqli_error($conn));
    }
}
if(isset($_POST['student_absent'])){
    $student_absent=$_POST['student_absent'];
    $attendence="A";

    foreach($student_absent as $atd){
        $result=mysqli_query($conn,"INSERT INTO attendencerough(`student_id`,`current_date`,`attendence_month`,`attendence_year`,`attendence`)  VALUES('$atd','$select_date','$attendence_month','$attendence_year','$attendence') ") or die(mysqli_error($conn));
    }
}
if(isset($_POST['student_leave'])){
    $student_leave=$_POST['student_leave'];
    $attendence="E";

    foreach($student_leave as $atd){
        $result=mysqli_query($conn,"INSERT INTO attendencerough(`student_id`,`current_date`,`attendence_month`,`attendence_year`,`attendence`)  VALUES('$atd','$select_date','$attendence_month','$attendence_year','$attendence') ") or die(mysqli_error($conn));
    }
}
if(isset($_POST['student_holiday'])){
    $student_holiday=$_POST['student_holiday'];
    $attendence="H";

    foreach($student_holiday as $atd){
        $result=mysqli_query($conn,"INSERT INTO attendencerough(`student_id`,`current_date`,`attendence_month`,`attendence_year`,`attendence`)  VALUES('$atd','$select_date','$attendence_month','$attendence_year','$attendence') ") or die(mysqli_error($conn));
    }
}

// echo "Attendence added successfully";
}
?>
                
        
    

    </main>
    
</body>
</html>