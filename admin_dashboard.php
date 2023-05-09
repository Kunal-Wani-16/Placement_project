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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="css/style.css">
     

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>SVKM's PLACEMENT CELL</title>
</head>
<body>
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
            <ul class='nav-links'>
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
                <li><a href='analytics.php'>
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
        echo "
        <li><a href='change_password.php'>
            <i class='uil-key-skeleton'></i>
            <span class='link-name'>Change Password</span>
        </a></li></ul>";
        }


        else{
            echo " <li><a href='#'>
            <i class='uil uil-estate'></i>
            <span class='link-name'> Dashboard </span>
        </a></li>
        <li><a href='update_profile_student.php'>
        <i class='uil-notes'></i>
        <span class='link-name'>Update Profile</span>
    </a></li>
    <li><a href='change_password_student.php'>
            <i class='uil-key-skeleton'></i>
            <span class='link-name'>Change Password</span>
        </a></li></ul>";
        }
            // else if($row['role'] == ''){
            //     echo "you're student";
            // }

            
            
            ?>
            
                


            <ul class="logout-mode">
                <li><a href="logout.php">
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
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <!-- <i class="uil uil-search" style="color:rgb(14, 15, 15)"></i>-->
                <!-- <input type="text"  placeholder="Search here..."> -->
                <?php 


                    // echo $uname;
                    // echo $num;
                    if($admin_or_faculty>0){
                        $sqli = "SELECT `fname` FROM `users_profile` WHERE username= '$uname' ";
                        $results = mysqli_query($conn , $sqli);
                        $num = mysqli_num_rows($result);     
                        // echo $num;
                        $rows = mysqli_fetch_assoc($results);

                        // if fname is present in users_profile table then only print welcome + fname else print welcome only 
                        if($rows['fname'] == NULL){
                            // means fname is not present in users_profile
                        echo '<h1>Welcome !</h1>';
                        }
                        else{
                        echo '<h1>Welcome '.$rows['fname'].' !</h1>';
                        }
                    }

                    else{
                        $sqli = "SELECT `fname` FROM `student` WHERE prn= '$uname' ";
                        $results = mysqli_query($conn , $sqli);
                        $num = mysqli_num_rows($result);  
                        $rows = mysqli_fetch_assoc($results);

                        // if fname is present in student table then only print welcome + fname else print welcome only 
                        // if($num == 0) {
                        if($rows['fname'] == NULL){
                        echo '<h1>Welcome !</h1>';
                        
                        }
                        else{
                        echo '<h1>Welcome '.$rows['fname'].' !</h1>';
                        }
                    }
                ?>
            </div>
            
            <img src="" alt="">
        </div>



