<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_nom = "/^[a-zA-Z]{2,}$/";
    $regex_prenom = "/^[a-zA-Z]{3,}$/";
    $regex_email = '/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/';
    $erros = [];

    if (!preg_match($regex_nom, $_POST["nom"])) {
        $erros[] = "Le nom est invalide.";
    }
    if (!preg_match($regex_prenom, $_POST["prenom"])) {
        $erros[] = "Le prénom est invalide.";
    }
    if (!preg_match($regex_email, $_POST["email"])) {
        $erros[] = "Le email est invalide.";
    }


    if (strlen($_POST['password']) < 8) {
        $erros[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }

    if (
        !preg_match("/[A-Z]/", $_POST['password']) ||
        !preg_match("/[a-z]/", $_POST['password']) ||
        !preg_match("/[0-9]/", $_POST['password'])
    ) {
        $erros[] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minusculeet au moins un chiffre.";
    }

    if ($_POST['password'] == $_POST['nom'] || $_POST['password'] == $_POST['prenom']) {
        $erros[] = "Le mot de passe ne doit pas être identique au nom ou au prenom de l'utilisateur.";
    }

    if (!isset($_POST["jour"])) {
        $erros[] = "Le champ 'jour' est obligatoire.";
    }
    if (!isset($_POST["mois"])) {
        $erros[] = "Le champ 'mois' est obligatoire.";
    }
    if (!isset($_POST["annee"])) {
        $erros[] = "Le champ 'annee' est obligatoire.";
    }
    if (!isset($_POST["sexe"])) {
        $erros[] = "Le champ 'sexe' est obligatoire.";
    }
    if (!empty($erros)) {
        echo '<table>';
        foreach ($erros as $er) {
            echo '<tr><td>' . $er . '</td></tr>';
        }
        echo '</table>';
        die;
    } else {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mois = $_POST['mois'];
        $jour = $_POST['jour'];
        $annee = $_POST['annee'];
        $sexe = $_POST['sexe'];
        $mot_de_passe_has = md5($_POST['password']);
        $_SESSION['user'][] = array(
            'nom' => $prenom,
            'prenom' => $nom,
            'email' => $email,
            'sexe' => $sexe,
            'mot_de_passe_has' => $mot_de_passe_has,
            'date_naissance' => array('jour' => $jour, 'mois' => $mois, 'annees' => $annee),
        );
        echo 'bonjour'. $nom. ' '. $prenom . ' votre inscription est valide Merci';
    }
}

var_dump($_SESSION['user']);
