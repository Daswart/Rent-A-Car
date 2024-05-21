<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENT-A-CAR - CAR DETAILS</title>
    <?php require('inc/links.php') ?>
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

        .car-image {
            height: 400px;
            width: 600px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>
    <?php
    if (!isset($_GET['id'])) {
        redirect('cars.php');
    }
    $data = filteration($_GET);

    $car_res = select("SELECT * FROM `cars` WHERE `sr_no`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($car_res) == 0) {
        redirect('cars.php');
    }
    $car_data = mysqli_fetch_assoc($car_res);
    ?>

    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold"><?php echo $car_data['brand'] . ' ' . $car_data['type'] ?></h2>
                <div style="font-size: 14px">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span> > </span>
                    <a href="cars.php" class="text-secondary text-decoration-none">AUTO'S</a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $car_img = CARS_IMG_PATH . "thumbnail.jpg";
                        $img_q = mysqli_query($con, "SELECT * FROM `car_images` 
                                WHERE `car_id` = $car_data[sr_no] ORDER BY `thumb` DESC");

                        if (mysqli_num_rows($img_q) > 0) {

                            $active_class = 'active';

                            while ($img_res = mysqli_fetch_assoc($img_q)) {
                                echo "<div class='carousel-item $active_class'>
                                        <img src='" . CARS_IMG_PATH . $img_res['image'] . "' class='d-block w-100 rounded car-image'>
                                    </div>";

                                $active_class = '';
                            }
                        } else {
                            echo "<div class='carousel-item active'>
                                    <img src='$car_img' class='d-block w-100'>
                                </div>";
                        }

                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <?php

                        echo <<<price
                            <h4><span style='color: #2EC1AC'>$$car_data[cost_per_day]</span> per dag</h3>
                        price;

                        echo <<<license_plate
                        <div class="mb-3">
                            <h6 class="mb-1">Kenteken</h6>
                              <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                    $car_data[license_plate]
                                    </span>
                        </div>
                        license_plate;

                        echo <<<description
                        <div class="mb-4">
                            <h5>Informatie</h5>
                            <p>$car_data[description]</p>
                        </div> 
                        description;

                        echo <<<book
                        <a href="#" class="btn w-100 text-white custom-bg shadow-none mb-1">Reserveer Nu</a>
                        book;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php') ?>

</body>

</html>