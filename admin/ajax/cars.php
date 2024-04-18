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
            $status = "<button onclick='toggle_status($row[sr_no], 0)' class='btn btn-success btn-sm shadow-none'>beschikbaar</button>";
        } else {
            $status = "<button onclick='toggle_status($row[sr_no], 1)' class='btn btn-danger btn-sm shadow-none'>niet beschikbaar</button>";
        }
        $description = strlen($row['description']) > 100 ? substr($row['description'], 0, 100) . "..." : $row['description'];
        $data .= "
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[license_plate]</td>
            <td>$row[brand]</td>
            <td>$row[type]</td>
            <td>$$row[cost_per_day]</td>
            <td>$description</td>
            <td>$status</td>
            <td>
                <button type='button' onclick='edit_details($row[sr_no])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit_car'>
                    <i class='bi bi-pencil-square'></i>
                </button>
                 <button type='button' onclick=\"car_images($row[sr_no], '$row[brand]', '$row[type]', '$row[license_plate]' )\"  class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#car_images'>
                    <i class='bi bi-images'></i>
                </button>
            </td>
        </tr class='align-middle'>";
        $i++;
    }

    echo $data;
}

if (isset($_POST['get_car'])) {

    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `cars` WHERE `sr_no`=?", [$frm_data['get_car']], 'i');

    $roomdata = mysqli_fetch_assoc($res1);

    $data = ["roomdata" => $roomdata];

    $data = json_encode($data);

    echo $data;
}

if (isset($_POST['edit_car'])) {

    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "UPDATE `cars` SET `license_plate`=?, `brand`=?, `type`=?, `cost_per_day`=?, 
    `description`=? WHERE `sr_no` =?";
    $values = [$frm_data['license_plate'], $frm_data['brand'], $frm_data['type'], $frm_data['cost_per_day'], $frm_data['description'], $frm_data['car_id']];
    if (update($q1, $values, 'sssisi')) {
        $flag = 1;
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['toggle_status'])) {

    $frm_data = filteration($_POST);

    $q = "UPDATE `cars` SET `status`=? WHERE `sr_no`=?";
    $v = [$frm_data['value'], $frm_data['toggle_status']];

    if (update($q, $v, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['add_image'])) {
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['image'], CARS_FOLDER);

    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = "INSERT INTO `car_images`(`car_id`, `image`) VALUES (?,?)";
        $values = [$frm_data['car_id'], $img_r];
        $res = insert($q, $values, 'is');
        echo $res;
    }
}

if (isset($_POST['get_car_images'])) {

    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `car_images` WHERE `car_id`=?", [$frm_data['get_car_images']], 'i');

    $path = CARS_IMG_PATH;

    while ($row = mysqli_fetch_assoc($res)) {

        if ($row['thumb'] == 1) {
            $thumb_btn = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded'></i>";
        } else {
            $thumb_btn = "<button onclick='thumb_image($row[sr_no], $row[car_id])' class='btn btn-secondary btn-sm shadow-none'>
                <i class='bi bi-check-lg'></i>
                </button>";
        }

        echo <<<data
            <tr class='align-middle'>
            <td><img src='$path$row[image]' class='img-fluid'></td>
            <td>$thumb_btn</td>
            <td>
                <button onclick='rem_image($row[sr_no], $row[car_id])' class='btn btn-danger btn-sm shadow-none'>
                <i class='bi bi-trash'></i>
                </button>
            </td> 
            </tr>
        data;
    }
}

if (isset($_POST['rem_image'])) {

    $frm_data = filteration($_POST);

    $values = [$frm_data['image_id'], $frm_data['car_id']];

    $pre_q = "SELECT * FROM `car_images` WHERE `sr_no`=? AND `car_id`=?";
    $res = select($pre_q, $values, 'ii');
    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['image'], CARS_FOLDER)) {
        $q = "DELETE FROM `car_images` WHERE `sr_no`=? AND `car_id`=?";
        $res = deleteRow($q, $values, 'ii');
        echo $res;
    } else {
        echo 0;
    }
}


if (isset($_POST['thumb_image'])) {

    $frm_data = filteration($_POST);

    // Set all thumb to 0 on all images
    $pre_q = "UPDATE `car_images` SET `thumb`=? WHERE `car_id`=?";
    $pre_v = [0, $frm_data['car_id']];
    $pre_res = update($pre_q, $pre_v, 'ii');

    // Set thumb to 1 to clicked image
    $q = "UPDATE `car_images` SET `thumb`=? WHERE `sr_no`=? AND `car_id`=?";
    $v = [1, $frm_data['image_id'], $frm_data['car_id']];
    $pre_res = update($q, $v, 'iii');

    echo $pre_res;
}