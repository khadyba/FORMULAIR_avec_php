<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULTATS</title>
</head>
<body>
    <?php
    session_start();
if (isset($_SESSION["nom"])) {
    $nom = $_SESSION["nom"];
    echo "LE NOM EST :".$nom."<br />";
  $prenom = $_SESSION["prenom"];
  echo "le prenom est : ".$prenom ."<br />";
  $age = $_SESSION["age"];
  echo "Votre age est : ".$age ."<br />";
  
  $score = $_SESSION["score"];
  echo "Votre score est : ".$score ."<br />";

if ($score>=80) {
    echo "votre etat de santer est: critique";

} elseif ($score>=50) {
    echo "vous etes : susceptible d'avoir la maladie";
}else {
    echo "félicitation vous etes sain ";
}



   
   
   
}
    
?>
</body>
</html>