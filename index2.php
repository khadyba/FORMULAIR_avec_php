<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Formulaire de Test de COVID-19</h1>
    <form method="post">
    <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="age">Âge :</label>
        <input type="number"  step="0.1" id="age" name="age" required><br><br>

        <label for="poids">Poids (en kg) :</label>
        <input type="number" id="poids"   name="poids" required><br><br>

        <label for="temperature">Température corporelle (en degrés Celsius) :</label>
        <input type="number" step="0.1" id="temperature" name="temperature" required><br><br>
        <p>Questions de dépistage :</p>
        <label for="maux_de_tete">Avez-vous des maux de tête ?</label>
        <input type="radio" id="maux_de_tete_oui" name="maux_de_tete" value="oui">
        <label for="maux_de_tete_oui">Oui</label>
        <input type="radio" id="maux_de_tete_non" name="maux_de_tete" value="non">
        <label for="maux_de_tete_non">Non</label><br><br>
        <label for="diarrhee">Avez-vous de la diarrhée ?</label>
        <input type="radio" id="diarrhee_oui" name="diarrhee" value="oui">
        <label for="diarrhee_oui">Oui</label>
        <input type="radio" id="diarrhee_non" name="diarrhee" value="non">
        <label for="diarrhee_non">Non</label><br><br>
        <label for="toux">Toussez-vous ?</label>
        <input type="radio" id="toux_oui" name="toux" value="oui">
        <label for="toux_oui">Oui</label>
        <input type="radio" id="toux_non" name="toux" value="non">
        <label for="toux_non">Non</label><br><br>
        <label for="perte_de_poids">Avez-vous des pertes de poids ou d'odorat ?</label>
        <input type="radio" id="perte_de_poids_oui" name="perte_de_poids" value="oui">
        <label for="perte_de_poids_oui">Oui</label>
        <input type="radio" id="perte_de_poids_non" name="perte_de_poids" value="non">
        <label for="perte_de_poids_non">Non</label><br><br>
        <input type="submit" value="Envoyer le formulaire">


    </form>
</body>
</html>