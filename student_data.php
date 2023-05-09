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
        $status = $_POST['status'];

        $company =$_POST['company'];
        $package=$_POST['package'];
        $post=$_POST['post'];
        

            $sql = "UPDATE `student` SET `fname`='$fname',`lname`='$lname',`status`=$status,`prn` = $prn WHERE `prn` = $prn ";
            $sql5 = "UPDATE `student_password` SET prn=$prn WHERE prn = $prn ";
            $result = mysqli_query($conn , $sql);
            $result5 = mysqli_query($conn , $sql5);

           //if student not present in student_placed_info` and status=1 then insert into *student_placed_info* else Update the other field record
            $sql8 = "SELECT * FROM `student_placed_info` WHERE `prn` = $prn ";
            $result8 = mysqli_query($conn , $sql8);
            $row8 = mysqli_num_rows($result8);
            if($row8==0){
                if($status==1) {
            $sql6 = "INSERT INTO `student_placed_info`(`prn`) VALUES ('$prn')";
            $sql7 = "UPDATE `student_placed_info` SET `prn`='$prn', `company`='$company', `package`='$package', `post`='$post' WHERE `prn` = $prn";
            $result6 = mysqli_query($conn , $sql6);
            $result7 = mysqli_query($conn , $sql7);
                }
              if($status==0){
                $sql6 = "UPDATE `student` SET `status`=$status WHERE 'prn' = $prn";
                // $sql6 = "INSERT INTO `student`(`status`) VALUES ('$status') WHERE 'prn' = $prn";
                $result6 = mysqli_query($conn , $sql6);
              }
        }
            else{
            $sql7 = "UPDATE `student_placed_info` SET `prn`='$prn', `company`='$company', `package`='$package', `post`='$post' WHERE `prn` = $prn";
            $result7 = mysqli_query($conn , $sql7);

            }
            
            
            if($result && $result5 || $result6 || $result7){
                echo "<script> alert('updated') </script>";
            }
            else{
                echo "<script> alert('fail to update') </script>";

            }
        

            // $sql = "UPDATE `student_placed_info` SET `company`='$company',`package`='$package',`post`='$post' WHERE prn = '$uname' ";
           
            // $result = mysqli_query($conn , $sql);
            // if($result){
            //     // echo "<script> alert('updated') </script>";
            // }
            // else{
            //     echo "<script> alert('fail to update') </script>";
            // }
            
            
       
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


     <!----======== CSS ======== -->
    <!-- <link rel="stylesheet" href="css/add_style.css"> -->

     <!----===== Iconscout CSS ===== -->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


          <!-- keep this disabled-->
          <script>WebSocket = undefined;</script>


      <!-- bootstrap link -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>



     

  <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
          
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
            // echo $num;
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
                <li><a href='#'>
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
        }

        else{
            echo " <li><a href='admin_dashboard.php'>
            <i class='uil uil-estate'></i>
            <span class='link-name'> Dashboard </span>
        </a></li>
        <li><a href='update_profile_student.php'>
        <i class='uil-notes'></i>
        <span class='link-name'>Update Profile</span>
    </a></li>"
        ;
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
                <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Students data</span>
                </a></li>
                <li><a href='placed_Student.php'>
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
                <i class=' uil-database-alt'></i>
                <!-- <i class='uil uil-tachometer-fast-alt'></i> -->
                <span class='text'>Student Data</span>
            </div>
          


            <div class='container'>

 <!-- batch wise button -->
 <?php  

             include 'partials/_dbconnect.php';
             $sql = "SELECT DISTINCT batch FROM `student` ORDER BY batch";
             $result = mysqli_query($conn , $sql);
             $num = mysqli_num_rows($result); 

            


             $i=0;
   while($i < $num){
    $row = mysqli_fetch_assoc($result);
        // echo $row['batch'];
        $batch=$row['batch'];

        

            echo "
             <button type='button' class='btn btn-primary flex-column' data-toggle='modal' data-target='#myModal".$i."'>
               Batch ". $row['batch'] ."
             </button>";    
          
                echo  "
                 <div class='modal fade' id='myModal".$i."'>
                <div class='modal-dialog modal-xl'>
                  <div class='modal-content'>
                <div class='modal-header'>
                     <h4 class='modal-title'>Student Data</h4>
                     <button type='button' class='close' data-dismiss='modal'>&times;</button>
                   </div>";
?>

  <?php                  // ( batch wise )modal body 
                     echo "<div class='modal-body'>";     ?>
                      
                            <table id="customers">
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                          <th>Age</th>
                                          <th>PRN NO</th>
                                          <th>Email</th>
                                          <th>Contact No</th>
                                          <th>Status</th>
                                          <th>Batch</th>
                                          <th>Actions</th>
                                        </tr>
                                      </thead>
   
                                      <?php  
            $sqli = "SELECT * FROM `student` WHERE `batch`=$batch";
            $results = mysqli_query($conn , $sqli);
             $nums = mysqli_num_rows($results);
            
                $j = 0;
                $o = 0;
            if($nums>0){
                while ($j<$nums) {  
                $rows = mysqli_fetch_assoc($results);

               echo '<form id="GFG" action="submit.php" method="POST">';
                if($rows['status'] == 0){
                  // $status = '<a style="color:red;"> Not Placed </a>';
                  $status = "<select name='status' required>
                <option value='0'>Not Placed </option>
                <option value='1'>Placed </option>
                </select>";
                
                $prn= "<input type='text' name='prn' id='myInput".$j."' style='width: 122px;' value='".$rows['prn']."'>";
                }
                else{
                  $status= '<a style="color:green;"> Placed </a>';
                  $prn = $rows['prn'];
                }
                      
                // <a style='color: white;' href='javascript:$('GFG').submit('/miniproject_final/submit.php');' title='Edit'>  </a>

          echo "<tr> 
                <td>".$rows['fname']." ".$rows['lname']."</td>
            <td>".$rows['age']."</td>
            <td>".$prn."</td>
            <td>".$rows['email']."</td>
            <td>".$rows['contact']."</td>
            <td>".$status."</td>
            <td>".$rows['batch']."</td>
            <td>"; 
            
            if($rows['status']==0){
            echo "<span style='    background-color: var(--primary-color);
            border-radius: 6px;
            color: var(--title-icon-color);
            width: 19px;
            justify-content: center;
            align-items: center;
            text-align: center;  margin-left: 6px; padding: 4px;'> <button type='submit' title='update record' >  <i class=' uil-edit-alt'>  </i>  </button>  </span>";
            }

            echo "<span style='background-color: var(--primary-color);
            border-radius: 6px;
            color: var(--title-icon-color);
            width: 19px;
            justify-content: center;
            align-items: center;
            text-align: center;  margin-left: 36px; padding: 5px;'> <a title='Delete' href='delete-process.php?prn=".$rows['prn']."' style='color: white;' > <i class='uil-archive-alt' class='delete'> </i> </a> </span>
          
            
             </td>
          </tr>";


       echo "</form>";
          $j++;
          $o++;
                }
            }
            
            ?>

                  

            </tbody>
          </table>

             







          <?php 
          $sql1="SELECT COUNT(*) AS toal_students FROM `student` WHERE batch = $batch";
          $sql2 = "SELECT COUNT(*) AS placed_students FROM `student` WHERE batch =  $batch AND status=1";
          $sql3 = "SELECT COUNT(*)AS not_placed FROM `student` WHERE batch =  $batch AND status=0";
          $result1=mysqli_query($conn,$sql1);
          $result2=mysqli_query($conn,$sql2);
          $result3=mysqli_query($conn,$sql3);
          $ro1=mysqli_fetch_assoc($result1);
          $ro2=mysqli_fetch_assoc($result2);
          $ro3=mysqli_fetch_assoc($result3);

          echo "<br><h6>Total Students:".$ro1['toal_students']."  </h6>  
                 <h6> Placed Students:".$ro2['placed_students']."  </h6> 
                 <h6> Not Placed Students:".$ro3['not_placed']."  </h6>";
?>



<!-- modal body(batch wise) complete here  -->
       <?php          
    echo "</div>";
       echo "<div class='modal-footer'>
                     <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                   </div>
                   
                 </div>
               </div>
             </div>
             
           "; $i=$i+1;
        }
        
   ?>

</div>






<br> <br>
<!-- latest student data   -->
            <table id="myTable">
            <thead>
              <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>Age</th>
                <th>PRN NO</th>
                <!-- <th>Roll No</th> -->
                <th>Email</th>
                <th>Contact No</th>
                <th>Status</th>
                <th>Batch</th>
                <th>Actions</th>
                
              </tr>
            </thead>
            <tbody>

            <?php  

             $uname = $_SESSION['username'];
            $sql = "SELECT * FROM `student` WHERE batch = (SELECT MAX(batch) FROM student)";
            $result = mysqli_query($conn , $sql);
            // echo var_dump($result);
            $num = mysqli_num_rows($result);
            
                $i = 0;
            if($num>0){
                while ($i<$num) {  
                $row = mysqli_fetch_assoc($result);
          //        echo "<br>".$row['fname'] . $row['lname'].$row['prn'].$row['sap'].$row['batch'].$row['contact'].$row['email'].$row['age'].$row['branch'].$row['cgpa'].$row['status']. "<br>" ;
                if($row['status'] == 0){
                  $status = '<a style="color:red;"> Not Placed </a>';
                }
                else{
                  $status= '<a style="color:green;"> Placed </a>';
                }
                $prn=$row['prn'];
          echo "<tr> 
                <td>".$row['fname']." ".$row['lname']."</td>
            <td>".$row['age']."</td>
            <td>".$row['prn']."</td>
            <td>".$row['email']."</td>
            <td>".$row['contact']."</td>
            <td>".$status."</td>
            <td>".$row['batch']."</td>
            <td> 
            
            <span style='    background-color: var(--primary-color);
            border-radius: 6px;
            color: var(--title-icon-color);
            width: 19px;
            justify-content: center;
            align-items: center;
            text-align: center;  margin-left: 6px; padding: 4px;'> <a style='color: white;' class='edit' title='Edit' data-toggle='modal' data-target='#myEditModal".$i."'> <i class=' uil-edit-alt'> </i> </a> </span>


            <span style='background-color: var(--primary-color);
            border-radius: 6px;
            color: var(--title-icon-color);
            width: 19px;
            justify-content: center;
            align-items: center;
            text-align: center;  margin-left: 36px; padding: 5px;'> <a title='Delete' href='delete-process.php?prn=".$row['prn']."' style='color: white;' > <i class='uil-archive-alt' class='delete'> </i> </a> </span>
          
            
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
                                      
                                        <form action='/miniproject_final/student_data.php' method='post'>
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

                            <?php
                               if($row['status'] == 1){ 
                                $sql4="SELECT * FROM `student_placed_info` WHERE `PRN` = '$prn'";
                                $result4 = mysqli_query($conn,$sql4);
                                $row4 = mysqli_fetch_assoc($result4);   ?>

                                <div class='input-field'>
                                <label>Placement Status</label>
                                <select name='status' required>
                                    <option value='1'>Placed</option>
                                </select>
                            </div>

                         </div>
                            </div>
                              <div class='details ID'>
                                
                               <div class='fields'>
                                        <div class='input-field'>
                                            <label>Company Name</label>
                                            <input type='text' placeholder='Company Name' value="<?php echo $row4['company']; ?>" name='company' >
                                        </div>
                                        <div class='input-field'>
                                            <label>Package</label>
                                            <input type='text' placeholder='Company Name' value="<?php echo $row4['package']; ?>"  name='package' >
                                        </div>
                                        <div class='input-field'>
                                            <label>Post</label>
                                            <input type='text' placeholder='Company Name' value=" <?php echo $row4['post'] ?> " name='post' >
                                        </div>
                           <?php    }

                                else {  ?>
                                    <div class='input-field'>
                                    <label>Placement Status</label>
                                    <select name='status' required>
                                        <option value='0'>Not Placed</option>
                                        <option value='1'>Placed</option>
                                    </select>
                                </div>
                                </div>
                                            </div>
                                              <div class='details ID'>
                                                
                                               <div class='fields'>
                                                        <div class='input-field'>
                                                            <label>Company Name</label>
                                                            <input type='text' placeholder='Company Name' name='company' >
                                                        </div>
                                                        <div class='input-field'>
                                                            <label>Package</label>
                                                            <input type='text' placeholder='Company Name' name='package' >
                                                        </div>
                                                        <div class='input-field'>
                                                            <label>Post</label>
                                                            <input type='text' placeholder='Company Name' name='post' >
                                                        </div> 
                                     <?php     }   ?>
                                                    
                                    
                                        
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

             <?php   $i++;
                }
            }

            
            
            ?>
            
              
              
            </tbody>
          </table>













          <?php 
          $sql1="SELECT COUNT(*) AS toal_students FROM `student` WHERE batch = (SELECT MAX(batch) FROM student)";
          $sql2 = "SELECT COUNT(*) AS placed_students FROM `student` WHERE batch =  (SELECT MAX(batch) FROM student) AND status=1";
          $sql3 = "SELECT COUNT(*)AS not_placed FROM `student` WHERE batch =  (SELECT MAX(batch) FROM student) AND status=0";
          $result1=mysqli_query($conn,$sql1);
          $result2=mysqli_query($conn,$sql2);
          $result3=mysqli_query($conn,$sql3);
          $ro1=mysqli_fetch_assoc($result1);
          $ro2=mysqli_fetch_assoc($result2);
          $ro3=mysqli_fetch_assoc($result3);

          echo "<br><h6>Total Students: ".$ro1['toal_students']."  </h6>  
                 <h6> Placed Students: ".$ro2['placed_students']."  </h6> 
                 <h6> Not Placed Students: ".$ro3['not_placed']."  </h6>";


}
?>



          

        


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