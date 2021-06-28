<?php require_once('connexion.php') ?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Car Rental Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
	<style>
  .myphoto{
	  width:  28px; height:  28px; border-radius: 50%;border: 1px solid;
	 
  
 </style>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Car Rental <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 
                 
				 
				 
                <li class="nav-item"><a class="nav-link" href="fleet.html">Fleet</a></li>
                <li class="nav-item"><a class="nav-link" href="offers.html">Offers</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="blog.html">Blog</a>
                      <a class="dropdown-item" href="team.html">Team</a>
                      <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                      <a class="dropdown-item" href="terms.html">Terms</a>
                    </div>
                </li>

                <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
				
				
					 <li>
				 <a  class="nav-link" href="index.html">
				 <?php 
				 
	  session_start();
	  echo  $_SESSION['monLogin'];
	  $req="select * from utlisateurs where Login='".$_SESSION['monLogin']."'";
	  $resultat=mysqli_query($cnloccar,$req);
	  $ligne=mysqli_fetch_assoc($resultat);
	  
	  ?>
	   <img src="<?php echo $ligne['my_photo'];?>" class="myphoto">
			</a>	 </li>
                
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
	  </header>
	   <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Find your car today!</h4>
            <h2>Lorem ipsum dolor sit amet</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Fugiat Aspernatur</h4>
            <h2>Laboriosam reprehenderit ducimus</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Saepe Omnis</h4>
            <h2>Quaerat suscipit unde minus dicta</h2>
          </div>
        </div>
      </div>
    </div>
	
	
    <!-- Banner Ends Here -->
	
	<?php
    $reqselect="select * from automobile ORDER BY prix_loc DESC LIMIT 3";
	$resultat=mysqli_query($cnloccar,$reqselect);
	
	$nbr=mysqli_num_rows($resultat);
	echo "<p>Total <b> ".$nbr." </b> Voitures...</p>";
  
  ?>
	
	 <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Offers</h2>
              <a href="offers.html">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        
	
	
	  <?php
	 while ($ligne=mysqli_fetch_assoc($resultat))
	 {
		 
	
	?>
	<div class="col-md-4">
            <div class="product-item">
	  
	 <img src='<?php echo $ligne['photo'];?>' class="photocar" >
	 
	<div class="down-content">
	 <?php echo $ligne['marque']; ?>
	 <h6><small>from</small> <?php echo $ligne['prix_loc']; ?>£ <small>per weekend</small></h6>
	 
	 </div>
	  
	  </div>
	  </div>
	  <?php
	}
	?>
	     <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
	
	
	  </body>
	  </html>