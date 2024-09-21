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


<?php
if(isset($_POST['submit'])){
    require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';

    $month_no=$_POST['month_no'];

    $sql="INSERT INTO  month_table(`month_no`) VALUE ('$month_no')";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
   
    echo "Student have added successfully!";
}

?>


<!-- pasfd------------------ -->
<div class="form_container">
<form action="" method="post">
<div class="form_text">Enter month : 
    <select name="month_no" id="">
        <?php
        for($i=1;$i<=12;$i++){
            $month=date("F",strtotime(date("d-$i-Y")));
            $month_no=date("m",strtotime(date("d-$i-Y")));
            ?>
               <option value=<?php $month_no ?>><?php echo "$month"; ?></option>
            <?php
        }
        ?>
        
    </select>
    <input type="submit" value="Find" name="submit">
    </div>
</form>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';

    $month_no=$_POST['month_no'];

    $sql="INSERT INTO  month_table(`month_no`) VALUE ('$month_no')";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
   
    echo "$month_no  have added successfully!";
}

?>