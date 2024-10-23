<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Student_attendence</title>
    <link rel="stylesheet" href="check_attendence1.css">
</head>
<body>
<header>
        <h1>AttendEase</h1>
        </header>

        <div id="mySidenav" class="sidenav">
  <a href="https://localhost/miniprojectattendenceSem3/Attendencemain/AttendEase.html" id="about">Home</a>
  <a href="guardian_front.php" id="blog">Persona</a>
  <!-- <a href="#" id="projects">see</a>
  <a href="#" id="contact">Contact</a> -->
</div>
     <div class="container">


     <?php 
            session_start();
            $student_name="lkjh";
            $student_id=77;
            $present_chart=0;
            $absent_chart=0;
            $exemption_chart=0;
            $holiday_chart=0;
            $null_chart=0;
            if(isset($_SESSION['student_id']) ){
              require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
              $student_id=$_SESSION['student_id'];

              // $result6=mysqli($conn,"SELECT * FROM `student_info` WHERE `student_id`=$student_id") or die(mysqli_error($conn));
              $student_name="lkjh";
              $result6=mysqli_query($conn,"SELECT * FROM `student_info` WHERE `student_id`=$student_id") or die(mysqli_error($conn));
              while ($row6 = mysqli_fetch_assoc($result6)) {
                $student_name = $row6['student_name'];
              }
           
            
              $student_name=strtoupper($student_name);
              $space="    ";
              ?>
            <H4 ><pre style=" font-size:23.4327px ;font-family: 'quicksand';font-weight: 500; margin-top: 20px;font-weight:900;">STUDENT :      <?php  echo "$student_name";?></pre></H4>
              <?php
            }
            ?>

         <table  border="1" cellspacing="0" class="attendence_table">
            <tr>
                <th  class="blue">Months</th>
                <th colspan='31' class="blue">Days</th>
                </tr>
                <!-- //augest se may -->
                
                
                    <?php
                  
                    for($j=8;$j<=12;$j++){
                        ?>
                        <tr>
                        <?php
                        $first=date("Y-$j-1");
                        $substite2=strtoupper(date("F",strtotime($first)));
                       
                       echo  "<td class='blue'>$substite2</td>";
                       
                     $totalDaysMonth=date("t",strtotime($first));
                     for($i=1;$i<=$totalDaysMonth;$i++)
                     {
                        require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
                     $plot_date=date("Y-$j-$i");
             

                    $result=mysqli_query($conn,"SELECT * FROM `attendencerough` WHERE `student_id`=$student_id and `current_date`='$plot_date'") or die(mysqli_error($conn));
                    $row=mysqli_num_rows($result);
                    
                    
                   

                   
                       if($row>0){
                        while($row2=mysqli_fetch_assoc($result))
                        $attendence=$row2['attendence'];

                        switch($attendence){
                            case 'P':echo "<td style='background-color:#1a6b9e '>$i</td>";
                            $present_chart+=1;
                                break;
                                case 'A':echo "<td style='background-color:#c72b3b '>$i</td>";
                                $absent_chart+=3;
                                    break;
                                    case 'H':echo "<td style='background-color:#2a8d6d '>$i</td>";
                                    $holiday_chart+=1;
                                        break ;
                                        case 'E':echo "<td style='background-color:#FFC300 '>$i</td>";
                                        $exemption_chart+=1;
                                           break;
                        }
                        
                       }
                       else{

                         echo "<td >$i</td>";
                         $null_chart++;
                        }
                    
                }
                    ?>
                      </tr>
                      <?php
                      
                    }
                   
                    
                    for($j=1;$j<=5;$j++){
                        ?>
                        <tr>
                        <?php
                        $first=date("Y-$j-1");
                       
                        $substite2=strtoupper(date("F",strtotime($first)));
                       
                       echo  "<td  class='blue'>$substite2</td>";
                       
                     $totalDaysMonth=date("t",strtotime($first));
                     for($i=1;$i<=$totalDaysMonth;$i++)
                     {
                        require 'C:\xampp\htdocs\miniprojectattendenceSem3\partialphp\_dbconnect.php';
                        $plot_date=date("Y-$j-$i");
                        
                      
                       $result=mysqli_query($conn,"SELECT * FROM `attendencerough` WHERE `student_id`=$student_id and `current_date`='$plot_date'") or die(mysqli_error($conn));
                       $row=mysqli_num_rows($result);
                       
                      
                       if($row>0){
                        while($row2=mysqli_fetch_assoc($result))
                        $attendence=$row2['attendence'];

                        switch($attendence){
                            case 'P':echo "<td style='background-color:#1a6b9e '>$i</td>";
                                break;
                                case 'A':echo "<td style='background-color:#c72b3b '>$i</td>";
                                    break;
                                    case 'H':echo "<td style='background-color:#2a8d6d '>$i</td>";
                                        break ;
                                        case 'E':echo "<td style='background-color:#FFC300 '>$i</td>";
                                           break;
                        }
                        
                       }
                       else
                       echo "<td >$i</td>";
                     }
                     ?>
                      </tr>
                     <?php
                    }
                    
                  
                    
                     
                     ?>

               
                </table>
            </div>
            
            </div> 
            <div class="instruction">
              <div class="present_c"></div><div class="text">Present</div>
              <div class="absent_c"></div><div class="text">Absent</div>
              <div class="exemption_c"></div><div class="text">Exemption</div>
              <div class="holiday_c"></div><div class="text">Holiday</div>
            </div> 




            <!-- piechart -->
        
            <div id="piechart" style="width: 900px; height: 500px;"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ["Present", <?php  echo $present_chart; ?>],
          ["Absent", <?php  echo $absent_chart; ?>],
          ['Exemption',  <?php  echo $exemption_chart; ?>],
          ['Holiday', <?php  echo $holiday_chart; ?>]
         
        
        ]);

        var options = {
          title: 'Attendence Chart'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
            
            <footer>
            
            </footer>
    
</body>
</html>