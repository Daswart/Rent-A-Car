<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php') ?>
    <title><?php echo $settings_r['site_title'] ?> - RESERVERING STATUS</title>
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

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-3 px-4">
                <h2 class="fw-bold">RESERVERING STATUS</h2>
            </div>
            <div class="col-12 x-4">
                <p class="fw-bold alert alert-success">
                    <i class="bi bi-check-circle-fill"></i>
                    Gegevens zijn verwerkt! Reserveren gelukt!;
                    <br><br>
                    <a href="bookings.php">Ga naar Reserveringen</a>
                </p>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php') ?>
</body>

</html>