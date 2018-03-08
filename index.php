<?php
include "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader'); // chargera automatiquement lors de l'instanciation d'un objet d'une classe



?>
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8" />
        <title>Blog Auxitec</title>
        <link rel="stylesheet" href="./assets/css/style.css" />
    </head>
    <body>
    <div id="container">

    <?php
        /**
     * Created by PhpStorm.
     * User: Lemorvan
     * Date: 06/03/2018
     * Time: 10:22
     */
        //phpinfo();
        include "./includes/header.php";

        echo "<h1>Ceci est le corps de mon index.php</h1>";
        /*
        if  (isset($_GET['page']) && $_GET['page']!="" ){
            $page= $_GET['page'];
        }
        else{
            $page="accueil";
        }
        */
        // opérateur ternaire
        $page=(isset($_GET['page']) && $_GET['page']!="") ? $_GET['page'] : $page="accueil";
        echo $page;
        $page = "./includes/" . $page . ".inc.php";
        $files = glob("./includes/*.inc.php");
        if (in_array($page,$files))
        {
            include $page;
        }
        else{
            include "./includes/accueil.inc.php";
        }
      /*  echo "<pre>";
        print_r($files);
        echo "</pre>";
*/
        include "./includes/footer.php";
    ?>
    </div>
    </body>

</html>




