<?php

function rechercher_par_login($Login){
    global $cnloccar;
    $requete=$cnloccar->prepare("select * from 	utlisateurs where Login =?");
    $requete->execute(array($Login));
    return $requete->rowCount();
}

function rechercher_par_email($email){
    global $cnloccar;
    $requete=$cnloccar->prepare("select * from 	utlisateurs where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}

function rechercher_user_par_email($email){
    global $cnloccar;

    $requete=$cnloccar->prepare("select * from 	utlisateurs where email =?");

    $requete->execute(array($email));

    $user=$requete->fetch();

    if($user)
        return $user;
    else
        return null;
}
