<?php require_once('connexion.php') ?>
<!doctype html>
<html>
 <head
 <meta charset="UTF-8">
 <title> Location CAR...</title>
 
 <style>
  .myphoto{
	  width: 50px; height: 50px; border-radius: 50%;border: 1px solid;
  }
  
 </style>
 
 <link rel="stylesheet" href="loccar_style.css" type="text/css">
 </head>
 
 <body>
 
  <div id="globl">
     <div id="profil">
	  <?php 
	  session_start();
	  echo "Bonjour et Bienvenue ".$_SESSION['monLogin']."<br>";
	  $req="select * from utlisateurs where Login='".$_SESSION['monLogin']."'";
	  $resultat=mysqli_query($cnloccar,$req);
	  $ligne=mysqli_fetch_assoc($resultat);
	  
	  ?>
	  <img src="<?php echo $ligne['my_photo'];?>" class="myphoto">
	  
	  <br>
	  <a href="deconnecter.php">Deconnection</a>
	</div>
	
	 <div id="tableaubord">
	  <?php include("tableaubord.php") ?>
	 
	 </div>
  
  
  </div>
 </body>
 </html>