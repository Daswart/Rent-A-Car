<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-A-Car</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php') ?>
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }

        .car-image {
            width: 350px;
            height: 250px;
            object-fit: cover;
        }
    </style>

</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <!-- Swiper -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                $res = selectAll('carousel');

                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                        
                        <div class="swiper-slide">
                         <img src="$path$row[image]" class="w-100 d-block" />
                        </div>
                    data;
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Check availability form -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5>Check beschikbaarheid</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-5 mb-3">
                            <label class="form-label" style="font-weight: 500">Begindatum</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-5 mb-3">
                            <label class="form-label" style="font-weight: 500">Einddatum</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Verzenden</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Onze auto's-->
    <h2 class="mt-5 pt-4 text-center fw-bold h-font">ONZE DUURSTE AUTO'S</h2>
    <div class="h-line bg-dark mb-4"></div>
    <div class="container">
        <div class="row">
            <?php

            // get cars 
            $car_res = select("SELECT * FROM `cars` WHERE `status`=? AND `removed`=? ORDER BY `cost_per_day` DESC LIMIT 3", [1, 0], 'ii');

            while ($car_data = mysqli_fetch_assoc($car_res)) {

                // get thumbnail of image
                $car_thumb = CARS_IMG_PATH . "thumbnail.jpg";
                $thumb_q = mysqli_query($con, "SELECT * FROM `car_images` 
                    WHERE `car_id` = $car_data[sr_no] 
                    AND `thumb`= '1'");

                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $car_thumb = CARS_IMG_PATH . $thumb_res['image'];
                }

                $description = strlen($car_data['description']) > 100 ? substr($car_data['description'], 0, 100) . "..." : $car_data['description'];

                $book_btn = "";

                if(!$settings_r['shutdown']){
                    $login = 0;
                    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                        $login = 1;
                    }    
                    $book_btn = "<button onclick='checkLoginToBook($login, $car_data[sr_no])' 
                    class='btn btn-sm text-white custom-bg shadow-none'>Reserveer</button>";
                }

                // print car card
                echo <<<data
                    <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                        <img src="$car_thumb" class="card-img-top car-image">
                        <div class="card-body">
                            <h5>$car_data[brand] $car_data[type]</h5>
                            <h6 class="mb-4"><span style='color: #2EC1AC'>$$car_data[cost_per_day]</span> per dag</h6>
                            <div class="kenteken mb-4">
                                <h6 class="mb-1">Kenteken</h6>
                                 <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                  $car_data[license_plate]
                                </span>
                            </div>
                                <div class="mb-4">
                            <h6>Informatie</h6>
                            <p> $description</p>
                            </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                $book_btn
                                <a href="car_details.php?id=$car_data[sr_no]" class="btn btn-sm btn-outline-dark shadow-none">Meer Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    data;
            }
            ?>

            <div class="col-lg-12 text-center mt-5">
                <a href="cars.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Meer auto's >>></a>
            </div>
        </div>
    </div>

    <!-- Onze busjes-->
    <h2 class="mt-5 pt-4 text-center fw-bold h-font">ONZE BUSJES</h2>
    <div class="h-line bg-dark mb-4"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="images/busjes/1.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Busje naam</h5>
                        <h6 class="mb-4">$200 per dag</h6>
                        <div class="merk mb-4">
                            <h6 class="mb-1">Merk</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk Naam
                        </div>
                        <div class="type mb-4">
                            <h6 class="mb-1">Type</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer nu</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="images/busjes/1.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Busje naam</h5>
                        <h6 class="mb-4">$200 per dag</h6>
                        <div class="merk mb-4">
                            <h6 class="mb-1">Merk</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk Naam
                        </div>
                        <div class="type mb-4">
                            <h6 class="mb-1">Type</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer nu</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="images/busjes/1.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Busje naam</h5>
                        <h6 class="mb-4">$200 per dag</h6>
                        <div class="merk mb-4">
                            <h6 class="mb-1">Merk</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk Naam
                        </div>
                        <div class="type mb-4">
                            <h6 class="mb-1">Type</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer nu</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Meer busjes >>></a>
            </div>
        </div>
    </div>

    <!-- Recensies -->
    <!-- <h2 class="mt-5 pt-4 text-center fw-bold h-font">RECENSIES</h2>
    <div class="h-line bg-dark mb-4"></div>
    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/features/star.svg" width="30px">
                        <h6 class="m-0 ms-2">Random gebruiker1</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Tenetur, praesentium quidem velit minus facilis esse consectetur
                        alias ipsum placeat!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/features/star.svg" width="30px">
                        <h6 class="m-0 ms-2">Random gebruiker2</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Tenetur, praesentium quidem velit minus facilis esse consectetur
                        alias ipsum placeat!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/features/star.svg" width="30px">
                        <h6 class="m-0 ms-2">Random gebruiker3</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Tenetur, praesentium quidem velit minus facilis esse consectetur
                        alias ipsum placeat!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Meer >>></a>
        </div>
    </div> -->

    <!-- Contact -->
    <?php
    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    ?>

    <h2 class="mt-5 pt-4 text-center fw-bold h-font">CONTACT</h2>
    <div class="h-line bg-dark mb-4"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100" height="450" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Bel ons</h5>
                    <a href="tel +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> <?php echo $contact_r['pn1'] ?>
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Volg ons</h5>
                    <?php
                    if ($contact_r['tw'] != '') {
                        echo <<<data
                            <a href="$contact_r[tw]" target="_blank" class="d-inline-block mb-3">
                                <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i> Twitter
                            </span>
                            </a>
                            <br>
                        data;
                    }
                    ?>
                    <a href="<?php echo $contact_r['fb'] ?>" target="_blank" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['insta'] ?>" target="_blank" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        // Initialize Swiper
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });

        // Initialize Testimonial Swiper 
        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
</body>

</html>