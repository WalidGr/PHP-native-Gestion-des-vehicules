<?php require_once('connexion.php') ?>
<!doctype html>
<html>
 <head
 <meta charset="UTF-8">
 <title> Tableau de bord...</title>
  <link rel="stylesheet" href="loccar_style.css" type="text/css">
 </head>
 
 <body>
  <p><h1><b>liste des voitures...</b></h1>
 
  <?php
    $reqselect="select * from automobile";
	$resultat=mysqli_query($cnloccar,$reqselect);
	
	$nbr=mysqli_num_rows($resultat);
	echo "<p>Total <b> ".$nbr." </b> Voitures...</p>";
  
  ?>
  </p>
  <p><a href ="ajouter.php"><img src="images\icone\ajouter.png" width="50px" ></a></p>
 
  <table width="100%" border="1">
    
	<tr>
	  <th>immatriculation</th>
	  <th>Marque</th>
	  <th>Prix de Location</th>
	  <th>Photo</th>
	  <th>Supprimer</th>
	  <th>Modifier</th>
	
	</tr>
	
	<?php
	 while ($ligne=mysqli_fetch_assoc($resultat))
	 {
		 
	
	?>
	
	<tr>
	 <td><?php echo $ligne['imm']; ?></td>
	 <td><?php echo $ligne['marque']; ?></td>
	 <td><?php echo $ligne['prix_loc']; ?></td>
	 <td><img src='<?php echo $ligne['photo'];?>' class="photocar" ></td>
	 <td><a href="supprime.php?supcar=<?php echo $ligne['imm']; ?>"><img src="images\icone\supprimer.png" 
	 width="50px" height="50px"></a></td>
	 <td><a href="modifier.php?mod=<?php echo $ligne['imm']; ?>"><img src="images\icone\modifier.png"
	 width="50px" height="50px"></a></td>
	</tr>
	
	<?php
	}
	?>
  
  </table>
 </body>
 </html>