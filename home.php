<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/homepage.css"> -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   <style>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

        .navbar-nav {
            /* margin-left: 100px; */
            /* margin-left: auto; */
        }
        html{
    scroll-behavior: smooth;
}
p{
  font-family: 'Ubuntu', sans-serif;

}
    </style>
    <title>Dashboard</title>
</head>
<body>
    <!-- <div class="container">

        <div class="mainlogo">
          <img src="img/svkmlogo.png" alt="" width="350px" height="90px">
        </div>
        
        <div class="mainbar">
            <ul class="navbar">
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#">All trainings</a></li>
                <li>
                    <a href="#" class="dropdown">Login</a>
                    
                    <ul class="dropdown">
                        <li><a href="/miniproject_final/adminlogin.php">admin</a></li>
                        <li><a href="/miniproject_final/facultylogin.php">faculty</a></li>
                        <li><a href="/miniproject_final/studentlogin.php">student</a></li>
                    </ul>

                </li>
                <li><a href="#">Contact Us</a></li>
               <input type="text" placeholder="search" class="search-box"> 
            </ul>
        </div> 
        
    </div>
     <hr class="line"> -->



     <!-- <]navbar   me-auto  navbar-expand-lg bg-light-->
   
     <nav class="navbar navbar-expand-lg sticky-top text-right" style=" background-color: rgb(19, 33, 82);">
  <div class="container-fluid">
    <a class="navbar-brand bg-light text-light" href="#">  <img src="img/svkmlogo.png" alt="Logo" width="201" height="41" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler border border-light  text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-light"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-light fs-5 px-3" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light fs-5 px-3" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light fs-5 px-3" href="#contact">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light fs-5 px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" >
            <li><a class="dropdown-item text-light fs-6" href="adminlogin.php">Admin</a></li>
            <li><a class="dropdown-item text-light fs-6" href="facultylogin.php">Faculty</a></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item  text-light fs-6" href="studentlogin.php">Student</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled ">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex position-absolute  end-0" role="search">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success " type="submit"> <a href="home.php" class="text-light" style="text-decoration:none;"> Search </a> </button>
      </form>
    </div>
  </div>
</nav>






<!-- slideshow  -->
<br> <br>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slideshow1.jpeg" class="d-block img-fluid mx-auto" alt="..." style="height: 50%; width: 40%;">
    </div>
    <div class="carousel-item">
      <img src="img/slideshow2.jpeg" class="d-block img-fluid mx-auto" alt="..." style="height: 50%; width: 50%;">
    </div>
    <div class="carousel-item">
      <img src="img/slideshow3.jpeg" class="d-block img-fluid mx-auto" alt="..." style="height: 50%; width: 50%;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- <div id="slideshow">
        <div class="slide-wrapper">
        
            <div class="slide">
               
                    <img src="img/slideshow4.jpeg" alt="" srcset="" class="sliden1" width="880px" height="575px" >
                
            </div>
            <div class="slide">
               
                    <img src="img/slideshow2.jpeg" alt="" srcset="" class="sliden1" width="880px" height="575px">
                
            </div>
            <div class="slide">
                
                    <img src="img/slideshow3.jpeg" alt="" srcset="" class="sliden1" width="880px" height="575px">
                
            </div>
            <div class="slide">
                
                    <img src="img/slideshow1.jpeg" alt="" srcset="" class="sliden1" width="880px" height="575px">
                
            </div>
        </div>
    </div> -->
