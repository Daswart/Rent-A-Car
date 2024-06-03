<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


if (isset($_POST['get_users'])) {
    $res = selectAll('user_cred');
    $i = 1;
    $path = USERS_IMG_PATH;
    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        $user_id = $row['sr_no'];
        $res2 = mysqli_query($con, "SELECT * FROM `room_images` WHERE `room_id` = '$room_id' AND `thumb` = 1");
        if(mysqli_num_rows($res2) > 0 ){
            $row2 = mysqli_fetch_assoc($res2);
            $image = $row2['image'];
        }else{
            $image = 'thumbnail.jpg';
        }
        if ($row['status'] == 1) {
            $status = "<button onclick='toggle_status($row[sr_no], 0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
        } else {
            $status = "<button onclick='toggle_status($row[sr_no], 1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
        }
        $data .= "
        <tr class='align-middle'>
            <td>$i</td>
             <td><img src='$path$image' alt='' style='width:150px;'></td>
            <td>$row[name]</td>
            <td>$row[area] sq. ft.</td>
            <td>
            <span class='badge rounded pill bg-light text-dark'>
            Adult: $row[adult]
            </span><br>
            <span class='badge rounded pill bg-light text-dark'>
            Children: $row[children]
            </span>    
            </td>
            <td>$$row[price]</td>
            <td>$row[quantity]</td>
            <td>$status</td>
            <td>
                <button type='button' onclick='edit_details($row[sr_no])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit_room'>
                    <i class='bi bi-pencil-square'></i>
                </button>
                <button type='button' onclick=\"room_images($row[sr_no], '$row[name]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room_images'>
                    <i class='bi bi-images'></i>
                </button>
                <button type='button' onclick='remove_room($row[sr_no])' class='btn btn-danger shadow-none btn-sm'>
                    <i class='bi bi-trash'></i>
                </button>
            </td>
        </tr>";
        $i++;
    }

    echo $data;
}

// if (isset($_POST['toggle_status'])) {

//     $frm_data = filteration($_POST);

//     $q = "UPDATE `rooms` SET `status`=? WHERE `sr_no`=?";
//     $v = [$frm_data['value'], $frm_data['toggle_status']];

//     if (update($q, $v, 'ii')) {
//         echo 1;
//     } else {
//         echo 0;
//     }
// }

// if (isset($_POST['remove_room'])) {

//     $frm_data = filteration($_POST);

//     $res = select("SELECT * FROM `room_images` WHERE `room_id`=?", [$frm_data['room_id']], 'i');

//     while ($row = mysqli_fetch_assoc($res)) {
//         deleteImage($row['image'], ROOMS_FOLDER);
//     }

//     $res2 = deleteRow("DELETE FROM `room_images` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
//     $res3 = deleteRow("DELETE FROM `room_features` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
//     $res4 = deleteRow("DELETE FROM `room_facilities` WHERE `room_id`=?", [$frm_data['room_id']], 'i');
//     $res5 = update("UPDATE `rooms` SET `removed`=? WHERE `sr_no`=?", [1, $frm_data['room_id']], 'ii');

//     if ($res2 || $res3 || $res4 || $res5) {
//         echo 1;
//     } else {
//         echo 0;
//     }
// }