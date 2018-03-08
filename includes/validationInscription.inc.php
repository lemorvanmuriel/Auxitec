<h1>Validation inscription</h1>
<?php
if (isset($_GET['mail']) && isset($_GET['id]']))
{
    $mail= $_GET['mail'];
    $id=$_GET['id'];
    $requete= new Requetes();
    $sql="UPDATE t_users
          SET usermailconfirm=1
          WHERE usermail='$mail';
          AND SHA2(id_users,256)='$id'";
    //$result=$requete ->select($sql);
    if ($result->rowCount() >0){

    }
    else{

    }
}
else{

}