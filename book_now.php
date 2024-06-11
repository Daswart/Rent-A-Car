<?php
require('/admin/inc/db_config.php');
require('/admin/inc/essentials.php');

date_default_timezone_set("Europe/Amsterdam");

session_start();

if(!isset($_SESSION['login']) && $_SESSION['login'] ==  true){

}

if(isset($_POST['book_now'])){

    $ORDER_ID = 'ORD_' . $_SESSION['uId'] . random_int(11111, 9999999);
    $CUST_ID = $_SESSION['uId'];
    $TXN_AMOUNT = $_POST["car"]['payment'];

    // insert payment data into database
    $frm_data = filteration($_POST);
    $query = "INSERT INTO `booking_order`(`user_id`, `car_id`, `check_in`, `check_out`, `order_id`,)
    VALUES (?,?,?,?,?)";

    insert($query1,[$CUST_ID, $_SESSION['car']['id'], $frm_data['checkin'], 
    $frm_data['checkout'], $ORDER_ID], 'iisss');
}