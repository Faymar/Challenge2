<form action="" method="post">
    <input type="text" name="email" id="">
    <input type="submit">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $test_email = '/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z][A-Z]+$/';
    if (preg_match($test_email, $email)) {
        echo "Email valide";
    } else {
        echo "Email invalide";
    }   
}

?>
<!-- áéíóúâêîôûäëïöü -->