<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Student_attendence</title>
    <link rel="stylesheet" href="attendence2.css">
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
        <!-- <table  border="1" cellspacing="0">
    <h1>Attendance Marking</h1>
    
<?php
// require  'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
// $result=mysqli_query($conn, "SELECT * FROM student_info") or die(mysqli_error($conn));
// echo var_dump($result);
// $num=mysqli_num_rows($result);
?>
        </tabe> -->

        <div class="container">

        
       
        <table  border="1" cellspacing="0" class="attendence_table">
    <h1>Attendance Marking</h1>
    
<!----------------------------------------------------------------- form starts -->
<div class="form_container">
    <div class="text_from">Enter month : </div>
<form action="" method="post">
    <select name="month_no" id="">
        <?php
        for($i=1;$i<=12;$i++){
            $month=date("F",strtotime(date("d-$i-Y")));
            $month_no=date("m",strtotime(date("d-$i-Y")));
            ?>
               <option value="<?php  echo "$month_no"; ?>"><?php echo "$month"; ?></option>
            <?php
        }
        ?>
        
    </select>
    <input type="submit" value="Find" name="submit">
</form>
    </div>


<?php
if(isset($_POST['submit'])){
    require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';

    $month_no=$_POST['month_no'];

    $sql="INSERT INTO  month_table(`month_no`) VALUE ('$month_no')";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
   
 
}

?>
<!----------------------------------------------------------------- form ends -->

<?php
require  'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
$result=mysqli_query($conn, "SELECT * FROM student_info") or die(mysqli_error($conn));
//echo var_dump($result);
$num=mysqli_num_rows($result);

$student_name_array=array();
$student_id_array=array();
while($rowdata=mysqli_fetch_assoc($result)){
    $student_name_array[]=$rowdata['student_name'];
    $student_id_array[]=$rowdata['student_id'];
}
// echo var_dump($student_name_array);


// ------------------------------------month fetching form month_table starts------------

$first=0;
date_default_timezone_set('Asia/Kolkata');
if($_SERVER['REQUEST_METHOD']=='POST'){
    require  'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
    $result=mysqli_query($conn, "SELECT * FROM month_table") or die(mysqli_error($conn));

    $month_array= array();
    while($row_date=mysqli_fetch_assoc($result)){
        $month=$row_date['month_no'];
        if($month!=NULL)
        // $month=$month_loop;
        $first=date("Y-$month-1");
    }
 
    
}

date_default_timezone_set('Asia/Kolkata');
if(!$first)
$first=date("Y-m-1");
// ------------------------------------month fetching form month_table ends--------------
$toralDaysMonth=date("t",strtotime($first));
$totalStudent=$num;
$substite2=strtoupper(date("F",strtotime($first)));
?>
<h3 >Month :<?php echo " "." $substite2. "; ?>
<?php

?>

<tr class="first_row">
    
    
    <!-- <td rowspan='2' class="blue">Id</td> -->
<td rowspan='2' class="blue id">ID</td>
<td rowspan='2' class="blue names">Names</td>
    <?php

