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

        $dob = date('d-m-Y', strtotime($row['dob']));

        $del_btn = "<button type='button' onclick='remove_user($row[sr_no])' class='btn btn-danger shadow-none btn-sm'>
        <i class='bi bi-trash'></i>
        </button>";

        $verified = '<span class="badge bg-warning text-dark"><i class="bi bi-x-lg"></i></span>';

        if ($row['is_verified']) {
            $verified = '<span class="badge bg-success text-dark"><i class="bi bi-check-lg"></i></span>';
            $del_btn = '';
        }

        $status = "<button onclick='toggle_status($row[sr_no], 0)' class='btn btn-dark btn-sm shadow-none'>actief</button>";

        if (!$row["status"]) {
            $status =  "<button onclick='toggle_status($row[sr_no], 1)' class='btn btn-danger btn-sm shadow-none'>inactief</button>";
        }

        $date = date('d-m-Y', strtotime($row['datentime']));
        $zipcode = "zip-code";
        $data .= "
        <tr>
            <td>$i</td>
            <td>
            <img src='$path$row[profile]' width='55px' height='55px' style='object-fit: cover;'>
            <br>
            $row[name]
            </td>
            <td>$row[email]</td>
            <td>$row[phonenum]</td>
            <td>$row[address]</td>
            <td>$row[$zipcode]</td>
            <td>$row[residence]</td>
            <td>$dob</td>
            <td>$verified</td>
            <td>$status</td>
            <td>$date</td>
            <td>$del_btn</td>   
        </tr>";
        $i++;
    }

    echo $data;
}

if (isset($_POST['toggle_status'])) {

    $frm_data = filteration($_POST);

    $q = "UPDATE `user_cred` SET `status`=? WHERE `sr_no`=?";
    $v = [$frm_data['value'], $frm_data['toggle_status']];

    if (update($q, $v, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['remove_user'])) {

    $frm_data = filteration($_POST);
   
    $res = deleteRow("DELETE FROM `user_cred` WHERE `sr_no`=? AND `is_verified`=?", [$frm_data['user_id'], 0], 'ii');

    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
}   

if (isset($_POST['search_user'])) {

    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";

    $res = select($query, ["%$frm_data[name]%"], 's');
    $i = 1;
    $path = USERS_IMG_PATH;

    $i = 1;
    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {

        //Format to Dutch date
        $dob = date('d-m-Y', strtotime($row['dob']));

        $del_btn = "<button type='button' onclick='remove_user($row[sr_no])' class='btn btn-danger shadow-none btn-sm'>
        <i class='bi bi-trash'></i>
        </button>";

        $verified = '<span class="badge bg-warning text-dark"><i class="bi bi-x-lg"></i></span>';

        if ($row['is_verified']) {
            $verified = '<span class="badge bg-success text-dark"><i class="bi bi-check-lg"></i></span>';
            $del_btn = '';
        }

        $status = "<button onclick='toggle_status($row[sr_no], 0)' class='btn btn-dark btn-sm shadow-none'>active</button>";

        if (!$row["status"]) {
            $status =  "<button onclick='toggle_status($row[sr_no], 1)' class='btn btn-danger btn-sm shadow-none'>inactive</button>";
        }

        $date = date('d-m-Y', strtotime($row['datentime']));
        $zipcode = "zip-code";
        $data .= "
            <tr>
            <td>$i</td>
            <td>
            <img src='$path$row[profile]' width='55px' height='55px' style='object-fit: cover;'>
            <br>
            $row[name]
            </td>
            <td>$row[email]</td>
            <td>$row[phonenum]</td>
            <td>$row[address]</td>
            <td>$row[$zipcode]</td>
            <td>$row[residence]</td>
            <td>$dob</td>
            <td>$verified</td>
            <td>$status</td>
            <td>$date</td>
            <td>$del_btn</td>
            </tr>
        ";
        $i++;
    }

    echo $data;
}