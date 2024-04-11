<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['add_car'])) {


    $frm_data = filteration($_POST);
    $flag = 0;

    $ql = "INSERT INTO `cars`(`license_plate`, `brand`, `type`, `cost_per_day`, `description`) VALUES (?,?,?,?,?)";
    $values = [$frm_data['license_plate'], $frm_data['brand'], $frm_data['type'], $frm_data['cost_per_day'], $frm_data['description']];

    if (insert($ql, $values, 'sssis')) {
        $flag = 1;
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['get_all_cars'])) {
    $res = selectAll('cars');
    $i = 1;

    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['status'] == 1) {
            $status = "<button class='btn btn-dark btn-sm shadow-none'>beschikbaar</button>";
        } else {
            $status = "<button class='btn btn-warning btn-sm shadow-none'>niet beschikbaar</button>";
        }
        $data .= "
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[license_plate]</td>
            <td>$row[brand]</td>
            <td>$row[type]</td>
            <td>$$row[cost_per_day]</td>
            <td>$row[description]</td>
            <td>$status</td>
            <td>Buttons</td>
        </tr>";
        $i++;
    }

    echo $data;
}
