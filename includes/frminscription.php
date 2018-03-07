<form method="post" action="#">
<div>
    <label for="nom">Nom: </label>
    <input type="text" name="nom" />
</div>
<div>
    <label for="prenom">Prénom: </label>
    <input type="text" name="prenom" />
</div>
<div>
    <label for="mail">Mail: </label>
    <input type="text" name="mail" />
</div>
<div>
    <label for="mdp">Mot de passe: </label>
    <input type="pasword" name="mdp" />
</div>

<div>
    <input type="reset" value="Effacer" />
    <input type="submit" value="Envoyer" />
    <input type="hidden" name="frmInscription" />
    <!--   <input type="hidden" value="42" name="frmInscription"/>    champ caché permet de passer des valeurs pour éviter la récursivité -->

</div>

</form>