<br><br>
    <div class="welcome text-center" id="about">
        <h2>WELCOME TO TRAINING AND PLACEMENT CELL SVKM IOT DHULE</h2>
    </div>

    <div class="intro text-center">
        <h1>Introduction</h1>
    </div><hr class="intro1 text-center"> 
    <div class="para  m-5 p-3">
        <p>
            The institution has a full-fledged Training and placement cell in order to help students choose an appropriate career and improve their interactive skills.
        </p><br>
        <p>
            The Training & Placement cell train the students to meet the industry expectations.
        </p><br>
        <p>
            The Training and Placement cell consists of faculty members and students, who work towards providing
            Aptitude, Communication Skills and soft skill training, internships and final placements.
        </p><br>
        <p>
            Institution has a dedicated team which works throughout the year to provide better placement to all the students in their area of interest. The team is involved in various activities with an aim to achieve maximum placement.
        </p><br>
        <p>
            It provides a platform for students to make it to the best and reputed industries and operated with the primary objective of placing students in reputed companies even before they have completed their courses.
        </p>
    </div>

    <div class="intro text-center ">
        <h1>Vision</h1>
    </div><hr class="intro1" > 
    <div class="para m-5 p-3">
        <p>
            Training and Placement Cell at SVKM’s Institute of Technology intends an ideal interface between industry requirements and student aspiration, in that the right person for the right job is ensured.
        </p><br>
        <p>
            Making sure the industry benefits from the students in terms of taking up roles and responsibilities andcontributing to the growth of the organization.
        </p>
    </div>

    <div class="intro text-center">
        <h1>Mission</h1>
    </div><hr class="intro1" > 
    <div class="para m-5 p-3">
        <p>
            To ensure 100% placement assistance.
        </p><br>
        <p>
            To groom the students and make them aware of current scenarios of various industries.
        </p><br>
        <p>
            To maintain good liaison with the recruiters.
        </p><br>
        <p>
            To inculcate the quality of taking on industry challenges and emerging out as young leaders.
        </p><br>
        <p>
            To develop strong analytical and competitive skills.
        </p><br>
    </div>






    <!-- footer  -->
    <!-- Footer -->
    
<footer class="page-footer font-small blue pt-4" style="background-color: rgb(19, 33, 82);" id="contact">

<!-- Footer Links -->
<div class="container-fluid text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">

      <!-- Content -->
      <h5 class="text-uppercase text-light">Follow us on</h5>
      <!-- <p class="text-light">Here you can use rows and columns to organize your footer content.</p> -->
      <!-- <img src="img/svkmlogo.png" class="bg-light" width="201" height="50"> -->
       <!-- Facebook -->
       <a href="https://www.facebook.com/Svkmiot" class="fb-ic px-1">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x bg-light"> </i>
          </a>
          <!-- Twitter -->
          <!-- <a class="tw-ic px-1">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x bg-light"> </i>
          </a> -->
          <!-- Google +-->
          <a href="https://www.svkm-iot.ac.in/" class="gplus-ic px-1">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x bg-light"> </i>
          </a>
          <!--Linkedin -->
          <a href="https://in.linkedin.com/in/svkm-s-institute-of-technology-ba061b1a3" class="li-ic px-1">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x bg-light"> </i>
          </a>
          <!--Instagram-->
          <a href="https://www.instagram.com/svkmiotdhule/?hl=en" class="ins-ic px-1">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x bg-light"> </i>
          </a>
          <!--Pinterest-->
          <!-- <a class="pin-ic px-1">
            <i class="fab fa-pinterest fa-lg white-text fa-2x bg-light"> </i>
          </a> -->
    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

      <!-- Links -->
      <h5 class="text-uppercase text-light">Links</h5>

      <ul class="list-unstyled text-light">
        <li>
          <a href="#top" class="text-light" style="text-decoration:none;">Home</a>
        </li>
        <li>
          <a href="#about" class="text-light" style="text-decoration:none;">About</a>
        </li>
        <li>
          <a href="#contact" class="text-light" style="text-decoration:none;">Contact</a>
        </li>
        <li>
          <a href="credits.php" class="text-light" style="text-decoration:none;">Credits</a>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

      <!-- Links -->


      <!-- <h5 class="text-uppercase text-light">Links</h5>

      <ul class="list-unstyled">
        <li>
          <a href="#!">Link 1</a>
        </li>
        <li>
          <a href="#!">Link 2</a>
        </li>
        <li>
          <a href="#!">Link 3</a>
        </li>
        <li>
          <a href="#!">Link 4</a>
        </li>
      </ul> -->

    </div>


    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3 text-light">© 2022 Copyright:
  <a href="credits.php" class="text-light"> PSHT</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 
    
</body>
</html>