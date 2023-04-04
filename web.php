<form action ="solution.php" method= "get" >
    <label for="localisation"> Localisation:</label>
    <input type=radio id=choix1 name=choix value=1> Zone rurale
    <input type=radio id=choix2 name=choix value=2 > Zone urbaine
    <input type=radio id=choix3 name=choix value=3> Entreprise
    <br>
    <label for="utilisation"> Motif d'utilisation:</label>
    <input type="text" name="utilisation" required maxlength="40" size="40" />
    <br>
    <label for="nom"> Nom de l'entreprise:</label>
    <input type="text" name="nom" required maxlength="40" size="40" />
    <br>
    <label for="densite"> Densité de la zone:</label>
    <input type=radio id=choix4 name=dense value=1> Densité faible
    <input type=radio id=choix5 name=dense value=2> Densité forte
    <br>
    <label for="surface"> Surface à couvrir en m2:</label>
    <input type="text" name="surface" pattern="\d+" required />
    <br>
    <label for="latence"> Latence en milliseconde:</label>
    <input type="text" name="latence"pattern="\d+" required/>
    <br>
    <label for="debit"> Débit en Gb/s:</label>
    <input type="text" name="debit"pattern="\d+" required/>
    <br>
    <input type ="submit" value="valider" />
    <br>
</form>
