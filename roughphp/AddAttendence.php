

<table border="1" cellspacing="0">
    <form action="" method="post"  >
        <tr>
            <th>Student Name</th>
            <th>P</th>
            <th>A</th>
            <th>L</th>
            <th>H</th>
        </tr>
        <?php
        require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
        $result=mysqli_query($conn, "SELECT * FROM  roughphp") or die(mysqli_error($conn));
        while($row=mysqli_fetch_assoc($result)){
            // echo $row['student_name'];
            $student_name=$row['student_name'];
            $student_id=$row['id'];
            ?>
            <tr>
                <td>
                <?php echo $student_name; ?>
                </td>
                <td>
                    <input type="checkbox" name="student_present[]" value="<?php echo $student_id; ?>">
                </td>
                <td>
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
        ?>

        <tr>
            <td>Select Date (optional)</td>
            <td colspan="4"><input type="date" name="select_date"  ></td>
        </tr>
        <tr>
            <th><input type="submit" name="addAttendenceBTN"></th>
        </tr>
    </form>
</table>

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
    echo $select_date;



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
    $attendence="L";

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

echo "Attendence added successfully";
}
?>