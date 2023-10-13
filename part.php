<?php
session_start();
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    $indexKey = $_POST['key'];
    $projets = $_SESSION['projet'][$indexKey];
    // var_dump($projets);

?>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="projet.css">
        <title>projet</title>
    </head>

    <body>
    <h1>Challenge 2 : Prise en main au langage PHP Tache 3</h1>

        <table>
            <thead>
                <tr>
                    <th>Projets</th>
                    <th>Partenaire</th>
                    <th>Activités</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom Projet</th>
                                    <th>Description</th>
                                    <th>Nb activite</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $projets['nom']; ?></td>
                                    <td><?php echo $projets['desc']; ?></td>
                                    <td><?php echo count($projets['activites']); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom Partenaire</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($projets['partenaire'] as $partenaire) { ?>
                                <tr>
                                    <td><?php echo $partenaire['nomPart']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom Activité</th>
                                    <th>Description</th>
                                    <th>date Activite</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projets['activites'] as $activites) { ?>
                                    <tr>
                                        <td><?php echo $activites['nomAct']; ?></td>
                                        <td><?php echo $activites['desc']; ?></td>
                                        <td><?php echo $activites['date_activite']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>