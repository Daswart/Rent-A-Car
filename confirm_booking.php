<?php
session_start() 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php') ?>
    <title><?php echo $settings_r['site_title'] ?> - CONFIRM BOOKING</title>
    <style>
        .bi-twitter:hover {
            color: #1DA1F2;
        }

        .bi-facebook:hover {
            color: #1877F2;
        }

        .bi-instagram:hover {
            color: #fa7e1e;
        }
    </style>
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <?php

    /*
     check car id from url is present or not
     Shutdown mode is active or not
     User is logged in or not 
    */

    if (!isset($_GET['id']) || $settings_r['shutdown'] == true) {
        redirect('cars.php');
    } else if (!isset($_SESSION['login']) &&  $_SESSION['login'] == true) {
        redirect('cars.php');
    }

    // filter and get car and user data

    $data = filteration($_GET);

    $car_res = select("SELECT * FROM `cars` WHERE `sr_no`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($car_res) == 0) {
        redirect('cars.php');
    }

    $car_data = mysqli_fetch_assoc($car_res);

    $_SESSION['car'] = [
        "id" => $car_data['sr_no'],
        "name" => $car_data['brand'] . " " . $car_data['type'],
        "price" => $car_data['cost_per_day'],
        "payment" => null,
        "available" => false,
    ];

    $user_res = select("SELECT * FROM `user_cred` WHERE `sr_no` =? LIMIT 1", [$_SESSION['uId']], "i");
    $user_data = mysqli_fetch_assoc($user_res);

    ?>

    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">BEVESTIG RESERVERING</h2>
                <div style="font-size: 14px">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span> > </span>
                    <a href="cars.php" class="text-secondary text-decoration-none">AUTO'S</a>
                    <span> > </span>
                    <a href="#" class="text-secondary text-decoration-none">BEVESTIGEN</a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <?php
                $car_thumb = CARS_IMG_PATH . "thumbnail.jpg";
                $thumb_q = mysqli_query($con, "SELECT * FROM `car_images` 
                 WHERE `car_id` = $car_data[sr_no] 
                 AND `thumb`= '1'");

                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $car_thumb = CARS_IMG_PATH . $thumb_res['image'];
                }

                echo <<<data
                 <div class="card p-3 shadow-sm rounded">
                 <img src="$car_thumb" class="img-fluid rounded mb-3">
                 <h5>$car_data[brand] $car_data[type]</h5>
                 <h6>€$car_data[cost_per_day] per dag </h6>
                 </div>
                 data;

                ?>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form action="#">
                            <h6 class="mb-3">RESERVERING DETAILS</h6>
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label class="form-label mb-1">Naam</label>
                                    <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label mb-1">Telefoonnummer</label>
                                    <input name="phonenum" type="text" value="<?php echo $user_data['phonenum'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label mb-1">Adres</label>
                                    <textarea name="address" class="form-control shadow-none" rows="1" required><?php echo $user_data['address'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label mb-1">Begindatum</label>
                                    <input name="check-in" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label mb-1">Einddatum</label>
                                    <input name="check-out" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-12">
                                    <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1">Reserveren</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php') ?>

</body>

</html>