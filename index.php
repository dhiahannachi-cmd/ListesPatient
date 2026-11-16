<?php

require_once 'config.php';
require_once 'fonctions.php';

$patients = [
    ['nom' => 'Benali', 'prenom' => 'Sara', 'age' => 70, 'service' => 'cardio', 'urgence' => 'ROUGE'],
    ['nom' => 'Trabelsi', 'prenom' => 'Ahmed', 'age' => 45, 'service' => 'derma', 'urgence' => 'ORANGE'],
    ['nom' => 'Jlassi', 'prenom' => 'Amina', 'age' => 8, 'service' => 'pediatre', 'urgence' => 'VERT'],
    ['nom' => 'Ayari', 'prenom' => 'Karim', 'age' => 68, 'service' => 'cardio', 'urgence' => 'VERT'],
];

$urgencesAbsolues = filtrerUrgences($patients);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Liste des Patients</h1>

    <div class="grille">
        <?php foreach ($patients as $p): ?>
            <?php
                $badge = getBadgeService($p['service']);
                $urgence = getLibelleUrgence($p['urgence']);
                $facture = calculerFacture($p['age'], TARIF_BASE_CONSULTATION);
            ?>
            <article class="carte urgence-<?= $p['urgence'] ?>">
                <h2><?= $p['nom'] ?> <?= $p['prenom'] ?> (<?= $p['age'] ?> ans)</h2>

                <span class="badge <?= $badge['classe'] ?>"><?= $badge['libelle'] ?></span>

                <p><strong>Niveau d'urgence : </strong><?= $urgence ?></p>
                <p><strong>Facture estimée : </strong><?= $facture ?> TND</p>
            </article>
        <?php endforeach; ?>
    </div>

    <article class="recapitulatif">
        <h2>Récapitulatif</h2>
        <p><strong>Nombre total de patients :</strong> <?= count($patients) ?></p>
        <h3>Urgences absolues (ROUGE) :</h3>
        <ul>
            <?php foreach ($urgencesAbsolues as $u): ?>
                <?php $badge = getBadgeService($u['service']); ?>
                <li><?= $u['nom'] ?> <?= $u['prenom'] ?> (<?= $badge['libelle'] ?>)</li>
            <?php endforeach; ?>
        </ul>
    </article>
</body>
</html>

