<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" type="text/css" href="css/index.css">
   <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>CS@D</title>
</head>
<body>
	<!--Start Navigation-->
	<nav>
		<a href="index.php">CS@D</a>
		<span class="navbar-text">Customer's Happiness is our Aim</span>
    <label for="btn" class="icon">
    <span class="fa fa-bars"></span>
    </label>
  <input type="checkbox" class="hide" id="btn">
		<div class="links">
		   	<ul class="ul-link">
		   		<li class="nav-item"><a href="index.php">Home</a></li>
		   		<li class="nav-item"><a href="#Services">Services</a></li>
		   		<li class="nav-item"><a href="Requester/UserRegistration.php">Registration</a></li>
		   		<li class="nav-item"><a href="Requester/RequesterLogin.php">Login</a></li>
		   		<li class="nav-item"><a href="Requester/viewtechnician.php">Technician Profile</a></li>
		   		<li class="nav-item"><a href="#ContactUs">Contact Us</a></li>
		   	</ul>
		</div>
	</nav>
  <script>
  $('.icon').click(function(){
    $('.fa').toggleClass("cancel");
  });
</script>
	<!--End Navigation-->
	<!-- Start Header-->
	<header class="back-image" style="background-image: url(images/Banner1.jpeg);">
		<div>
			<h1 class="wellmsg">WELCOME TO CS@D</h1>
			<p class="font-italic">Customer's Happiness is our Aim</p>
			<button type="button" class="btn1"><a href="Requester/RequesterLogin.php">Login</a></button>
			<button type="button" class="btn2"><a href="Requester/UserRegistration.php">Sign Up</a></button>
		</div>
	</header>
	<div class="container">
    <!--Introduction Section--><br>
    <div class="services">
      <h2 class="text-center">CS@D Services</h2>
      <p class="p">
        CS@D Services is India’s leading chain of multi-brand Electronics and Electrical service
        work offering
        wide array of services to the customer at their doorsteps(home,office,etc). We focus on enhancing your uses experience by offering world-class
        Electronic
        Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
        services to
        keep the devices fit and healthy and customers happy and smiling”.

        With well-equipped Electronic Appliances service, fully trained technician and they are experted in there work, we
        provide quality
        services with excellent packages that are designed to offer you great savings.

        Our state-of-art work are conveniently functioning in many cities across the country. Now you
        can book
        your service online by doing Registration.
      </p>
    </div>
    </div>  
      <!-- Start Services -->
  <div class="container text-center border-bottom" id="Services">
  	<br>
	<br>
	<br>
    <h2 class="text-center">Our Services</h2>
    <div class="row mt-4">
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
        <h4 class="mt-4">Electronic Appliances</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
        <h4 class="mt-4">Preventive Maintenance</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
        <h4 class="mt-4">Fault Repair</h4>
      </div>
    </div>
  </div> <!-- End Services -->
  <!-- Start Happy Customer  -->
  <div class="services bg-danger" id="Customer">
    <!-- Start Happy Customer Jumbotron -->
    <div class="container">
      <!-- Start Customer Container -->
      <h2 class="text-center text-white">Happy Customers</h2>
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar12.jpg" class="img-fluid" class="img-fluid" width="200px" height="200px" style="border-radius: 50%;">
              <h4 class="card-title">Achal Gupta</h4>
              <p class="card-text">Nice Work.</p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar11.jpg" class="img-fluid" class="img-fluid" width="200px" height="200px" style="border-radius: 50%;">
              <h4 class="card-title">Heenal Mewada</h4>
              <p class="card-text">Good Working</p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar13.jpg" class="img-fluid" class="img-fluid" width="200px" height="200px" style="border-radius: 50%;">
              <h4 class="card-title">Altamash</h4>
              <p class="card-text">Awesome Work And</p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar14.jpg" class="img-fluid" width="200px" height="200px" style="border-radius: 50%">
              <h4 class="card-title">Pratik</h4>
              <p class="card-text">Excellent Work</p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->
      </div> <!-- End Customer Row-->
    </div> <!-- End Customer Container -->
  </div> 
    <div class="container" id="ContactUs">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
       <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

         <div class="text-center col-md-4">
           <!- Start Contact Us 2nd Column->
           <strong>Headquarter:</strong> <br>
           CS@D Pvt Ltd, <br>
           Narayan Nagar Ghatkopar <br>
           Mumbai - 400086 <br>
           Phone: +91 8097258967 <br>
           <a class="a" href="#" target="_blank">www.CS@D.com</a> <br>

           <br><br>
           <strong>Mumbai Branch:</strong> <br>
           CS@D Pvt Ltd, <br>
           Ashok Nagar, Mumbai <br>
           Mumbai - 400072 <br>
           Phone: +91 9702764824 <br>
           <a class="a" href="#" target="_blank">www.CS@D.com</a> <br><br>
         </div> 
        </div> 
      </div>
       <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us: </span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->

        <div class="col-md-6 text-right">
          <!-- Start Footer 2nd Column -->
          <small> Designed by CS@D &copy; 2021.
          </small>
          <small class="ml-2"><a 
           class="a" href="Admin/login.php">Admin Login</a></small>
          <small class="ml-2"><a 
           class="a" href="Technician/login.php">Tachnician Login</a></small> 
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->
</body>
</html>