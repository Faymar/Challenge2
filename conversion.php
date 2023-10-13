<html lang="fr">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion</title>
    <link rel="stylesheet" href="conversion.css">
</head>

<body>

    <form action="" method="POST">
        <label for="fr">FRCFA :</label><br>
        <input type="number" id="fr" name="fr" step="0.001"><br><br>
        <input type="submit" name="convertir" value="convertir"> <br><br>
    </form>
    <?php

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["convertir"])) {
        $convertir =  ($_POST['fr']) / 655.91;;

        if (!$_SESSION['somme']) {
            $message = '';
            $_SESSION['somme'] = array();
        }


        echo '<h1> le resulat de la conversion est de ' .  $convertir . '<br></h1>';
        // $i = $_SESSION['i'];
        // setcookie('testeerte', $_POST['fr'], time() + (86400 * 30), "/");
        // $_COOKIE('test', $_POST['fr'] + time(6600);
        $date_conversion = date('Y-m-d H:i:s');

        if (!$_SESSION['jour_']) {
            $_SESSION['jour_'] = array();
        }
        // $jour__exite = false;
        //array_push($_SESSION['jour_'], date('l j F Y'));

        // foreach ($_SESSION['jour_'] as $item) {
        //     // echo $item;
        //     if (($item) === date('l j F Y a H:i:s')) {
        //         array_push($_SESSION['jour_'], date('l j F Y'));
        //     }
        // }
        // array_push($_SESSION['jour_'], date('l j F Y'));
        $jour_existe = false;
        for ($i = 0; $i < count($_SESSION['jour_']); $i++) {
            $date1 = new DateTime($_SESSION['jour_'][$i]);
            $date2 = new DateTime(date('Y-m-d'));
            if ($date1->format('Y-m-d') == $date2->format('Y-m-d')) {
                $jour_existe = true;
                break;
            }
        }

        if (!$jour_existe) {
            array_push($_SESSION['jour_'], date('Y-m-d'));
        }

        // var_dump($_SESSION['jour_']);
        // array_push($_SESSION['jour_'], array('somme' => $_POST['fr'], 'date' => $date_conversion));
        array_push($_SESSION['somme'], array('somme' => $_POST['fr'], 'date' => $date_conversion));
        // var_dump($_SESSION['somme']);
    }
    // }
    foreach ($_SESSION['jour_'] as $jour) {
        echo '<h1>conversion de la journee du ' . $jour . '<br> </h1>';
        $date1 = new DateTime($jour);
        // var_dump($_SESSION['somme']);
        foreach ($_SESSION['somme'] as $item) {
            // var_dump($item['date']);
            $date2 = new DateTime($item['date']);
            // $date2 = new DateTime($item["date"]);
            if ($date1->format('Y-m-d') == $date2->format('Y-m-d')) {
                // var_dump($item);

                echo "La somme de  : " . $item["somme"] . ", convertie le: " . $date2->format('Y-m-d H:i:s') . " ";
                echo '  <form action="" method="post">
                            <input type="submit" name="supprimer" value="supprimer" > <br><br>   
                        </form>';
                if (isset($_POST["supprimer"])) {
                    
                    array_splice($_SESSION['somme'], $item, 1);
                    // echo 'suopp';  
                }
            }
        }
    }
    // var_dump($_SESSION['somme']);
    // $i += 1;
    // array_push($_COOKIE['testeerte'], $_POST['fr']);
    // // $_SESSION['i'] += 1 ;
    // var_dump($_COOKIE['testeerte']);

    // var_dump($_SESSION['i'] );
    // echo '<span> Le resultat va s afficher ici :' . $convertir . ' </span>';

    ?>

</body>

</html>