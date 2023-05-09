<?php 

include 'partials/_dbconnect.php';

?>

<!-- first checking whether the user is logged in or not  -->
<?php 

  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location:home.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin login</title>
<meta charset="utf-8">
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="UniApps - University Exam ERP">
          <meta name="author" content="WeShineTech">
          <meta name="keywords" content="uniapps university exam erp">
          <title>Sign In</title>
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link rel="stylesheet" type="text/css" href="css/lib.2.css">
          <link rel="stylesheet" type="text/css" href="css/light.css">
          <!-- misc-->
          <link rel="stylesheet" type="text/css" href="css/bootstrap5.css">
          <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">


<!-- dashboard css file linking  -->
          <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


          <!-- keep this disabled-->
          <script>WebSocket = undefined;</script>

          <!-- Bar Graph code here 1st chart-->
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Placed Students', 'Total Students'],
            <?php  
            
            $sql = "SELECT DISTINCT `batch`,count(*) AS total_students FROM `student` GROUP BY `batch`";
            $sql2 = "SELECT batch, SUM( status) Total_placed_studennts FROM student GROUP BY batch";  
            $result = mysqli_query($conn , $sql);
            $result2 = mysqli_query($conn , $sql2);  
            $num = mysqli_num_rows($result);
            $i = 0;
            if($num>0){
                while ($i<$num) {  
                $row = mysqli_fetch_assoc($result);
                $row2 = mysqli_fetch_assoc($result2);
                ?>
                ["<?php echo $row['batch']; ?>" ,"<?php echo $row2['Total_placed_studennts']; ?>", "<?php echo $row['total_students']; ?>"],
               
                <?php
                $i=$i+1;
                }
            }

            ?>
        ]);

        var options = {
          chart: {
            title: 'Placement Report',
            subtitle: 'Total Students, Placed Students: '
       
            // $sql = "SELECT MIN(batch) start_year,MAX(batch) last_year FROM `student` ";
            // $result = mysqli_query($conn , $sql);
            // $row = mysqli_fetch_assoc($result);
            // echo $row['start_year']."'";
            
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }



    //   line chart code here 2nd chart
    google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Placements: ');

      data.addRows([
        <?php  
            
            $sql2 = "SELECT batch, SUM( status) Total_placed_studennts FROM student GROUP BY batch";  
            $result2 = mysqli_query($conn , $sql2);  
            $num = mysqli_num_rows($result2);
            $i = 0;
            if($num>0){
                while ($i<$num) {  
                $row2 = mysqli_fetch_assoc($result2);
                ?>
        [<?php echo $row2['batch'];?>, <?php echo $row2['Total_placed_studennts'];?>],  

            <?php
                    $i=$i+1;
                 }
                }

             ?>
      ]);

      var options = {
        hAxis: {
          title: 'Year'
        },
        vAxis: {
          title: 'Placements'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }





    // Pie chart code here 3rd chart
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Companies', 'Student Count'],
        //   ['Work',     11],
          <?php  
            
            $sql = "SELECT `company`,COUNT(*) AS count FROM `student_placed_info` GROUP BY company";
           
            $result = mysqli_query($conn , $sql);
           
            $num = mysqli_num_rows($result);
            $i = 0;
            if($num>0){
                while ($i<$num) {  
                $row = mysqli_fetch_assoc($result);
             
                ?>
            ['<?php echo $row['company'] ?>', <?php echo $row['count'] ?> ],
            <?php $i=$i+1;}} ?>
        ]);

        var options = {
          title: 'offers from different companies'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>
        </head>


        <body data-theme="light" data-layout="fluid">
        <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="img/logo.jpg" style="height: 75px; width:75px" alt="">
            </div>
            <span class="logo_name">PLACEMENT CELL</span>
        </div>
        <div class="menu-items">

        <?php  
            include 'partials/_dbconnect.php';
            // echo $_SESSION['username'];
            $uname = $_SESSION['username'];
            // echo "$uname";
            $sql = "SELECT `role` FROM `users` WHERE username= '$uname' ";
            $result = mysqli_query($conn , $sql);
            $num = mysqli_num_rows($result);
            // $i=0;
            $admin_or_faculty = $num;         
            // $admin_or_faculty stores the role of username if $admin_or_faculty>0 means he/she is admin or faculty else he/she is student
            if($num > 0) {
            $row = mysqli_fetch_assoc($result);
            // echo var_dump($row);
            // echo $row['role'];
            echo "
            <ul class='nav-links' style='padding-left: 0rem;'>
                <li><a href='admin_dashboard.php'>
                    <i class='uil uil-estate'></i>
                    <span class='link-name'>Dahsboard</span>
                </a></li>
                <li><a href='add_student.php'>
                    <i class='uil-user-plus'></i>
                    <span class='link-name'>Add Students</span>
                </a></li>
                <li><a href='student_data.php'>
                    <i class='uil uil-files-landscapes'></i>
                    <span class='link-name'>Students data</span>
                </a></li>
                <li><a href='placed_Student.php'>
                    <i class='uil-arrow-up-right'></i>
                    <span class='link-name'>Placed Student</span>
                </a></li>
                <li><a href='#'>
                    <i class='uil uil-chart'></i>
                    <span class='link-name'>Analytics</span>
                </a></li>";    

            if($row['role'] == 'admin'){
                echo " <li><a href='all_users.php'>
                <i class='uil-user'></i>
                <span class='link-name'>Add user</span>
            </a></li>
            <li><a href='add_company.php'>
            <i class=' uil-building'></i>
            <span class='link-name'>Add Company</span>
        </a></li>";
            }
            echo "<li><a href='update_profile_admin_faculty.php'>
            <i class='uil-notes'></i>
            <span class='link-name'>Update Profile</span>
        </a></li>";
        }
        else{
            echo " <li><a href='admin_dashboard.php'>
            <i class='uil uil-estate'></i>
            <span class='link-name'> Dashboard </span>
        </a></li>
        <li><a href='update_profile_student.php'>
        <i class='uil-notes'></i>
        <span class='link-name'>Update Profile</span>
    </a></li>";
        }
            // else if($row['role'] == ''){
            //     echo "you're student";
            // }

            echo "
        <li><a href='change_password.php'>
            <i class='uil-key-skeleton'></i>
            <span class='link-name'>Change Password</span>
        </a></li></ul>";
            
            ?>
            <!-- <ul class="nav-links" style="padding-left: 0rem;">
                <li><a href="admin_dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href='#'>
                    <i class='uil-user-plus'></i>
                    <span class='link-name'>Add Students</span>
                </a></li>
                <li><a href="student_data.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Students data</span>
                </a></li>
                <li><a href='placed_Student.php'>
                    <i class='uil-arrow-up-right'></i>
                    <span class='link-name'>Placed Student</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="all_users.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Add user</span>
                </a></li>
                <li><a href='#'>
            <i class='uil-notes'></i>
            <span class='link-name'>Update Profile</span>
        </a></li>
        <li><a href='change_password.php'>
            <i class='uil-key-skeleton'></i>
            <span class='link-name'>Change Password</span>
        </a></li>
    </ul>
            </ul> -->
            <ul class="logout-mode" style="padding-left: 0rem;">
                <li><a href="/miniproject_final/logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>


    <?php 
// if user is admin or faculty then only show below data 
if($admin_or_faculty>0) {   
?>
        <div class="dashboard">
          
        <div class="top" style="background-color: transparent;">
            <i class="uil uil-bars sidebar-toggle"></i>
            <img src="" alt="">
        </div>

        <div class='dash-content'>
        <div class='overview'>
            <div class='title'>      
                <i class='uil uil-chart'></i>
                <!-- <i class='uil uil-tachometer-fast-alt'></i> -->
                <span class='text'>Anaytics</span>
            </div>
          





            <!-- bar graph google charts  -->
            <div id="barchart_material" style="width: 900px; height: 500px;"></div>  
             <br>

            <!-- line chart code here  -->
  <div id="chart_div" style="width: 900px; height: 500px;"></div>
            <br>

             <!-- pie chart code here  -->
  <div id="piechart" style="width: 900px; height: 500px;"></div>

        <br> 
<div style="margin:auto;text-align:center;"> <button onclick='print()' style=" background-color: aliceblue;  border-radius: 9px;width: 129px;">Print Report</button> </div>   <br>


            <?php  }  ?>

            
    <!-- <script>
        function printss(){
            // console.log('hi')
            window.print()
        }
    </script> -->

    <script src="js/script.js"></script>

</body>
</html>




































<!-- 



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Placed Students', 'Total Students'],
            <?php  
            
            // $sql = "SELECT DISTINCT `batch`,count(*) AS total_students FROM `student` GROUP BY `batch`";
            // $sql2 = "SELECT batch, SUM( status) Total_placed_studennts FROM student GROUP BY batch;";  
            // $result = mysqli_query($conn , $sql);
            // $result2 = mysqli_query($conn , $sql2);  
            // $num = mysqli_num_rows($result);
            // $i = 0;
            // if($num>0){
            //     while ($i<$num) {  
            //     $row = mysqli_fetch_assoc($result);
            //     $row2 = mysqli_fetch_assoc($result2);
            //     ?>
            //     ["<?php echo $row['batch']; ?>" ,"<?php echo $row2['Total_placed_studennts']; ?>", "<?php echo $row['total_students']; ?>"],
               
            //     <?php
            //     $i=$i+1;
            //     }
            // }

            ?>
        ]);

        var options = {
          chart: {
            title: 'Placement Report',
            subtitle: 'Total Students, Placed Students: '
       
            // $sql = "SELECT MIN(batch) start_year,MAX(batch) last_year FROM `student` ";
            // $result = mysqli_query($conn , $sql);
            // $row = mysqli_fetch_assoc($result);
            // echo $row['start_year']."'";
            
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html> -->
