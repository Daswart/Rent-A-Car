<?php
session_start();
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

date_default_timezone_set("Europe/Amsterdam");


if(!isset($_SESSION['login']) && $_SESSION['login'] ==  true){

}

if(isset($_POST['book_now'])){

    $ORDER_ID = 'ORD_' . $_SESSION['uId'] . random_int(11111, 9999999);
    $CUST_ID = $_SESSION['uId'];
    $TXN_AMOUNT = $_SESSION["car"]['payment'];

    // insert payment data into database
    $frm_data = filteration($_POST);
    $query1 = "INSERT INTO `booking_order`(`user_id`, `car_id`, `check_in`, `check_out`, `order_id`)
    VALUES (?,?,?,?,?)";

    insert($query1,[$CUST_ID, $_SESSION['car']['id'], $frm_data['checkin'], 
    $frm_data['checkout'], $ORDER_ID], 'iisss');

    $booking_id = mysqli_insert_id($con);

    $query2 = "INSERT INTO `booking_details`(`booking_id`, `car_name`, `price`, `total_pay`, 
    `user_name`, `phonenum`, `address`) VALUES (?,?,?,?,?,?,?)";

    insert($query2, [
        $booking_id, $_SESSION['car']['name'], $_SESSION['car']['price'], $TXN_AMOUNT,
        $frm_data['name'], $frm_data['phonenum'], $frm_data['address']
    ], 'isiisss');
}

?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">

    <style>
        .centerDiv {
            position: absolute;
            display: flex;
            flex-direction: column;
            gap: 3em;
            align-items: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .spinner-border {
            width: 10rem;
            height: 10rem;
            border-width: 1em;
        }
        .text-info{
            color: #77D7C9 !important;
        }
    </style>
</head>


<body>
    <div class="centerDiv">
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div>
            <h1 style="color: #77D7C9; text-align: center;">Een moment geduld alstublieft...<br>Gegevens worden verwerkt.</h1>
        </div>
    </div>
    <script>
          setTimeout(function() { window.location.href='book_status.php'  }, 3000);
    </script>
</body>

</html>