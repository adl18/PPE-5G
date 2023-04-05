<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Simulation</title>
  <link rel="stylesheet" href="web.css">


<form action="solution.php" method="get">
  <fieldset>
    <legend>Informations de l'entreprise :</legend>

    <div class="form-group">
      <label for="nom">Nom de l'entreprise :</label>
      <input type="text" id="nom" name="nom" required maxlength="40" size="40" />
    </div>

    <div class="form-group">
      <label for="localisation">Localisation :</label><br>
      <label><input type="radio" name="localisation" value="1">Zone rurale</label><br>
      <label><input type="radio" name="localisation" value="2">Zone urbaine</label>
    </div>

    <div class="form-group">
      <label for="densite">Densité de la zone :</label><br>
      <label><input type="radio" name="densite" value="1">Densité faible</label><br>
      <label><input type="radio" name="densite" value="2">Densité forte</label>
    </div>

    <div class="form-group">
      <label for="utilisation">Motif d'utilisation :</label>
      <input type="text" id="utilisation" name="utilisation" required maxlength="40" size="40" />
    </div>

    <div class="form-group">
      <label for="surface">Surface à couvrir en m² :</label>
      <input type="number" id="surface" name="surface" required min="0" step="0.01" pattern="\d+" />
    </div>

  </fieldset>

  <fieldset>
    <legend>Performances du réseau :</legend>

    <div class="form-group">
      <label for="latence">Latence en millisecondes :</label>
      <input type="number" id="latence" name="latence" required min="0" step="0.01" pattern="\d+" />
    </div>

    <div class="form-group">
      <label for="debit">Débit en Gb/s :</label>
      <input type="number" id="debit" name="debit" required min="0" step="0.01" pattern="\d+" />
    </div>

  </fieldset>

  <div class="form-group">
    <input type="submit" value="Valider" />
  </div>
</form>
