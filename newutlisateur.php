<?php

   session_start();
   @$Login=$_POST["Login"];

   @$email=$_POST["email"];
   @$motPass=$_POST["motPass"];
   @$repass=$_POST["repass"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($Login)) $erreur="Nom laissé vide!";
     
      elseif(empty($email)) $erreur="email laissé vide!";
      elseif(empty($motPass)) $erreur="Mot de passe laissé vide!";
      elseif($motPass!=$repass) $erreur="Mots de passe non identiques!";
      else{
         include("connexion.php");
         $sel= $cnloccar -> prepare("select id from utlisateurs where email=? limit 1");
         $sel->execute();
		 echo "$email";
         $tab=$sel->fetch();
         if(count($tab)=== 0)
            $erreur="email existe déjà!";
         else{
            $ins=$cnloccar->prepare("insert into utlisateurs(Login,email,motPass) values(?,?,?)");
            if($ins->execute(array($Login,$email,md5($motPass))))
               header("location:login.php");
         }   
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
      </style>
   </head>
   <body>
      <h1>Inscription</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="Login" placeholder="Nom" value="<?php echo $Login?>" /><br />
        
         <input type="text" name="email" placeholder="email" value="<?php echo $email?>" /><br />
         <input type="password" name="motPass" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" />
      </form>
   </body>
</html>