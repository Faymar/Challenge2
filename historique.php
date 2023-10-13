<?php session_start(); ?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="covid.css">
    <title>COVID</title>
</head>

<body>

    <div class="home">
        <table>
            <thead>
                <tr>
                    <th>prenom</th>
                    <th>nom</th>
                    <th>pids</th>
                    <th>temperature</th>
                    <th>tranche_age</th>
                    <th>diarree</th>
                    <th>toux</th>
                    <th>perte_odorat</th>
                    <th>date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION["historique"] as $historique) {
                    echo '<tr>';
                    echo '<td>' . $historique['prenom'] . '</td>';
                    echo '<td>' . $historique['nom'] . '</td>';
                    echo '<td>' . $historique['pids'] . '</td>';
                    echo '<td>' . $historique['temperature'] . '</td>';
                    echo '<td>' . $historique['tranche_age'] . '</td>';
                    echo '<td>' . $historique['diarree'] . '</td>';
                    echo '<td>' . $historique['toux'] . '</td>';
                    echo '<td>' . $historique['perte_odorat'] . '</td>';
                    echo '<td>' . $historique['date'] . '</td>';
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>