$counter=0;
for($i=1;$i<=$totalStudent+2;$i++){
    if($i==1){
        for($j=1;$j<=$toralDaysMonth;$j++){
            ?>
            <td class="blue date_row"><?php echo"$j";?></td>
            <?php
        }
        echo "</tr>";
    }
    else if($i==2) {
        for($j=0;$j<$toralDaysMonth;$j++){
            $substitute=date("D",strtotime("+$j days ",strtotime($first)));
            ?>
             <td  class="blue day_row"><?php echo "$substitute"; ?></td>
            <?php
        }
        echo "</tr>";
    }
    else  {
           
        
            ?>
            
            <td class="blue"><?php echo $student_id_array[$counter] ?></td>
            <td class="blue"><?php echo $student_name_array[$counter] ?></td>
            <?php

            
            for($j=1;$j<=$toralDaysMonth;$j++){
               
                $month_selector=date("m",strtotime($first));
                $dateOfAttendence=date("Y-$month_selector-$j");
          
                $fetchingStudentAttendence=mysqli_query($conn,"SELECT attendence FROM attendencerough WHERE `student_id`='$student_id_array[$counter]' AND `current_date`='$dateOfAttendence'");
               // echo var_dump( $fetchingStudentAttendence);

                $isAttendenceAdded=mysqli_num_rows($fetchingStudentAttendence);
                if($isAttendenceAdded>0){
                    $attendence= mysqli_fetch_assoc($fetchingStudentAttendence);
                    $holiday="H";
                    $present="P";
                    $absent="A";
                    $exemption="E";
                    if(!strcmp($attendence['attendence'],$holiday))
                   
                    {
                        ?>
                        <td style="background-color:#1a6b9e "><?php echo $attendence['attendence']; ?></td>
                        <?php
                    }
                   else if(!strcmp($attendence['attendence'],$present))
                   
                    {
                        ?>
                        <td style="background-color:#FFC300"><?php echo $attendence['attendence']; ?></td>
                        <?php
                    }
                     else if(!strcmp($attendence['attendence'],$absent))
                   
                    {
                        ?>
                        <td style="background-color:#c72b3b "><?php echo $attendence['attendence']; ?></td>
                        <?php
                    }
                    else if(!strcmp($attendence['attendence'],$exemption))
                   
                    {
                        ?>
                        <td style="background-color: #2a8d6d "><?php echo $attendence['attendence']; ?></td>
                        <?php
                    }
                    else
                    echo "<td>" . $attendence['attendence'] . "</td>"; 
                    
                }
                else
                echo "<td></td>";
            }
        
        echo "</tr>";
        $counter=$counter+1;
    }
    
  
}

?>

</table></div>

        </main>



        <!-- //adding attendence through excel starts -->
         <div class="excel_container">
            <div class="excel_logo"><img src="excel_logo.png" alt="image" id="excel_logo_img"></div>
            <div class="excel_import">
               
            <form class="" action="" method="post" enctype="multipart/form-data">
            <div id="custom-file-upload">Upload Excel File:</div>
            <div><input type="file" name="excel"class="file-input" id="excel" required value=""></div>
			<div><button type="submit" name="import">Import</button>
			</div>
		</form>
            </div>
         </div>

       


         <?php
		if(isset($_POST["import"])){
            $conn = mysqli_connect("localhost", "root", "", "miniprojectattendence");
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
            
			$targetDirectory = "excelrecord/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
            
			error_reporting(0);
			ini_set('display_errors', 0);
            
			require 'ExcelRead/excel_reader2.php';
			require 'ExcelRead/SpreadsheetReader.php';
			$reader = new SpreadsheetReader($targetDirectory);
          
			foreach($reader as $key => $row){
				$student_id = $row[0];
				$current_date = $row[1];
                // $current_date=date("Y-m-d",strtotime($current_date));
				$attendence_month = $row[2];
				$attendence_year = $row[3];
				$attendence = $row[4];
				mysqli_query($conn, "INSERT INTO attendencerough(`student_id`,`current_date`,`attendence_month`,`attendence_year`,`attendence`) VALUES( '$student_id', '$current_date', '$attendence_month','$attendence_year','$attendence')") or die(mysqli_error($conn));
			}
             
			echo
			"
			<script>
			alert('Succesfully Imported');
			
			</script>
			";
		}
		?>

        




        <!-- //adding attendence through excel done-->
        <?php  $conn = mysqli_connect("localhost", "root", "", "miniprojectattendence"); ?>
        <div class="export_container">
            <div class="export_logo"><img src="export.png" id="export_img" alt="logo"></div>
            <div class="export_button"><div><a href="export.php"><button name="export">Export</button></a></div>

         </div>
    </div>

    

    <footer>    
    </footer>
    
</body>
</html>