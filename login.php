<?php require_once('connexion.php') ?>
<!doctype html>
<html>
 <head
 <meta charset="UTF-8">
 <title> </title>
  <style>
  p{
	text-align: center;
}
  
 </style>
 <link rel="stylesheet" href="loccar_style.css" type="text/css">
 </head>
 <body>
 
   <div id="container">
   
     <form action="" method="post" class="formulaire">
	  <h1>Connexion</h1>
	  <label><b>Nom d'utlisateur :</b></label>
	  <input type="text" placeholder="Entrer le nom d'utlisateur" name="txtlogin" required
	    class="zonetext">
   
      <label><b>Mot de Passe :</b></label>
	  <input type="password" placeholder="Entrer le mot de passe" name="txtpw" required
	    class="zonetext">
		
	 <input type="submit" name="btlogin" value="LOGIN" id="submit" class="submit">
	  <p class="text-right">
                    <a href="">Mot de passe Oublié ?</a>

                    &nbsp &nbsp

                    <a href="nouvelUtilisateur.php">Créer un compte</a>
                </p>
   
    <?php
	if(isset($_POST['btlogin']))
	{
		$req="select * from utlisateurs where Login='".$_POST['txtlogin']."' and 
		motPass='".$_POST['txtpw']."'";
		if($resultat=mysqli_query($cnloccar,$req))
		{
			$ligne=mysqli_fetch_assoc($resultat);
			if($ligne!=0){
				session_start();
				$_SESSION['monLogin']=$_POST['txtlogin'];
				header("location:accuiel.php");
		}
		else{
			echo "<font color='#F0001D'> Login ou mot de passe est invalide </font>";
		 }
	}
	}
	?>
   
 </form>
 
  </div>
   
 
 
 
 
 
 
 
 </body>
 </html>