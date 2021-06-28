<?php require_once('connexion.php') ?>
<!doctype html>
<html>
 <head
 <meta charset="UTF-8">
 <title> ajouter voitures...</title>
  <link rel="stylesheet" href="loccar_style.css">
 </head>
 
 <body>
  <div id="container">
     <form name="formAdd" action="" method="post" class="formulaire" enctype="multipart/form-data">
     <H2 align="center">Ajouter Nouvelle Voiture...</H2>
	 
	 <label><b>Immatriculation :</b></label>
	 <input type="text" name="txtimm" class="zonetext" placeholder="Entrer Immatriculation" required>
	 
	 <label><b>Marque :</b></label>
	 <input type="text" name="txtmarque" class="zonetext" placeholder="Entrer Marque" required>
	 
     <label><b>Prix de Location:</b></label>
	 <input type="text" name="txtpl" class="zonetext" placeholder="Entrer Le Prix Unitaire" required>
	 
     <label><b>Photo :</b></label>
	 <input type="file" name="txtphoto" class="zonetext" placeholder="Choisir une image" required>
	 
	  <input type="submit" name="btadd" value="Ajouter" class="submit">
	  <p><a href="accuiel.php" class="submit">Tableau de Bord</a></p>
	    
	  <label style="text-align: center; color: #960406;">
	  
	    <?php
		
		  if(isset($_POST['btadd']))
		  {
			  $imm=$_POST['txtimm'];
			  $marque=$_POST['txtmarque'];
			  $prixloc=$_POST['txtpl'];
			  $image=$_FILES['txtphoto']['tmp_name'];
			  $traget="images/".$_FILES['txtphoto']['name'];
			  move_uploaded_file($image,$traget);
			  
			  $reqAdd="INSERT INTO automobile(imm,marque,prix_loc,photo)
			      VALUES ('$imm','$marque','$prixloc','$traget')";
				  
			   $resultat=mysqli_query($cnloccar,$reqAdd);
			   if($resultat)
			   {
				   echo "Insertion des  données validés";
			   }
			   else
			   {
				   echo "Echec d'Insertion des données";
			   }
		  }
		
		?>
	  
	   
	  </label>
	  </form>
  </div>
 
 
 
 
 
 </body>
 </html>
 