<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {  
  $login = false;
  $showError =false; 
  $num = 0;
  include 'partials/_dbconnect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  
  // $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND  `password` = '$password' ";
  $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `role`='admin' ";

  $result = mysqli_query($conn , $sql);
  $num = mysqli_num_rows($result);
      if($num==1){

        while($row = mysqli_fetch_assoc($result)){
          //verifying the password by checking hash of password
          if(password_verify($password , $row['password'])){
             $login = true;
                // on successful login start the session 
                
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $username;
               header("location:admin_dashboard.php");
          }   
          else{
              //  $showError = "Incorrect Password";
            echo "<script> alert('Incorrect Password') </script>";
           
          }           
        }
            
      }
  
  else{
    // $showError = "Invalid Credentials";
    echo "<script> alert('Invalid Credentials') </script>";
    

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
          <title>Sign In as Admin</title>
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link rel="stylesheet" type="text/css" href="css/lib.2.css">
          <link rel="stylesheet" type="text/css" href="css/light.css">
          <!-- misc-->
          <link rel="stylesheet" type="text/css" href="css/bootstrap5.css">
          <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">
          <!-- keep this disabled-->
          <script>WebSocket = undefined;</script>
        </head>


        <body data-theme="light" data-layout="fluid">
          <div class="main">
            <div class="container-fluid">
              <div class="row">
                <div class="py-2 text-center card"><img src="img/svkmlogo.png" style="width: 350px; height: 90px;" class="d-block mx-auto mb-2">
                    <h2>Placement Datalog</h2>
                  </div>
              </div>
            </div>
            <main class="content">
              <div class="container-fluid"><div class="row justify-content-center wfid_temp37494906370" > 


                 <!-- form  -->
                 
                <div class="col-md-3 wfid_temp37494906434" ><div class="card wfid_temp37494906498" ><div class="card-header wfid_temp37494906562" >
                  <h5 class="card-title mb-0 wfid_temp37494906626 h5" >Sign In As Admin</h5></div><div class="card-body wfid_temp37494906690" >
                    <div class="wfid_panel_itxlogin wfid_temp37494906754" ><div class="wfid_temp37494906818" >
                      <div class="row wfid_temp37494906882" ><div class="mb-3 col-sm-12 wfid_temp37494906946" >
                      
                      <form action="/miniproject_final/adminlogin.php" method="post"> 
                        <label class="form-label text-muted text-sm mb-1 wfid_temp37494907010 nitrogen_label" >Username *</label>
                        <input type="text" autocomplete="off" class="form-control wfid_username wfid_temp37494907074 textbox" placeholder="Username" name="username" value="" required/>
                        
                        <label class="form-text wfid_temp37494907138 nitrogen_label" ></label></div><div class="mb-3 col-sm-12 wfid_temp37494907202" >
                          <label class="form-label text-muted text-sm mb-1 wfid_temp37494907266 nitrogen_label" >Password *</label>
                          <input type="password" autocomplete="off" class="form-control password wfid_password_bcrypt wfid_temp37494907330 textbox" placeholder="Password" name="password" value="" required/>
                                       
                          <label class="form-text wfid_temp37494907394 nitrogen_label" ></label></div></div>
                          <button type="submit" class="btn btn-primary ">Login</button>
                          <!-- <input type="button" value="Login as Admin" class="btn btn-sm btn-danger-outline btn-outline-danger wfid_login wfid_temp37494907458 button" /></div> -->
                          <div class="mycenter wfid_temp37494907522" ><div class="wfid_temp37494907586" ><a href="/itx_recover_account" class="btn btn-link wfid_temp37494907650 link"  data-ajax="false">Forgot Password</a></div></div></div></div></div></div></div></div>
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
</body>
</html>