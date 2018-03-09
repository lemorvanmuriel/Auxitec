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
        $requete = new Requetes();
        $password=sha1($mdp);
        $sql = "INSERT INTO t_users (usernom,userprenom,usermail,userpassword,id_groupes)
                VALUES ('$nom','$prenom','$mail','$mdp',1)";
        //die($sql);
        if ($requete -> insert($sql))
        {
           // ini_set('SMTP','localhost'); // pour que la commande mail fonctionne
            //ini_set('smtp_port',1025);
            //mail('contact@test.fr','Weed','Ceci est un message','From: info@societe.com');
            $lastId= $requete->getLastId();
            $lastId=hash('sha256',$lastId); //php
            $message="<h1>Confirmation mail</h1>";
            $message.="<p>Pour confirmer votre compte, cliquer ";
            $message.="<a href='http://localhost/auxitec2/index.php?";
            $message.="page=validationInscription&amp;mail=";
            $message.=$mail;
            $message.="&amp;id=";
            $message.=$lastId;
            $message.="' "; // fin du 'http
            $message.="target='_blank'>ici</a></p>";

            ini_set('SMTP','localhost'); // pour que la commande mail fonctionne
            ini_set('smtp_port',1025);

            mail($mail,'Confirmation compte',$message);
            echo "<p>Inscription OK</p>";
        }
        else{
            Log::logWrite("Erreur inscription");
            echo "<p>Try again</p>";
        }
    }

}
else {
    include "frminscription.php";  // s'affiche uniquement si 1ère fois - éviter la récursivité
    //echo "<h1>chargement frminscription</h1>";
}