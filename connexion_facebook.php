<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Facebook</title>
</head>

<body>
    <div class="home">
        <div class="box1">
            <div class="box_facebook">
                <div>
                    <img src="fb.png" alt="">
                </div>
                <div>
                    <h2>Avec Facebook partagezs et restez en <br>contact avec votre entourage</h2>
                </div>
            </div>
        </div>
        <div class="box_login">
            <div class="box_form">
                <form action="validation_conn_face.php" method="post">
                    <div class="input_box">
                        <input type="email" name="email" placeholder="Adresse e-mail ou numero de tel" required />
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Mot de passe" required />
                    </div>
                    <div class="input_box">
                        <button class="button"><b>Se Connecter</b></button>
                    </div><br>
                </form>
                    <div class="input_box">
                        <a href="#" class="link">Mot de passe oublie?</a>
                    </div><br>

                    <hr><br>
                    <div class="input_box">
                        <button class="button1" onclick="window.location.href='inscription_facebook.php'"><b>Creer un compte</b></button>
                    </div>
            </div>
            <p class="texte"><b>Creer un page </b>pour un celebre, une marque ou un entreprie</p>
        </div>
    </div>


</body>

</html>