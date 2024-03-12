<?php
require('includes/header.php');
?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">ONZE AUTO'S</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Ratione ad incidunt distinctio <br> recusandae et quisquam ex
        optio delectus assumenda sed?</p>
</div>

<div class="container">
    <div class="row">

        <!-- Sidenav -->
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch">
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px">CHECK BESCHIKBAARHEID</h5>
                            <label class="form-label" style="font-weight: 500">Begindatum</label>
                            <input type="date" class="form-control shadow-none mb-3">
                            <label class="form-label" style="font-weight: 500">Einddatum</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Auto's -->
        <div class="col-lg-9 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="afbeeldingen/auto's/auto1.jpg" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5>Naam auto</h5>
                        <div class="features mb-3">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-align-center">
                        <h6 class="mb-4">$200 per dag</h6>
                        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Reserveer</a>
                        <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Meer info</a>
                    </div>
                </div>
            </div>
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="afbeeldingen/auto's/auto1.jpg" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5>Naam auto</h5>
                        <div class="features mb-3">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-align-center">
                        <h6 class="mb-4">$200 per dag</h6>
                        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Reserveer</a>
                        <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Meer info</a>
                    </div>
                </div>
            </div>
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="afbeeldingen/auto's/auto1.jpg" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5>Naam auto</h5>
                        <div class="features mb-3">
                            <h6 class="mb-1">Merk:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Merk naam
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Type:</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Type naam
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-align-center">
                        <h6 class="mb-4">$200 per dag</h6>
                        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Reserveer</a>
                        <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Meer info</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require('includes/footer.php');
?>