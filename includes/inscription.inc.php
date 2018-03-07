<h1>page inscription</h1>
<?php
if (isset($_POST['frmInscription']))
{
    $nom=(isset($_POST['nom']) ? $_POST['nom'] : "");
//    $nom=$_POST['nom'] ?? "";   php 7 uniquement
    $prenom = $_POST['prenom'] ?? "";
    $mail = $_POST['mail'] ?? "";
    $mdp = $_POST['mdp'] ?? "";

    $erreurs = array(); //initialisation d'un tableau vide
    if ($nom=="") array_push($erreurs,"Merci de saisir un nom");  // on peut séparer les entrées par , ==> plusieurs entrées dans le tableau
    if ($prenom=="") array_push($erreurs,"Merci de saisir un prénom");
    if ($mail=="") array_push($erreurs,"Merci de saisir une adresse mail");
    if ($mdp=="") array_push($erreurs,"Merci de saisir un mot de passe");
    if (count($erreurs)>0)
    {
        $messageErreur="<ul>";
        for ($i=0;  $i< count($erreurs); $i++)
        {
            $messageErreur .= "<li>";
            $messageErreur .= $erreurs[$i];
            $messageErreur .= "</li>";
        }
        $messageErreur .="</ul>";
        echo $messageErreur;
        include "frminscription.php";
    }
    else{
        // insertion en BDD
    }

}
else {
    include "frminscription.php";  // s'affiche uniquement si 1ère fois - éviter la récursivité
    //echo "<h1>chargement frminscription</h1>";
}