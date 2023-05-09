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
        echo "button submit";
        include 'partials/_dbconnect.php';
        $cname = $_POST['cname'];
        $link = $_POST['link'];     
        $criteria = $_POST['criteria'];

        $uname=$_SESSION['username'];

     
            $sql = "INSERT INTO `company`(`company_name`, `cgpa_criteria`, `link`) VALUES ('$cname','$criteria','$link') ";
            $result = mysqli_query($conn , $sql);
            if($result){
                echo "<script> alert('updated') </script>";
            }
            else{
                echo "<script> alert('fail to update') </script>";
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



     <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/add_style.css">
     
     <!----===== Iconscout CSS ===== -->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">



          <!-- keep this disabled-->
          <script>WebSocket = undefined;</script>
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
                <i class=' uil-building'></i>
                <span class='text'>Add Company</span>
            </div>
          


            <div class='container'>
        <header>Add Company</header>

        <form action="/miniproject_final/add_company.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Company Name</label>
                            <input type="text" placeholder="Enter company name" name="cname" required>
                        </div>

                        <div class="input-field">
                            <label>Link</label>
                            <input type="text" placeholder="Enter company link" name="link" required>
                        </div>
                        <div class="input-field">
                            <label>Criteria</label>
                            <input type="number" placeholder="Enter criteria" name="criteria" required>
                        </div>
                        
                  <div class="details ID">
                    <span class="title"></span>
                   <div class="fields">

                    <button class="nextBtn" type="submit">
                        <span class="btnText">Add Company</span>
                        <i class=" uil-user-plusk"></i>
                    </button>
                </div> 
            </div>

            
        </form>
      
    </div>
               
    <br>
    <table id="myTable">
            <thead>
              <tr>
                <!-- <th>ID</th> -->
                <th>Company Name</th>
                <th>CGPA Criteria</th>
                <th>link</th>
                
              </tr>
            </thead>
            <tbody>

            <?php  
             include 'partials/_dbconnect.php';

             $uname = $_SESSION['username'];
            $sql = "SELECT * FROM `company`";
            $result = mysqli_query($conn , $sql);
            // echo var_dump($result);
            $num = mysqli_num_rows($result);
            
                $i = 0;
            if($num>0){
                while ($i<$num) {  
                $row = mysqli_fetch_assoc($result);

          echo "<tr> 
                <td>".$row['company_name']."</td>
            <td>".$row['cgpa_criteria']."</td>
            <td>  <a href='".$row['link']."'> apply link </a>  </td>" ; 
                $i++;
                }
            }

        }  
        
            
              
              ?>
            </tbody>
          </table>
</div>




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


