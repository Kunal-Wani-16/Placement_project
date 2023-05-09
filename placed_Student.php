<!-- first checking whether the user is logged in or not  -->
<?php 

  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location:home.php");
    exit;
}
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {  
        
        include 'partials/_dbconnect.php';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $prn = $_POST['prn'];
        $email = $_POST['email'];
        $company =$_POST['company'];
        $package=$_POST['package'];
        $post=$_POST['post'];
        $sql7 = "UPDATE `student_placed_info` SET `prn`='$prn', `company`='$company', `package`='$package', `post`='$post' WHERE `prn` = $prn";
        $result7 = mysqli_query($conn , $sql7);
        
        $sql8 = "UPDATE `student` SET `fname`='$fname', `lname`='$lname',`email`='$email' WHERE `prn` = $prn";
        $result8 = mysqli_query($conn , $sql8);
        
        if($result7){
            echo "<script> alert('updated') </script>";
        }
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

            <!-- bootstrap link -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
                <li><a href='#'>
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
                <li><a href='#'>
                    <i class='uil-arrow-up-right'></i>
                    <span class='link-name'>Placed Student</span>
                </a></li>
                <li><a href="analytics.php">
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
                <i class='uil-arrow-up-right'></i>
                <!-- <i class='uil uil-tachometer-fast-alt'></i> -->
                <span class='text'>Placed Student Data</span>
            </div>
          

            <table id="myTable">
            <thead>
              <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>PRN</th>
                <th>Company</th>
                <th>Package</th>
                <th>Post</th>
                <th>Branch</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Batch</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>

            <?php  
             include 'partials/_dbconnect.php';

             $uname = $_SESSION['username'];
            $sql = "SELECT student.fname,student.prn,student.lname,student.batch,student_placed_info.company,
            student_placed_info.package,student_placed_info.post,student.branch,student.email,student.contact,student.prn from student JOIN student_placed_info 
            ON student.prn = student_placed_info.prn ORDER BY student_placed_info.package ";
            $result = mysqli_query($conn , $sql);
            // echo var_dump($result);
            $num = mysqli_num_rows($result);
            
                $i = 0;
            if($num>0){
                while ($i<$num) {  
                $row = mysqli_fetch_assoc($result);
          //        echo "<br>".$row['fname'] . $row['lname'].$row['prn'].$row['sap'].$row['batch'].$row['contact'].$row['email'].$row['age'].$row['branch'].$row['cgpa'].$row['status']. "<br>" ;
               
          echo "<tr> 
                <td>".$row['fname']." ".$row['lname']."</td>
            <td>".$row['prn']."</td>
            <td>".$row['company']."</td>
            <td>".$row['package']."</td>
            <td>".$row['post']."</td>
            <td>".$row['branch']."</td>
            <td>".$row['email']."</td>
            <td>".$row['contact']."</td>
            <td>".$row['batch']."</td>
            <td> 
            
            <span style='    background-color: var(--primary-color);
            border-radius: 6px;
            color: var(--title-icon-color);
            width: 19px;
            justify-content: center;
            align-items: center;
            text-align: center;  margin-left: 6px; padding: 4px;'> <a style='color: white;' class='edit' title='Edit' data-toggle='modal' data-target='#myEditModal".$i."'> <i class=' uil-edit-alt'> </i> </a> </span>
            </td>

          </tr>";

        // student edit modal 
        echo "<div class='modal fade' id='myEditModal".$i."'>
        <div class='modal-dialog modal-lg'>
          <div class='modal-content'>";

          echo " <div class='modal-header'>
          <h4 class='modal-title'>".$row['fname']." ".$row['lname']."</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>";


// Edit Modal body
          echo "<div class='modal-body'>"; ?>
                      
                        <form action='/miniproject_final/placed_Student.php' method='post'>
                        <div class='form first' id='customers'>
                            <div class='details personal'>
                                <span class='title'> PRN:<?php echo $row['prn']; ?> </span>
                    
                                <div class='fields'>
                                    <div class='input-field'>
                                        <label>First Name</label>
                                        <input type='text' placeholder='Enter your name' name='fname' value="<?php echo $row['fname']; ?>">
                                    </div>
                    
                                    <div class='input-field'>
                                        <label>Last Name</label>
                                        <input type='text' placeholder='Enter your name' name='lname' value="<?php echo $row['lname']; ?>">
                                    </div>

                                    <div class='input-field'>
                                        <label>PRN</label>
                                        <input type='text' placeholder='PRN' name='prn' value="<?php echo $row['prn']; ?>">
                                    </div>
                                    <div class='input-field'>
                                        <label>email</label>
                                        <input type='text' placeholder='email' name='email' value="<?php echo $row['email']; ?>">
                                    </div>
                                    </div>
            </div>
              <div class='details ID'>
                
               <div class='fields'>
                        <div class='input-field'>
                            <label>Company Name</label>
                            <input type='text' placeholder='Company Name' value="<?php echo $row['company']; ?>" name='company' >
                        </div>
                        <div class='input-field'>
                            <label>Package</label>
                            <input type='text' placeholder='Company Name' value="<?php echo $row['package']; ?>"  name='package' >
                        </div>
                        <div class='input-field'>
                            <label>Post</label>
                            <input type='text' placeholder='Company Name' value=" <?php echo $row['post'] ?> " name='post' >
                        </div>
           
                                <button class='nextBtn' type='submit'>
                                    <span class='btnText'>Update Profile</span>
                                    <i class=' uil-user-plusk'></i>
                                </button>
                            </div> 
                        </div>
                    
                        
                    </form>
  
          </div>


       <div class='modal-footer'>
          <button type='submit' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        </div>
        
      </div>
    </div>
  </div>
                </div>    
<?php


                $i++;
                }
            }
}    
            ?>    
              
            </tbody>
          </table>
          <script src="js/script.js"></script>

 <!-- for data table  -->
 <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
      
      <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
  
    <script src=" //cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js  "></script>
  <script src="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
    
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>

</body>
</html>