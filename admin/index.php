<?php
require('inc/functies.php');
require('inc/db_config.php');

session_start();
if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
    redirect('dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('inc/links.php'); ?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
        ::placeholder{
            color: lightgray!important;
        }
    </style>
</head>

<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <h5>Rent-A-Car</h5>
            <hr>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_naam" required type="text" class="form-control shadow-none text-center" placeholder="Admin naam">
                </div>
                <div class="mb-4">
                    <input name="admin_wachtwoord" required type="password" class="form-control shadow-none text-center" placeholder="Wachtwoord">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">INLOGGEN</button>
            </div>
        </form>
    </div>

    <?php

    if (isset($_POST['login'])) {

        $form_data = filteren($_POST);

        $query = "SELECT * FROM `gebruikers` WHERE `naam` = ? AND `wachtwoord` = ?";
        $waarden = [$form_data['admin_naam'], $form_data['admin_wachtwoord']];

        $resultaat = selecteren($query, $waarden, "ss");
        if ($resultaat->num_rows == 1) {
            $rij = mysqli_fetch_assoc($resultaat);
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminId'] = $rij['id'];
            redirect('dashboard.php');
        } else {
            alert('error', 'Inloggen mislukt - Onjuiste Gegevens');
        }
    }

    ?>

    <?php require('inc/scripts.php'); ?>
</body>

</html>