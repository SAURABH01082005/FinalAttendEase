<?php
// $current_date=date("D");
// echo $current_date;
// echo "<br>";

// $time=date("l",strtotime($current_date));
// echo $time;
// ehco


?>

<table  border="1" cellspacing="0">
    <h1>Attendance Marking</h1>
    
<?php
require  'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
$result=mysqli_query($conn, "SELECT * FROM roughphp") or die(mysqli_error($conn));
//echo var_dump($result);
$num=mysqli_num_rows($result);

echo $num."<br>";

$student_name_array=array();
$student_id_array=array();
// $date_array=array();
while($rowdata=mysqli_fetch_assoc($result)){
    $student_name_array[]=$rowdata['student_name'];
    $student_id_array[]=$rowdata['id'];
    // $date_array[]=$rowdata['current_date'];
}
// echo var_dump($student_name_array);

$first=date("1-1-Y");
$toralDaysMonth=date("t",strtotime($first));
$totalStudent=$num;
echo "<br><h3>Month is ". strtoupper(date("M",strtotime($first))) . ".";

echo "<tr>";


echo "<td rowspan='2'>Names</td>";

$counter=0;
for($i=1;$i<=$totalStudent+2;$i++){
    if($i==1){
        for($j=1;$j<=$toralDaysMonth;$j++){
            echo "<td>$j</td>";
        }
        echo "</tr>";
    }
    else if($i==2) {
        for($j=0;$j<$toralDaysMonth;$j++){
            echo "<td>". date("D",strtotime("+$j days ",strtotime($first)))."</td>";
        }
        echo "</tr>";
    }
    else  {
           
        
            echo "<td>" . $student_name_array[$counter] ."</td>"; //lhvkjdndv----

            
            for($j=1;$j<=$toralDaysMonth;$j++){
                // $month_selector=date("m",strtotime($date_array[$counter]));
                $dateOfAttendence=date("Y-1-$j");
                $fetchingStudentAttendence=mysqli_query($conn,"SELECT attendence FROM attendencerough WHERE `student_id`='$student_id_array[$counter]' AND `current_date`='$dateOfAttendence'");
               // echo var_dump( $fetchingStudentAttendence);

                $isAttendenceAdded=mysqli_num_rows($fetchingStudentAttendence);
                if($isAttendenceAdded>0){
                    $attendence= mysqli_fetch_assoc($fetchingStudentAttendence);
                    echo "<td>".$attendence['attendence']."</td>"; 
                }
                else
                echo "<td></td>";
            }
        
        echo "</tr>";
        $counter=$counter+1;
    }
    
  
}

?>

</table>


