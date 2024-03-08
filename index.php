<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-A-Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="icon" type="image/x-icon" href="afbeeldingen/auto's/favicon.png">
    <style>
        * {
            font-family: 'Poppins', 'sans-serif';
        }

        .h-font {
            font-family: 'Merienda', cursive;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            appearance: textfield;
            -moz-appearance: textfield;
        }

        .custom-bg {
            background-color: #2ec1ac;
        }

        .custom-bg:hover {
            background-color: #279e8c;
        }

        .beschikbaarheid-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .beschikbaarheid-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>

</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top ">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Rent-A-Car</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Auto huren</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Busje Huren</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Over Ons</a>
                    </li>

                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Inloggen
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Registreren
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Inloggen Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form></form>
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> Klant inloggen
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Wachtwoord</label>
                        <input type="password" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button class="btn btn-dark shadwon-none">Inloggen</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Wachtwoord vergeten?</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Registreren Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i>
                            Klant registreren
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                            ...
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Naam</label>
                                    <input type="text" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Telefoon nummer</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Afbeelding profiel</label>
                                    <input type="file" class="form-control shadow-none">
                                </div>
                                <div class="col-md-12 ps-0 mb-3">
                                    <label class="form-label">Postcode</label>
                                    <textarea class="form-control shadow-none" rows="1"></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Straat + huisnummer</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Woonplaats</label>
                                    <input type="text" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Wachtwoord</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Bevestig wachtwoord</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">REGISTREREN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <br><br><br>
    <br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Initieer Slider -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });
    </script>
</body>

</html>