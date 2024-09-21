<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Faculty</title>
    <link rel="stylesheet" href="markattendence3.css">
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
            <table class="TableContainer">
                <form action="" method="post">
                    <tr class="row1">
                        <th>Student Name</th>
                        <th >P</th>
                        <th>A</th>
                        <th>E</th>
                        <th>H</th>
                    </tr>
                    <?php
                 require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
                 $result=mysqli_query($conn, "SELECT * FROM  student_info") or die(mysqli_error($conn));
                 $color=1;
                 while($row=mysqli_fetch_assoc($result)){
                 $color++;
                  
                 // echo $row['student_name'];
                 $student_name=$row['student_name'];
                 $student_id=$row['student_id'];
               ?>
                 <?php
                 if($color%2==0){
                    ?>
                    <tr>
                 <td class="firstrow_name ">
                 <?php echo $student_name; ?>
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
                 <!-- </label> -->

                  </tr>
                    <?php

                 }

                 else
                 {
                 ?>
                <tr style="background-color:#f2f2f2;">
                 <td class="firstrow_name ">
                 <?php echo $student_name; ?>
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

                  </tr>
                    <?php
                 }
                }
                 ?>
                   
                 <tr>
                   
                 <div ><td colspan="5" class="datebox" style="text-align:left;"> <div class="child2">Select Date (optional) </div><div class="dateboxchild"><input type="date" name="select_date" style="margin-right:50px;" ></div>
                  <div class="child2">Select Time </div><div class="dateboxchild">
                     <!-- Dropdown starts for time-->
                 
                 <select name="lecture_slot dateboxchild" id="" class="lecture_slot" style="margin-left:8px;">
                 <option value="" >--S-E-L-E-C-T--</option>
               
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
                     <option value="" style="background-color:#f2f2f2;" ><?php echo "$lecture_starts"."--"."$lecture_ends "; ?></option>
                     
                     <?php
        }
        else{
            ?>
                     <option value=""  ><?php echo "$lecture_starts"."--"."$lecture_ends "; ?></option>
                     
                     <?php
        }
        $gray++;
      }

        ?> </select >
                  <!-- Dropdown php ends for time -->
                  <!-- Dropdown ends for time -->
                  </div></td></div>
               
                 </tr>
                 <tr class="row_dropdown">
                   
                 <!-- Dropdown -->
                 <div ><td colspan="5" class="dropdown" style="text-align:left;"> <div class="dropdown">Select Module Name</div> 
                 <select name="module_topic" id="">
                 <option value="" >--S-E-L-E-C-T--</option>
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
            ?>
                     <option value="" style="background-color:#f2f2f2;" ><?php echo " $module_name "; ?></option>
                     
                     <?php
        }
    $pre_module_name=$module_name;}
                     ?>
                 <!-- Dropdown php ends -->
                    </select></td></div>
               
                 </tr>

                 <tr >
                    <td colspan="5" style="text-align:left;"  class="topic_teached"> <div class="topic_teached">Enter Topic Teached </div><input type="text" name="" id=""  placeholder="Enter text"/></td>
                 </tr>
                
                 <tr>
                   
                  <td id="submit" style="text-align:left;"><input type="submit" name="addAttendenceBTN"></td>
                 
                 </tr>
              </form>
          </table>
          </div>
          </div>

<?php
//date logic starts

if(isset($_POST['addAttendenceBTN'])){

    date_default_timezone_set("Asia/calcutta");

    if($_POST['select_date']==NULL){
        $select_date=date("Y-m-d");
    }
    else
    {
        $select_date=$_POST['select_date'];
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
                </form>
             </table>
        
    

    </main>
    
</body>
</html>