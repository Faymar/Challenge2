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
        <div class="box_login">
            <a href="historique.php" class="button2"> Voir historique des testes</a> <br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $regex_nom = "/^[a-zA-Z]{2,}$/";
                $regex_prenom = "/^[a-zA-Z]{3,}$/";
                $regex_pids = "/^[0-9]+(\.[0-9]+)?$/";
                $regex_temperature = "/^[0-9]+(\.[0-9]+)?$/";
                $erros = [] ;


                if (!preg_match($regex_nom, $_POST["nom"])) {
                    $erros[] = "Le nom est invalide.";
                }
                if (!preg_match($regex_prenom, $_POST["prenom"])) {
                    $erros[] = "Le prénom est invalide.";
                }
                if (!isset($_POST["tranche_age"])) {
                    $erros[] = "La tranche d'âge est invalide.";
                }
                if (!preg_match($regex_pids, $_POST["pids"])) {
                    $erros[] = "Le PIDS est invalide.";
                }
                if (!preg_match($regex_temperature, $_POST["temperature"])) {
                    $erros[] =  "La température est invalide.";
                }
                if (($_POST["temperature"] < 35 || $_POST["temperature"] > 40)) {
                    $erros[] = "La température doit etre entre 35 et 45 ().";
                }
                if (!isset($_POST["maux_tete"])) {
                    $erros[] = "Le champ 'Maux de tête' est obligatoire.";
                }
                if (!isset($_POST["diarrhee"])) {
                    $erros[] = "Le champ 'Diarrhée' est obligatoire.";
                }
                if (!isset($_POST["Toux"])) {
                    $erros[] = "Le champ 'Toux' est obligatoire.";
                }
                if (!isset($_POST["perte_odorat"])) {
                    $erros[] = "Le champ 'Perte de l'odorat' est obligatoire.";
                }
                // var_dump($erros);die;
                if (!empty($erros)) {
                    $_SESSION["erros"] = array();
                    $nom = $_POST["nom"];
                    $prenom = $_POST["prenom"];
                    $tranche_age = $_POST["tranche_age"];
                    $pids = $_POST["pids"];
                    $temperature = $_POST["temperature"];
                    $maux_tete = $_POST["maux_tete"];
                    $diarrhee = $_POST["diarrhee"];
                    $toux = $_POST["Toux"];
                    $perte_odorat = $_POST["perte_odorat"];
                    array_push(
                        $_SESSION["historique"],
                        array(
                            'prenom' => $prenom, 'nom' => $nom,
                            'pids' => $pids,
                            'temperature' => $temperature, 'tranche_age' => $tranche_age, 'maux_tete' => $maux_tete,
                            'diarree' => $diarrhee, 'toux' => $toux, 'perte_odorat' => $perte_odorat, 'date' => date('Y-m-d H:i:s')
                        )
                    );
                    echo "<h1>erros</h1> <br><br><br>";
                    echo '<table>';
                    foreach ($erros as $er) {
                        echo '<tr>' . $er . '</tr>';
                    }
                    echo '</table>';
                    // var_dump($erros);
                    die;
                } else {
                    $nom = $_POST["nom"];
                    $prenom = $_POST["prenom"];
                    $tranche_age = $_POST["tranche_age"];
                    $pids = $_POST["pids"];
                    $temperature = $_POST["temperature"];
                    $maux_tete = $_POST["maux_tete"];
                    $diarrhee = $_POST["diarrhee"];
                    $toux = $_POST["Toux"];
                    $perte_odorat = $_POST["perte_odorat"];

                    $t_pids = 0;
                    $t_temperature = 0;
                    $t_tranche_age = 0;
                    $t_maux_tete = 0;
                    $t_diarrhee = 0;
                    $t_toux = 0;
                    $t_perte_odorat = 0;;
                    switch ($tranche_age) {
                        case "2-20":
                            $t_tranche_age = 20;
                            break;
                        case "21-45":
                            $t_tranche_age = 10;
                            break;
                        case "45+":
                            $t_tranche_age = 20;
                            break;
                        default:
                    }
                    if ($temperature >= 37) $t_temperature = 20;
                    if ($maux_tete == "OUI") $t_maux_tete = 10;
                    if ($diarrhee == "OUI") $t_diarrhee = 10;
                    if ($toux == "OUI") $t_toux = 20;
                    if ($perte_odorat == "OUI") $t_perte_odorat = 20;

                    $score = $t_temperature + $t_maux_tete + $t_diarrhee + $t_toux + $t_perte_odorat + $t_tranche_age;
                    $_SESSION['score'] = $score;


                    $_SESSION["prenom"] = $prenom;
                    $_SESSION["nom"] = $nom;
                    $_SESSION["pids"] = $pids;
                    $_SESSION["temperature"] = $temperature;
                    $_SESSION["tranche_age"] = $tranche_age;
                    $_SESSION["maux_tete"] = $maux_tete;
                    $_SESSION["diarrhee"] = $diarrhee;
                    $_SESSION["Toux"] = $toux;
                    $_SESSION["perte_odorat"] = $perte_odorat;

                    if (!$_SESSION["historique"]) {
                        $_SESSION["historique"] = array();
                    }
                    array_push(
                        $_SESSION["historique"],
                        array(
                            'prenom' => $prenom, 'nom' => $nom,
                            'pids' => $pids,
                            'temperature' => $temperature, 'tranche_age' => $tranche_age, 'maux_tete' => $maux_tete,
                            'diarree' => $diarrhee, 'toux' => $toux, 'perte_odorat' => $perte_odorat, 'date' => date('Y-m-d H:i:s')
                        )
                    );
                }
            }
            if ($_SESSION['score']) {
            ?>
                <div class="box_login">
                    <div class="box_form">
                        <h1>Resultat teste COVID</h1>
                        <hr>
                        <form action="#">
                            <div class="simple">
                                <label for="Prenom">Prenom</label>
                                <input type="texte" required value='<?php echo $_SESSION["prenom"]; ?>' readonly />
                            </div>
                            <div class="simple">
                                <label for="nom">nom</label>
                                <input type="texte" required value='<?php echo $_SESSION["nom"]; ?>' readonly />
                            </div>
                            <div class="simple">
                                <label for="tranche_age">Tranche d'âge :</label>
                                <input type="texte" required value='<?php echo $_SESSION["tranche_age"]; ?>' readonly />
                            </div>
                            <div class="simple">
                                <label for="pids">Pids :</label>
                                <input type="texte" required value='<?php echo $_SESSION["pids"]; ?>' readonly />
                            </div>
                            <div class="simple">
                                <label for="temperature">Temperature:</label>
                                <input type="texte" required value='<?php echo $_SESSION["temperature"]; ?>' readonly />
                            </div>

                            <div class="simple">
                                <div class="groupe3">
                                    <label for="maux_tete">Maux de tête</label><br>
                                    <input type="texte" required value='<?php echo $_SESSION["maux_tete"]; ?>' readonly />
                                </div>
                                <div class="groupe3">
                                    <label for="Diarrhée">Diarrhée</label><br>
                                    <input type="texte" required value='<?php echo $_SESSION["diarrhee"]; ?>' readonly />
                                </div>
                            </div><br>
                            <div class="simple">
                                <div class="groupe3">
                                    <label for="Toux">Toux</label><br>
                                    <input type="texte" required value='<?php echo $_SESSION["Toux"]; ?>' readonly />
                                </div>
                                <div class="groupe3">
                                    <label for="perte_ odorat">perte odorat</label><br>
                                    <input type="texte" required value='<?php echo $_SESSION["perte_odorat"]; ?>' readonly />
                                </div>
                            </div><br><br>
                            <?php
                            if ($_SESSION['score'] > 60) { ?>
                                <div class="input_box">
                                    <p class="button3"><?php echo 'Teste Positif avec score = ' . $_SESSION['score'] ?> </p>
                                </div><?php  } else { ?>
                                <div class="input_box">
                                    <p class="button2"><?php echo 'Teste Negatif avec score = ' . $_SESSION['score'] ?> </p>
                                </div><?php  } ?>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>