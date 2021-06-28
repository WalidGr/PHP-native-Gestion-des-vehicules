<?php require_once('connexion.php');?>
<!DOCTYPE html>
<html lang="fr">
 <head
  <meta charset="UTF-8">
 <title> </title>
 
 <link rel="stylesheet" href="loccar_style.css" type="text/css">


 </head>
 <body>
  <div id="entete">
   <a href="login.php" class="login">Login</a>
     <video autoplay="autoplay loop , fullscreen" class="video_entete">
	   <source src="images/loc.mp4" type="video/mp4" />
	 </video>
	  <p class="nomsite">Location CAR</p>
	  <div id="formauto">
        <form name="formauto" method="post" action="">
	    <input id="motcle" type="text" name="motcle" placeholder=" Recherche par Marque..." />
	    <input class="btfind" type="submit" name="btsubmit" value="Recherche" />
	    </form>
       </div>
 </div>
 <div id="articles">
<?php 
  if(isset($_POST['btsubmit'])){
  $mc=$_POST['motcle'];
  $reqSelect="select * from automobile where marque like'%$mc%'";
}
else{
$reqSelect="select *from automobile";
}
  $resultat=mysqli_query($cnloccar,$reqSelect);
  $nbr=mysqli_num_rows($resultat);
  echo " <p> <b>".$nbr."</b> Resultats de votre recherche...</p>";
  while($ligne=mysqli_fetch_assoc($resultat))
  {
 ?>
 <div id="auto">
   <img src="<?php echo $ligne['photo'] ?>" /> <br>
     <?php echo $ligne['imm'];?><br>
    <?php echo $ligne['marque'];?><br>
    <?php echo $ligne['prix_loc'];?><br>
 
   
 </div>
 <?php } ?>
  </div>
 </body>
</html>