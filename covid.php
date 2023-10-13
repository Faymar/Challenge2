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
            <div class="box_form">
                <h1>Formulaire de Santé: Teste COVID</h1>
                <hr>
                <form action="validation.php" method='post'>
                    <div class="groupe">
                        <input type="text" name="nom" placeholder="Nom" required />
                        <input type="text" name="prenom" placeholder="Prenom" required />
                    </div>
                    <div class="simple">
                        <label for="tranche_age">Tranche d'âge :</label>
                        <select id="tranche_age" name="tranche_age" required>
                            <option value="2-20">2-20 ans</option>
                            <option value="21-45">21-45 ans</option>
                            <option value="45+">45+ ans</option>
                        </select>
                    </div>
                    <div class="groupe">
                        <input type="number" name="pids" placeholder="pids" required min="8" step="0.1" />
                        <input type="number" name="temperature" placeholder="temperature" required min="35" step="0.01" />
                    </div>

                    <div class="simple">
                        <div class="groupe3">
                            <label for="maux_tete">Maux de tête</label><br>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="OUI">OUI</label>
                                <input type="radio" id="OUI" name="maux_tete" value="OUI">
                            </div>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="NON">NON</label>
                                <input type="radio" id="NON" name="maux_tete" value="NON">
                            </div>
                        </div>

                    </div><br>
                    <div class="simple">
                        <div class="groupe3">
                            <label for="Diarrhée">Diarrhée</label><br>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="OUI">OUI</label>
                                <input type="radio" id="OUI" name="diarrhee" value="OUI">
                            </div>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="NON">NON</label>
                                <input type="radio" id="NON" name="diarrhee" value="NON">
                            </div>
                        </div>

                    </div><br>
                    <div class="simple">
                        <div class="groupe3">
                            <label for="Toux">Toux</label><br>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="OUI">OUI</label>
                                <input type="radio" id="OUI" name="Toux" value="OUI">
                            </div>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="NON">NON</label>
                                <input type="radio" id="NON" name="Toux" value="NON">
                            </div>
                        </div>

                    </div><br>
                    <div class="simple">
                        <div class="groupe3">
                            <label for="perte_odorat">Perte de l'odorat</label><br>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="OUI">OUI</label>
                                <input type="radio" id="OUI" name="perte_odorat" value="OUI">
                            </div>
                        </div>
                        <div class="groupe3">
                            <div class="groupe2">
                                <label for="NON">NON</label>
                                <input type="radio" id="NON" name="perte_odorat" value="NON">
                            </div>
                        </div>

                    </div><br>

                    <div class="input_box">
                        <input type="submit" class="button2" name="valider">
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>

</html>