<!-- Dashboard content only visible for admin or faculty  -->
        <?php    
        if($admin_or_faculty>0){
        
        echo " <div class='dash-content'>
        <div class='overview'>
            <div class='title'>
                <i class='uil uil-tachometer-fast-alt'></i>
                <span class='text'>Dashboard</span>
            </div>
            <div class='boxes'>
                <div class='box box1'>
                    <img src='img/graduated.png' style='height: 200px; width:200px'>
                    <span class='text'>Total Student</span>";
        
                    $sql = "SELECT COUNT(*) AS totalStudent FROM `student`";
                    $result = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo "<span class='number'>".$row['totalStudent']."</span>"; 
                        
                        
                       
                        
                    echo "  </div>
                    <div class='box box2'>
                        <img src='img/letter.png' style='height: 200px; width:200px'>
                        <span class='text'> Total Placed Students</span>";
                        
                        $sql = "SELECT `status` FROM `student` WHERE `status`=1";
                        $result = mysqli_query($conn , $sql);
                        $num = mysqli_num_rows($result);
                        echo "<span class='number'>".$num."</span>";  
                        
                         
                     echo "</div>
                     <div class='box box3'>
                         <img src='img/goal.png' style='height: 200px; width:200px'>
                         <span class='text'>Highest Package Offered</span>";   
                    
                        
                            $sql = "SELECT MAX(`package`) AS package FROM `student_placed_info`";
                            $result = mysqli_query($conn , $sql);
                            $row = mysqli_fetch_assoc($result);
                         echo " <span class='number'>".$row['package']."LPA</span> ";
                        
                       
                    echo "</div>
                    </div>
                </div>
                <div class='activity'>
                    <div class='title'>   
                        <i class='uil-package'></i>
                        <span class='text'>Highest Offers</span>
                    </div>";






                    // highest offer section 
                
                    $sqli = "SELECT student.fname,student.lname,student_placed_info.company,
                    student_placed_info.package,student_placed_info.post from student JOIN student_placed_info 
                    ON student.prn = student_placed_info.prn ORDER BY student_placed_info.package DESC";
                    
                    $results = mysqli_query($conn , $sqli);
                    // $rows = mysqli_fetch_assoc($results);
                    $nums = mysqli_num_rows($results);
                   
                    // $rows['role'];
                    $i=0;
                    echo "<div class='activity-data'>
                    <div class='data names'>
                        <span class='data-title'>Students Name</span> 
                    </div> 
                    <div class='data email'>
                        <span class='data-title'>Company</span>
                    </div>
                    <div class='data joined'>
                         <span class='data-title'>Package(LPA)</span>
                    </div>
                    <div class='data type'>
                        <span class='data-title'>Post</span>
                    </div>
                    </div>";

                    while($i<10) {
                        if($i == $nums){
                            break;
                        } 
                    $rows = mysqli_fetch_assoc($results);

                        echo "
    <div class='activity-data'>
    <div class='data names'>
        
        <span class='data-list'>".$rows['fname']." ".$rows['lname']."</span>
        
    </div>
    <div class='data email'>
        
        <span class='data-list'>".$rows['company']."</span>
        
    </div>
    <div class='data joined'>
       
        <span class='data-list'>".$rows['package']."</span>
        
    </div>
    <div class='data type'>
       
        <span class='data-list'>".$rows['post']."</span>
        
    </div>

</div>";
           $i=$i+1; 
          
            }
                
        }



        // student nav menu items student dashboard
          else{
            echo " <div class='dash-content'>
            <div class='overview'>
                <div class='title'>
                    <i class='uil uil-tachometer-fast-alt'></i>
                    <span class='text'>Top Companies Recruitments</span>
                </div>
                <div class='boxes'>";

                $sql = "SELECT COUNT(*) as count_of_tcs FROM `student_placed_info` WHERE company='TCS'";
                $sql2 = "SELECT COUNT(*) as count_of_infosys FROM `student_placed_info` WHERE company='Infosys'";
                $sql3 = "SELECT COUNT(*) as count_of_wipro FROM `student_placed_info` WHERE company='Wipro'";
                $result = mysqli_query($conn , $sql);
                $result2 = mysqli_query($conn , $sql2);
                $result3 = mysqli_query($conn , $sql3);
                
                $row = mysqli_fetch_assoc($result);
                $row2 = mysqli_fetch_assoc($result2);
                $row3 = mysqli_fetch_assoc($result3);
          
                 echo "<div class='box box1'>
                     <img src='img/one.png' style='height: 200px; width:200px'>
                     <span class='text'>TCS</span>
                     <span class='number'>".$row['count_of_tcs']."</span>
                 </div>";
                 
                    echo "<div class='box box2'>
                     <img src='img/two.png' style='height: 200px; width:200px'>
                     <span class='text'>Infosys</span>
                     <span class='number'>".$row2['count_of_infosys']."</span>
                 </div>"; 
                
                    echo "<div class='box box3'>
                     <img src='img/three.png' style='height: 200px; width:200px'>
                     <span class='text'>Wipro</span>
                     <span class='number'>".$row3['count_of_wipro']."</span>
                 </div>
             </div>
         </div>";
       

         echo "
                <div class='activity'>
                    <div class='title'>   
                        <i class='uil-package'></i>
                        <span class='text'>Companies</span>
                    </div>";

         $sql = "SELECT * FROM `company`";
         $result = mysqli_query($conn , $sql);
         $num = mysqli_num_rows($result);
         $i=0;

            echo "<div class='activity-data'>
                    <div class='data names'>
                        <span class='data-title'>Company Name</span> 
                    </div> 
                    <div class='data email'>
                        <span class='data-title'>Eligiblity Criteria of CGPA</span>
                    </div>
                    <div class='data joined'>
                         <span class='data-title'>Apply Here</span>
                    </div>
                    </div>";


                    while($i<$num) {
                       
                    $row = mysqli_fetch_assoc($result);

                        echo "
    <div class='activity-data'>
    <div class='data names'>
        
        <span class='data-list'>".$row['company_name']."</span>
        
    </div>
    <div class='data email'>
        
        <span class='data-list'>".$row['cgpa_criteria']." or above</span>
        
    </div>
    <div class='data joined'>
       
        <span class='data-list'> <a href='".$row['link']."'> Apply Here </a> </span>
        
    </div>

</div>";
           $i=$i+1; 
          
            }
            
          }
          
    ?>

            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>