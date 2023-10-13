<?php session_start(); ?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projet.css">
    <title>projet</title>
</head>

<body>
    <?php

    // if (!$_SESSION['projet']) {
        $_SESSION['projet'] = [
            [
                'nom' => 'nom1',
                'desc' => 'desc1',
                'activites' => array(
                    ['nomAct' => 'activites11', 'desc' => 'description activite 11', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites12', 'desc' => 'description activite 11', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites13', 'desc' => 'description activite 13', 'date_activite' => '21-01-2011'],
                ),
                'partenaire' => array(
                    ['nomPart' => 'partenaire11'],
                    ['nomPart' => 'partenaire12'],
                    ['nomPart' => 'partenaire13'],
                )
            ],
            [
                'nom' => 'nom2',
                'desc' => 'desc2',
                'activites' => array(
                    ['nomAct' => 'activites21', 'desc' => 'description activite 21', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites22', 'desc' => 'description activite 22', 'date_activite' => '21-01-2011']
                ),
                'partenaire' => array(
                    ['nomPart' => 'partenaire21'],
                    ['nomPart' => 'partenaire22']
                )
            ],
            [
                'nom' => 'nom3',
                'desc' => 'desc3',
                'activites' => array(
                    ['nomAct' => 'activites31',  'desc' => 'description activite 31', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites32',  'desc' => 'description activite 32', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites33',  'desc' => 'description activite 33', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites34',  'desc' => 'description activite 34', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites35',  'desc' => 'description activite 35', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites36',  'desc' => 'description activite 36', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites37',  'desc' => 'description activite 37', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites38',  'desc' => 'description activite 38', 'date_activite' => '21-01-2011']
                ),
                'partenaire' => array(
                    ['nomPart' => 'partenaire31'],
                    ['nomPart' => 'partenaire32'],
                    ['nomPart' => 'partenaire33'],
                    ['nomPart' => 'partenaire34'],
                    ['nomPart' => 'partenaire35'],
                    ['nomPart' => 'partenaire36'],

                )
            ],
            [
                'nom' => 'nom4',
                'desc' => 'desc4',
                'activites' => array(
                    ['nomAct' => 'activites41',  'desc' => 'description activite 41', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites42',  'desc' => 'description activite 42', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites43',  'desc' => 'description activite 43', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites44',  'desc' => 'description activite 44', 'date_activite' => '21-01-2011']
                ),
                'partenaire' => array(
                    ['nomPart' => 'partenaire41'],
                    ['nomPart' => 'partenaire42'],
                    ['nomPart' => 'partenaire43'],
                    ['nomPart' => 'partenaire44']
                )
            ],
            [
                'nom' => 'nom5',
                'desc' => 'desc5',
                'activites' => array(
                    ['nomAct' => 'activites51',  'desc' => 'description activite 51', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites52',  'desc' => 'description activite 52', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites53',  'desc' => 'description activite 53', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites54',  'desc' => 'description activite 54', 'date_activite' => '21-01-2011'],
                    ['nomAct' => 'activites55',  'desc' => 'description activite 55', 'date_activite' => '21-01-2011'],
                ),
                'partenaire' => array(
                    ['nomPart' => 'partenaire51'],
                    ['nomPart' => 'partenaire52'],
                )
            ],
        ];
    // }
    $projet = $_SESSION['projet'];
    // echo $projet[0]['activites'][0];
    // TRIE DU TABLEAU PROJET
    $temp;
    for ($i = 0; $i < count($projet); $i++) {

        for ($j = 0; $j < (count($projet)) - $i - 1; $j++) {
            if (count($projet[$j]['activites']) < count($projet[$j + 1]['activites'])) {
                $temp = $projet[$j];
                $projet[$j] = $projet[$j + 1];
                $projet[$j + 1] = $temp;
            }
        }
    }
    $_SESSION['projet'] = $projet;
    // var_dump($_SESSION['projet']);

    ?>
    <div>
        <h1>Challenge 2 : Prise en main au langage PHP Tache 3</h1>
        <form action="" method="post" class="formular">
            <select id="projet" name="projet" required>
                <?php foreach ($projet as $projets) {
                    echo  '<option value="' . $projets['nom'] . '">' . $projets['nom'] . '</option>';
                } ?>
                <input type="text" name="nomAct">
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
                <input type="date" name="date_activite">
                <input type="submit" value="ajouter" name="ajouter">
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Projets</th>
                <th>Activités</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projet as $key => $projets) { ?>
                <tr>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom Projet</th>
                                    <th>Description</th>
                                    <th>Nb activite</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $projets['nom']; ?></td>
                                    <td><?php echo $projets['desc']; ?></td>
                                    <td><?php echo count($projets['activites']); ?></td>
                                    <td>
                                        <form action="part.php" method="post">
                                            <input type="hidden" name="key" value="<?= $key ?>">
                                            <input type="submit" value="Voir +" name="Voir +">
                                        </form>
                                    </td>
                                </tr>
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
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomprojet = $_POST['projet'];
    $nomAct = $_POST['nomAct'];
    $desc = $_POST['desc'];
    $date_activite = $_POST['date_activite'];
    $projet = $_SESSION['projet'];
    // var_dump($projet);
    for ($i = 0; $i < count($projet); $i++) {
        if ($projet[$i]['nom'] == $nomprojet) {
            $projet[$i]['activites'][] = array(
                'nomAct' => $nomAct,
                'desc' => $desc,
                'date_activite' => $date_activite
            );
        }
    }
    // foreach ($projet as $projets) {
    //     if ($projets['nom'] == $nomprojet) {
    //         // var_dump($projets['activites']);
    //         print_r ($projets['activites']);
    //          $projets['activites'][]= ['nomAct' => $nomAct, 'desc' => $desc, 'date_activite' => $date_activite];
    //          print_r ($projets);

    //     }
    //     print_r ($projet);

    // }
    $_SESSION['projet'] = $projet;
}
?>
<!-- 
// for ($i = 0; $i < count($projet); $i++) {
//     echo $projet[$i]['nom'] . '<br>';
//     echo $projet[$i]['desc'] . '<br>';
//     echo '<br>';

//     for ($j = 0; $j < count($projet[$i]['activites']); $j++) {
//         for ($k = 0; $k < count($projet[$i]['activites'][$j]); $k++) {
//         echo $projet[$i]['activites'][$j] . '<br>';
//         echo '<br>';
//     }
// }
// echo 'Projet:  ' . $projet[$i]['desc'] . '<br>';
// echo 'Descrition:  ' . $projet[$i]['desc'] . '<br>'; -->
<!-- PROGARAM PROGET

var projet[][]
tab_indc[]
ind = 0
temp = 0
i = 0
j = 0
k= 0

DEBUT 

projet[][] = // on donne le valeurs du tableau projet


POUR i= 1 jusqu'a TAILLE(projet[][]) FAIRE
    POUR j= i+1 jusqu'a TAILLE(projet[][]) FAIRE
        SI (TAILLE(projet[i][activites]) < TAILLE(projet[j][activites])) ALORS
        temp = projet[i][]
        projet[i][] = projet[j][]
        projet[j][] = temp
    FINPOUR 
FINPOUR
// affiche des projets par odre
POUR j =1 jusqu'a TAILLE(projet[][]) FAIRE
    AFFICHER projet[tab[j]][nom] 
    AFFICHER projet[tab[j]][desc]
    AFFICHER projet[tab[j]][date]

    POUR i=1 jusqu'a TAILLE(projet[i][activites]) FAIRE
        AFFICHER projet[j][activites][i]
    FINPOURE

FINPOUR
FIN -->