<?php
session_start();

// Vérifie si historique existe 
if (!isset($_SESSION['historique'])) {
    $_SESSION['historique'] = [];    // on crée l'historique
}

// on crée une fonction pour convertir
function convert($sum, $devise)
{
    $taux_dechange = [
        'euro' =>   0.0015,
        'dollar' =>  0.0018,
        'dirham' => 0.104,
        'riyal' => 0.0065
    ];

    if (isset($taux_dechange[$devise])) { // Correction ici, vérifiez si la devise est valide
        return  $sum * $taux_dechange[$devise];
    }
    return false;
}

// Vérifie si le formulaire a été soumis
if (isset($_GET['sum']) && is_numeric($_GET['sum']) && isset($_GET['devise'])) {
    $argent = floatval($_GET['sum']);
    $devise = $_GET['devise'];
    $tempsactuel = time();

    $convertion = convert($argent, $devise);
    if ($convertion !== false && $argent >= 0) {
        // on ajoute nos résultats dans l'historique
        $_SESSION['historique'][] = [
            'argent' => $argent,
            'devise' => $devise,
            'tempsactuel' => $tempsactuel,
            'convertion' => $convertion
        ];
    }
}

if (isset($_GET['effacer'])) {
    $_SESSION['historique'] = [];    // on crée l'historique de nouveau
}

// Regrouper l'historique par date
$grouped_history = [];
foreach ($_SESSION['historique'] as  $entry) {


    if (is_numeric($entry['tempsactuel'])) {

        $date = date('d-m-Y', $entry["tempsactuel"]);
        $grouped_history[$date][] = $entry;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>formulaire</title>
</head>

<body>
    <h1>Convertir vos Billet</h1>
    <form method="get">
        <div>
            <label for="sommes">Somme-total_FR</label>
            <input type="number" name="sum" placeholder="Saisissez un montant en francs" />
        </div>
        <div>
            <label for="devise">Choisissez la devise :</label>
            <select name="devise">
                <option value="euro">Euro</option>
                <option value="dollar">Dollar</option>
                <option value="dirham">Dirham</option>
                <option value="riyal">Riyal</option>
            </select>
        </div>
        <button type="submit">Convertir</button>
        <?php if (!empty($grouped_history)) : ?>
            <h2>VOS Historique de convertion</h2>
            <?php foreach ($grouped_history as $date => $histories) :  ?>
                <h3> pour la date du <?= $date  ?> voici ce que vous avez saisie</h3>
                <table border=1>
                    <tr>
                        <th>Montant saisie</th>
                        <th>Resultat</th>
                        <th>Devise</th>
                        <th>Heure</th>
                    </tr>
                    <?php foreach ($histories as $historie) :  ?>
                        <tr>
                            <td> <?php echo $historie['argent'] ?> </td>
                            <td> <?php echo $historie['convertion'] ?> </td>
                            <td> <?php echo $historie['devise'] ?> </td>
                            <td> <?php echo date('H:i:s', $historie['tempsactuel'])  ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endforeach; ?>
            <input type="submit" value="effacer votre historique" name="effacer">
        <?php endif; ?>
    </form>
</body>

</html>