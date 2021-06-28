<?php 
      require_once('connexion.php')
     
	 
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>

    <title> Nouvel utilisateur </title>
<style>
  h2{
	 text-align: center;
  }
</style>
  
    <link rel="stylesheet" href="loccar_style.css" type="text/css">

</head>
<body>

 <div id="container">
   
     <form name="formAdd" action="" method="post" class="formulaire" enctype="multipart/form-data">
	  <h2>Créer un compte</h2>
	  
	  
	  <label><b>Nom d'utlisateur :</b></label>
	  <input type="text" placeholder="Taper votre nom d'utilisateur" name="txtlogin" required
	    class="zonetext">
   
      <label><b>Mot de Passe :</b></label>
	  <input type="password" placeholder="Le Mot de passe doit contenir au moins 3 caractères..." name="txtpw" required
	    class="zonetext">
		
		<label><b>Mot de Passe :</b></label>
	  <input type="password" placeholder="retaper votre mot de passe pour le confirmer" name="txtpw2" required
	    class="zonetext">
		
		 <label><b>E-mail :</b></label>
	  <input type="text" placeholder="Taper votre email" name="txtlmail" required
	    class="zonetext">
		
	 
	 <input type="submit" name="btnouve" value="Enregistrer" id="submit" class="submit">
	
	  <label style="text-align: center; color: #960406;">
	  <p class="text-right">
                   

                 
                    <a href="login.php">Connexion</a>
                </p>
	
	 
   
      	    <?php
			
			  

		  if(isset($_POST['btnouve']))
		  {   $email=$_POST['txtlmail'];
			  $Login=$_POST['txtlogin'];
			  $motPass=$_POST['txtpw'];
			  $repasse=$_POST['txtpw2'];
			  
			  
			  
			  if($motPass!=$repasse){ $erreur="Mots de passe non identiques!";
		
			         echo " Mots de passe non identiques!";
			      }
			  
				
			  if ( $select = mysqli_query($cnloccar, " SELECT * FROM utlisateurs WHERE email = '".$_POST['txtlmail']."'"))
				{   
				  if(mysqli_num_rows($select)) 
				        {
                        exit('Cette adresse email est déjà utilisé');
                         }
        

				}
				
				
				
				
				
			   if
			 ( $reqAdd="INSERT INTO utlisateurs(email,Login,motPass)
			      VALUES ('$email','$Login',md5('$motPass'))"){
				  
			   $resultat=mysqli_query($cnloccar,$reqAdd);
			   if($resultat)
			   {
				   echo "Félicitation, votre compte est crée";
			   }
			   else
			   {
				   echo "Echec de la creation";
			   }
			   }
		  }
 
		?>
		 </label>
   
 </form>
 
  </div>
   
 
 
 
 

</body>

</html>



