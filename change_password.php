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
        $showAlert = false;
        $showError =false; 
        $num = 0;
        include 'partials/_dbconnect.php';
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $username=$_SESSION['username'];
    
        if( $password == $cpassword ) {
            $hash = password_hash($password , PASSWORD_DEFAULT);

            $sql = "UPDATE `users` SET `password`='$hash'  WHERE `username`='$username' ";
            $result = mysqli_query($conn,$sql);
            if($result){
                // $showAlert = true;
                echo "<script> alert('password changed successfullly')  </script>";
            }
        }
        // elseif($num>0){
        //     $showError = "Username already exists try using other usrename";
        // }
        else{
        //   $showError = "Password do not match";
        echo "<script> alert('password do not match')  </script>";
            
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
        <li><a href='#'>
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
        <li><a href='#'>
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


          <div class="main" style="left: 250px;">
            <div class="container-fluid" style="width: 40%;">
              <div class="row">
                <div class="py-2 text-center card" style="
    background-color: transparent;
    box-shadow: 0 0 0.875rem 0 rgb(33 37 41 / 55%);
">
                    <img src="img/svkmlogo.png" style="width: 350px; height: 90px;" class="d-block mx-auto mb-2">
                    <h2>Placement Datalog</h2>
                  </div>
              </div>
            </div>

            <main class="content">
              <div class="container-fluid"><div class="row justify-content-center wfid_temp37494906370" > 


                 <!-- form  -->
                 
                <div class="col-md-3 wfid_temp37494906434" ><div class="card wfid_temp37494906498" ><div class="card-header wfid_temp37494906562" >
                  <h5 class="card-title mb-0 wfid_temp37494906626 h5" >Change Password</h5></div><div class="card-body wfid_temp37494906690" >
                    <div class="wfid_panel_itxlogin wfid_temp37494906754" ><div class="wfid_temp37494906818" >
                      <div class="row wfid_temp37494906882" ><div class="mb-3 col-sm-12 wfid_temp37494906946" >
                      
                      <form action="/miniproject_final/change_password.php" method="post"> 
                        <label class="form-label text-muted text-sm mb-1 wfid_temp37494907010 nitrogen_label" >Create New Password *</label>
                        <input type="text" autocomplete="off" class="form-control wfid_username wfid_temp37494907074 textbox" placeholder="Create New Password" name="password" value="" required/>
                        
                        <label class="form-text wfid_temp37494907138 nitrogen_label" ></label></div>
                        
                        <div class="mb-3 col-sm-12 wfid_temp37494907202" >
                          <label class="form-label text-muted text-sm mb-1 wfid_temp37494907266 nitrogen_label" >Confirm New Password *</label>
                          <input type="password" autocomplete="off" class="form-control password wfid_password_bcrypt wfid_temp37494907330 textbox" placeholder="Confirm New Password" name="cpassword" value="" required/>
                          <label class="form-text wfid_temp37494907394 nitrogen_label" ></label></div></div>

                           

                          
                           <label class="form-text wfid_temp37494907394 nitrogen_label" ></label></div></div>


                          <button type="submit" class="btn btn-primary ">Change Password</button>
                    </form>


            </main>
            <div id="myModal" tabindex="-1" aria-modal="true" role="dialog" style="z-index: 2000;" class="modal fade">
              <div role="document" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary">Close</button>
                  </div>
                  <div class="modal-body m-3">
                    <p class="mb-0"></p><div class="modal-body wfid_myModalBody wfid_temp37494907714" ></div>
                  </div>
                </div>
              </div>
            </div>
           </div>

<?php   }  ?>     

          <script type="text/javascript" charset="utf-8" src="C:\VS Code\Miniproject\js\lib.2.js"></script>
          <script type="text/javascript" charset="utf-8" src="C:\VS Code\Miniproject\js\app.js"></script>
          <script type="text/javascript" charset="utf-8" src="C:\VS Code\Miniproject\js\datatables.min.js"></script>
          <script type="text/javascript" charset="utf-8" src="C:\VS Code\Miniproject\js\bootstrap-datepicker.min.js"></script>
          <script>Nitrogen.$set_param('pageContext', 'vF6aqFZ9HbQk5h9Zjs7R4EgQukalqQd0biLMjFmY_wMt0zn-LTpVfazBd8TasfLoTD4C4pB0tYDjgoWCxfFHQ9KpnFOAyZIKJ6uTXdPO-hpjeXHgW1q0cO_IMpqy9QsfwB9h0_33QkUAib9cawB422-csS6phD1LDRrNiM7IBH1iKDPicRmtyRHpB0TH6oJE5J45wHoAOBqvNM89DunO90qIEzyG5Ws8uIBeddoGoDqCYx0dbgPAJOUnARFHnwvpLM6B3pr0pnqFflq0aSxsbE3z5A3l5OA4XF6TrMCyV-hyJTudfRgy3rO5iX_YcVnQkjUnGGX_rcQurf_TBrDTfW-S04cq2PLPIVwp2P6AkYQDnZHeSKzrC106wNP9UVFxb24-n_18uR6HXcB81jcO4m0dnaBDdi7U58QomOf-IuPoWTMQMwu9mo4RZMgchnXOXClxef8qjZ3CsCPlx4Um3IonC8bVQEa6P-PjfUy8iy7OAK9V9TO_R6pTge3xZ62zyK0yl-yqeSSVuQk7G15CAWvxkyHYqK_8hNaP43dccx1mu31IfZgPvHTKm5MaqpP3afWIuPnHxK5QBhWvUWJdDhpKW3SUt-iQQMLNgZ_1qn4enRQmWsxxp7dvEw6T0avSjJCD-Aec0cUIglqdE_Y1D_eqIqeLIDbCj3hm4D6roiVmJM9zmH4i3R7P-3ODzAhbb4_9JNE7YAKtp7xiNP6k-Dqxr8kVuH_eBYETLTWWsc5HTv-Jvp9jS8dObSgenkTPoNCEz95i27wVaJEmrS54gX-MOhaBK7TWoMGWcZkqssjUKK60fs9slIHWGBIpayhJQWe66ZWDlvpdvqt4HPBu2Gt5pVZ1xNRX9s5luk4VgpAsn_SHNKqBl2OcP2iZvkO9vBU2WriyjnUr7o_MXpTZEJtrpcWmV9CSBQ3pERK4kY_Eada7rm7t31qjlDYqgX0WBA59b7UPyWaA5x7wHzpT9tAEJ-px61wWBGQC5a1ED9HnawasWsLDzYkwFBevtNyHgRNda6GgnfqxOCeYCtvOfo7FaXD7tcVg_KZP_BUhuryqoiL0MXx0QtHxv0AzZclQWQZENnmdLAU99oovH00OCiEvsW-pxb03Je_Xetj5t3MQ1OFbsPS2u5xGN_sGOvai5337Ms6kDIdjFATu6s_Vqlv4LyG4zAvB78soyuJam3n8uoESzPcEdmPwO1QB05w1XjF-0QS2sDIlT8jJEV3Z7DTJlq8VZr9hTWhQXqVBiLaVjg7BjG-EWNJACx7iXb_l5HztVAWaQWhg3kSWtaaxTNKxL_iOyI5LwyMwE_JMjbfmRzY7T274RH9E7_1Nu55MzKe1DUjd0LrzzK_94T93jbH7oVQVjPV_qAokoSl2_YERNGUl');
      
      Nitrogen.$anchor('page', '.wfid_username');document.temp37494907778 = function() {
      Nitrogen.$anchor('page', '.wfid_username');
      Nitrogen.$anchor('page', '.wfid_username');var v = Nitrogen.$add_validation(obj('.wfid_username'), { validMessage: " ", onlyOnBlur: true, onlyOnSubmit: false });v.group = '.wfid_login';};setTimeout("document.temp37494907778(); document.temp37494907778=null;", 100);
      Nitrogen.$anchor('page', '.wfid_password_bcrypt');document.temp37494907842 = function() {
      Nitrogen.$anchor('page', '.wfid_password_bcrypt');
      Nitrogen.$anchor('page', '.wfid_password_bcrypt');var v = Nitrogen.$add_validation(obj('.wfid_password_bcrypt'), { validMessage: " ", onlyOnBlur: true, onlyOnSubmit: false });v.group = '.wfid_login';};setTimeout("document.temp37494907842(); document.temp37494907842=null;", 100);
      Nitrogen.$anchor('page', 'page');obj('username').focus(); obj('username').select();
      Nitrogen.$anchor('.wfid_temp37494907330', '.wfid_temp37494907330');Nitrogen.$observe_event('.wfid_temp37494907330', '.wfid_temp37494907330', 'keydown', function(event) {if (Nitrogen.$is_key_code(event, 13, false)) { 
      Nitrogen.$anchor('.wfid_temp37494907330', '.wfid_temp37494907330');Nitrogen.$queue_event('.wfid_password_bcrypt', null, 'P4DjTVBzgkLBcn_rlhSHu8W6ky7setB-hojvxPBt3Z2Xo5E_v5vNU9iqInQWu6Mv-xIuOJ-NnVJ0RbNngUffh6LG2CfueywtAnNN-uzcVAQQDRHnJjamSk7txWxhABw4iufPOsA4HSfEnBI8QWihTFmtEFj_gNrBw6D-N8yplm2R4P1v851nRp4I6Oa_6tpc6IPls_Bvq3jk3LnTgSzQvKlbTxcUbjxAwXfvtjdQk5DGUhVp', undefined);return false;}});
      Nitrogen.$anchor('.wfid_temp37494907458', '.wfid_temp37494907458');Nitrogen.$observe_event('.wfid_temp37494907458', '.wfid_temp37494907458', 'click', function(event) {
      Nitrogen.$anchor('.wfid_temp37494907458', '.wfid_temp37494907458');Nitrogen.$queue_event('.wfid_login', function(){
      Nitrogen.$anchor('.wfid_temp37494907458', '.wfid_temp37494907458');window.alert("Validation errors. Please verify entered data.");}, '-9trVqMPjjBT6AtRE47K15DSJRWeAFGkSkmNn-uArztD-Q43mYnHeb9nTQgzg7Uk-_g1MCixgJxGCA4VdHojRiKU6onYyto9njlAaJIxU-DYqUHoROHZ3-cHg1Tm1i0mi6BY9WTEOThBUP4qzMS1Ki7raN_9OlRBrQlQFnWz-aT3BtZMNapQa5pU-Xm08s0uJubwbFcViqrbyH3YDTYr5dVDZ7I', undefined);});</script>
          <script>
          $('.btn-primary-outline').addClass('btn-outline-primary').removeClass('btn-primary-outline');
          $('.btn-danger-outline').addClass('btn-outline-danger').removeClass('btn-danger-outline');
          $('.btn-secondary-outline').addClass('btn-outline-secondary').removeClass('btn-secondary-outline');
          $('.btn-warning-outline').addClass('btn-outline-warning').removeClass('btn-warning-outline');
          $('.btn-info-outline').addClass('btn-outline-info').removeClass('btn-info-outline');
          $('.pull-sm-right').addClass('float-sm-end').removeClass('pull-sm-right');
          $('.font-weight-bold').addClass('fw-bold').removeClass('font-weight-bold');
      </script>

</div>
<script src="js/script.js"></script>
</body>
</html>