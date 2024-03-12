<?php
require('includes/header.php');
?>

    <!-- SECTIE: Slider -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="afbeeldingen/carousel/1.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="afbeeldingen/carousel/2.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="afbeeldingen/carousel/3.png" class="w-100 d-block" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- SECTIE: Beschikbaarheidsformulier -->
    <div class="container beschikbaarheid-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5>Check voor beschikbaarheid</h5>
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
                            <button type="submit" class="btn text-white shadow-none custom-bg">Zoek</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SECTIE: Auto's-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">ONZE AUTO'S</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="afbeeldingen/auto's/auto1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Naam auto</h5>
                        <h6 class="mb-4">€200 per dag</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="afbeeldingen/auto's/auto1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Naam auto</h5>
                        <h6 class="mb-4"> €200 per dag</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="afbeeldingen/auto's/auto1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Naam auto</h5>
                        <h6 class="mb-4"> €200 per dag</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Meer auto's >>></a>
            </div>
        </div>
    </div>

    <!-- SECTIE: Busjes-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">ONZE BUSJES</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="afbeeldingen/busjes/busje1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Naam busje</h5>
                        <h6 class="mb-4">€200 per dag</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="afbeeldingen/busjes/busje1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Naam auto</h5>
                        <h6 class="mb-4"> €200 per dag</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                    <img src="afbeeldingen/busjes/busje1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Naam auto</h5>
                        <h6 class="mb-4"> €200 per dag</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserveer</a>
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

    <!-- SECTIE: Onze Gegevens -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">ONZE GEGEVENS</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2434.7885849820514!2d5.272490892949089!3d52.39238277355362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c617c1dcedf6af%3A0xb7e60f149191e0f!2sMBO%20College%20Almere%20-%20ROC%20van%20Flevoland!5e0!3m2!1snl!2snl!4v1709920459204!5m2!1snl!2snl" loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Neem contact met ons op:</h5>
                    <a href="TEL +917778889991" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> (036) 123 45 67
                    </a>
                    <br>
                    <a href="TEL +917778889991" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> rent-a-car@mail.com
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Adres</h5>
                    <div class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-geo-alt-fill"></i>
                            Autopad 12
                        </span>
                    </div>
                    <br>
                    <div class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-house-fill"></i>
                            1335 YY
                        </span>
                    </div>
                    <br>
                    <div class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-buildings-fill"></i>
                            Almere
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php
    require('includes/footer.php');
   ?>