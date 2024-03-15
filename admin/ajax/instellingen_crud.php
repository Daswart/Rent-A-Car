<?php

require('../inc/db_config.php');
require('../inc/functies.php');
adminLogin();


if (isset($_POST['get_general'])) {

    $q = "SELECT * FROM instellingen WHERE id = ?";
    $values = [1];
    $res = selecteren($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}
