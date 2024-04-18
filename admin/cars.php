<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Cars </title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">AUTO'S</h3>

                <!-- Car section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-car">
                                <i class="bi bi-plus-square"></i> Toevoegen
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class=" bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Kenteken</th>
                                        <th scope="col">Merk</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Prijs</th>
                                        <th scope="col">Beschrijving</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                </thead>
                                <tbody id="car-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add car modal -->
    <div class="modal fade" id="add-car" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_car_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Auto Toevoegen</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kenteken</label>
                                <input type="text" name="license_plate" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Merk</label>
                                <input type="text" min="1" name="brand" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Type</label>
                                <input type="text" min="1" name="type" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Prijs per dag</label>
                                <input type="number" min="1" name="cost_per_day" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Beschrijving</label>
                                <textarea name="description" rows="4" class="form-control shadow-none"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Annuleer</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Verzenden</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit car modal -->
    <div class="modal fade" id="edit_car" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="edit_car_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Auto Bewerken</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kenteken</label>
                                <input type="text" name="license_plate" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Merk</label>
                                <input type="text" min="1" name="brand" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Type</label>
                                <input type="text" min="1" name="type" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Prijs per dag</label>
                                <input type="number" min="1" name="cost_per_day" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Beschrijving</label>
                                <textarea name="description" rows="4" class="form-control shadow-none"></textarea>
                            </div>
                            <input type="hidden" name="car_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Annuleer</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Verzenden</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Manage car images modal -->
    <div class="modal fade" id="car_images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Auto naam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="image-alert"></div>
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold">Afbeelding Toevoegen</label>
                            <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                            <button type="submit" class="btn custom-bg text-white shadow-none">TOEVOEGEN</button>
                            <input type="hidden" name="car_id">
                        </form>
                    </div>
                    <div class="table-responsive-md" style="height: 350px; overflow-y: scroll">
                        <table class="table table-hover border text-center">
                            <thead>
                                <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" width="60%">Afbeelding</th>
                                    <th scope="col">Voorbeeld</th>
                                    <th scope="col">Verwijder</th>
                                </tr>
                            </thead>
                            <tbody id="car-image-data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script>
        let add_car_form = document.getElementById('add_car_form');

        add_car_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_cars();
        })

        function add_cars() {
            let data = new FormData();
            data.append('add_car', '');
            data.append('license_plate', add_car_form.elements['license_plate'].value);
            data.append('brand', add_car_form.elements['brand'].value);
            data.append('type', add_car_form.elements['type'].value);
            data.append('cost_per_day', add_car_form.elements['cost_per_day'].value);
            data.append('description', add_car_form.elements['description'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);

            xhr.onload = function() {
                console.log(this.responseText);
                var myModal = document.getElementById('add-car');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 1) {
                    alert('success', 'Nieuwe auto toegevoegd!');
                    add_car_form.reset();
                    get_all_cars();
                } else {
                    alert('error', 'Oeps, Er is iets misgegaan!');
                }

            }

            xhr.send(data);
        }

        function get_all_cars() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('car-data').innerHTML = this.responseText;
            }


            xhr.send('get_all_cars');
        }

        let edit_car_form = document.getElementById('edit_car_form');

        function edit_details(id) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            xhr.onload = function() {
                console.log(JSON.parse(this.responseText));

                let data = JSON.parse(this.responseText);
                edit_car_form.elements['car_id'].value = data.roomdata.sr_no;
                edit_car_form.elements['license_plate'].value = data.roomdata.license_plate;
                edit_car_form.elements['brand'].value = data.roomdata.brand;
                edit_car_form.elements['type'].value = data.roomdata.type;
                edit_car_form.elements['cost_per_day'].value = data.roomdata.cost_per_day;
                edit_car_form.elements['description'].value = data.roomdata.description;
            }

            xhr.send('get_car=' + id);
        }

        edit_car_form.addEventListener('submit', function(e) {
            e.preventDefault();
            submit_edit_car();
        })

        function submit_edit_car() {
            let data = new FormData();
            data.append('edit_car', '');
            data.append('car_id', edit_car_form.elements['car_id'].value);
            data.append('license_plate', edit_car_form.elements['license_plate'].value);
            data.append('brand', edit_car_form.elements['brand'].value);
            data.append('type', edit_car_form.elements['type'].value);
            data.append('cost_per_day', edit_car_form.elements['cost_per_day'].value);
            data.append('description', edit_car_form.elements['description'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);

            xhr.onload = function() {
                console.log(this.responseText);
                var myModal = document.getElementById('edit_car');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 1) {
                    alert('success', 'Auto is geüpdatet!');
                    edit_car_form.reset();
                    get_all_cars();
                } else {
                    alert('error', 'Oops, er is iets misgegaan!');
                }

            }

            xhr.send(data);
        }

        function toggle_status(id, val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', 'Status aangepast!');
                    get_all_cars();
                } else {
                    alert('error', 'Oops!Er is iets misgegaan!');
                }
            }


            xhr.send('toggle_status=' + id + "&value=" + val);
        }

        let add_image_form = document.getElementById('add_image_form');

        add_image_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_image();
        })

        function add_image() {
            let data = new FormData();
            data.append('image', add_image_form.elements['image'].files[0]);
            data.append('car_id', add_image_form.elements['car_id'].value);
            data.append('add_image', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);

            xhr.onload = function() {

                if (this.responseText == 'inv_img') {
                    alert('error', 'Alleen afbeeldingen van het type JPG, WEBP of PNG zijn toegestaan!', 'image-alert');
                } else if (this.responseText == 'inv_size') {
                    alert('error', 'De afbeelding moet kleiner zijn dan 2MB!', 'image-alert');
                } else if (this.responseText == 'upd_failed') {
                    alert('error', 'Uploaden van de afbeelding is mislukt', 'image-alert');
                } else {
                    alert('success', 'Nieuwe afbeelding toegevoegd!', 'image-alert');
                    car_images(add_image_form.elements['car_id'].value, document.querySelector("#car_images .modal-title").innerText);
                    add_image_form.reset();
                }
            }
            xhr.send(data);
        }

        function car_images(id, brand) {
            document.querySelector("#car_images .modal-title").innerText = brand;
            add_image_form.elements['car_id'].value = id;

            add_image_form['image'].value = '';

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('car-image-data').innerHTML = this.responseText;
            }

            xhr.send('get_car_images=' + id);
        }

        function rem_image(img_id, car_id) {

            let data = new FormData();
            data.append('image_id', img_id);
            data.append('car_id', car_id);
            data.append('rem_image', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);

            xhr.onload = function() {

                if (this.responseText == 1) {
                    alert('success', 'Afbeelding verwijderd!', 'image-alert');
                    car_images(car_id, document.querySelector("#car_images .modal-title").innerText);
                } else {
                    alert('error', 'Afbeedling verwijderen mislukt!', 'image-alert');
                }
            }
            xhr.send(data);
        }

        function thumb_image(img_id, car_id) {

            let data = new FormData();
            data.append('image_id', img_id);
            data.append('car_id', car_id);
            data.append('thumb_image', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);

            xhr.onload = function() {

                if (this.responseText == 1) {
                    alert('success', 'Afbeelding Thumbnail veranderd!', 'image-alert');
                    car_images(car_id, document.querySelector("#car_images .modal-title").innerText);
                } else {
                    alert('error', 'Veranderen Afbeelding Thumbnail muslukt!', 'image-alert');
                }
            }
            xhr.send(data);
        }
        window.onload = function() {
            get_all_cars();
        }
    </script>
</body>

</html>