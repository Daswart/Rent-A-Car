<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['add_car'])) {

    $facilities = filteration(json_decode($_POST['facilities']));

    $form_data = filteration($_POST);
    $flag = 0;

    $ql = "INSERT INTO `cars`(`license_plate`, `brand`, `type`, `cost_per_day`, `description`) VALUES (?,?,?,?,?)";
    $values = [$frm_data['name'], $frm_data['license_plae'], $frm_data['cost_per_day'], $frm_data['description'], $frm_data['adult'], $frm_data['children'], $frm_data['description']];

    if (insert($ql, $values, 'sssis')) {
        $flag = 1;
    }
}
