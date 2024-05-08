<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

if (isset($_POST['register'])) {

    $data = filteration($_POST);

    // match password an confirm password field

    if ($data['pass'] != $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // check user exists
    // $u_exist = select(
    //     "SELECT * FROM `user_cred` WHERE `email` = ? AND `phonenum` = ?",
    //     [$data['email'], $data['phonenum']],
    //     "ss"
    // );

    // if (mysqli_num_rows($u_exist) != 0) {
    // }
}
