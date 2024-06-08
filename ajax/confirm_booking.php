<?php
session_start();
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

date_default_timezone_set("Europe/Amsterdam");

if (isset($_POST['check_availability'])) {

    $frm_data  = filteration($_POST);
    $status = "";
    $result = "";

    // check in and out validations

    $today_date = new DateTime(date("Y-m-d"));
    $checkin_date = new DateTime($frm_data['check_in']);
    $checkout_date = new DateTime($frm_data['check_out']);

    if ($checkin_date == $checkout_date) {
        $status = 'check_in_out_equal';
        $result = json_encode(["status" => $status]);
    } else if ($checkout_date < $checkin_date) {
        $status = 'check_out_earlier';
        $result = json_encode(["status" => $status]);
    } else if ($checkin_date < $today_date) {
        $status = 'check_in_earlier';
        $result = json_encode(["status" => $status]);
    }

    // check booking availability if status is blank else return the error
    if ($status != '') {
        echo $result;
    } else {
        $_SESSION['car'];

        // run query to check room is available or not

        $count_days = date_diff($checkin_date, $checkout_date)->days;
        $payment = $_SESSION['car']['price'] * $count_days;

        $_SESSION['car']['payment'] = $payment;
        $_SESSION['car']['available'] = true; 

        $result = json_encode(["status"=>'available', "days"=>$count_days, "payment"=>$payment]);
        echo $result;
    }
}