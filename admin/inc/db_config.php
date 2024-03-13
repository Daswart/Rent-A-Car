<?php

//database credentials
$hostnaam = 'localhost';
$gebruikersnaam = 'root';
$wachtwoord = '';
$database = 'rent-a-car';


$con = mysqli_connect($hostnaam, $gebruikersnaam, $wachtwoord, $database);


if (!$con) {
    die('Kan geen verbinding maken met de database. - ' . mysqli_connect_error());
}

function filteren($data)
{
    foreach ($data as $sleutel => $waarde) {
        $data[$sleutel] = trim($waarde);
        $data[$sleutel] = stripcslashes($waarde);
        $data[$sleutel] = htmlspecialchars($waarde);
        $data[$sleutel] = strip_tags($waarde);
    }
    return $data;
}

function selecteren($query, $waarden, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$waarden);
        if (mysqli_stmt_execute($stmt)) {
            $resultaat = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $resultaat;
        } else {
            mysqli_stmt_close($stmt);
            die("Query kan niet worden uitgevoerd - Selecteren");
        }
    } else {
        die("Query kan niet worden voorbereid - Selecteren");
    }
}
