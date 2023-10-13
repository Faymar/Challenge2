<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_email = '/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/';
    $erros = [];

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

    if (!empty($erros)) {
        echo '<table>';
        foreach ($erros as $er) {
            echo '<tr><td>' . $er . '</td></tr>';
        }
        echo '</table>';
        die;
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mot_de_passe_has = md5($_POST['password']);
        foreach ($_SESSION['user'] as $user) {
            if (($user['email'] == $email) && ($user['mot_de_passe_has'] == $mot_de_passe_has)) {
                echo 'connexion avec success';
                break;
            }
        }
    }
}

// var_dump($_SESSION['user']);
// pape17@gmail.pape´´´