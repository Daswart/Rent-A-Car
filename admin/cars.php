<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

//Get facilites from database
$fuel_arr = [];
$gear_arr = [];
$seats_arr = [];
$doors_arr = [];
$suitcase_arr = [];
$res = selectAll('facilities');
while ($opt = mysqli_fetch_assoc($res)) {
    if ($opt['category'] == 'Fuel') {
        array_push($fuel_arr, $opt);
    }
    if ($opt['category'] == 'Gear') {
        array_push($gear_arr, $opt);
    }
    if ($opt['category'] == 'Seats') {
        array_push($seats_arr, $opt);
    }
    if ($opt['category'] == 'Doors') {
        array_push($doors_arr, $opt);
    }
    if ($opt['category'] == 'Suitcase') {
        array_push($suitcase_arr, $opt);
    }
    if ($opt['name'] == 'Airco') {
        $airco_id = $opt['sr_no'];
        $airco_name = $opt['name'];
    }
}
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
                <h3 class="mb-4">AUTOS</h3>

                <!-- Car section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-car">
                                <i class="bi bi-plus-square"></i> Toevoegen
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
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
                                <label class="form-label fw-bold">Faciliteiten</label>
                                <div class="row">
                                    <?php
                                    echo '<label class="form-label text-decoration-underline"></label>';
                                    for ($i = 0; $i < count($fuel_arr); $i++) {
                                        $sr_no  = $fuel_arr[$i]['sr_no'];
                                        $name = $fuel_arr[$i]['name'];
                                        echo "
                                       <div class='col-md-3'>
                                        <label>
                                            <input type='radio' name='fuel' value='$sr_no' class='form-check-input shadow-none'>
                                             $name
                                        </label>
                                    </div>
                                       ";
                                    }
                                    echo '<br><br><label class="form-label text-decoration-underline"></label>';
                                    for ($i = 0; $i < count($gear_arr); $i++) {
                                        $sr_no  = $gear_arr[$i]['sr_no'];
                                        $name = $gear_arr[$i]['name'];
                                        echo "
                                       <div class='col-md-3'>
                                        <label>
                                            <input type='radio' name='gear' value='$sr_no' class='form-check-input shadow-none'>
                                             $name
                                        </label>
                                    </div>
                                       ";
                                    }
                                    echo '<br><br><label class="form-label text-decoration-underline"></label>';
                                    for ($i = 0; $i < count($seats_arr); $i++) {
                                        $sr_no  = $seats_arr[$i]['sr_no'];
                                        $name = $seats_arr[$i]['name'];
                                        echo "
                                       <div class='col-md-3'>
                                        <label>
                                            <input type='radio' name='seats' value='$sr_no' class='form-check-input shadow-none'>
                                             $name
                                        </label>
                                        </div>
                                       ";
                                    }
                                    echo '<br><br><label class="form-label text-decoration-underline"></label>';
                                    for ($i = 0; $i < count($doors_arr); $i++) {
                                        $sr_no  = $doors_arr[$i]['sr_no'];
                                        $name = $doors_arr[$i]['name'];
                                        echo "
                                       <div class='col-md-3'>
                                        <label>
                                            <input type='radio' name='doors' value='$sr_no' class='form-check-input shadow-none'>
                                             $name
                                        </label>
                                        </div>
                                       ";
                                    }
                                    echo '<br><br><label class="form-label text-decoration-underline"></label>';
                                    for ($i = 0; $i < count($suitcase_arr); $i++) {
                                        $sr_no  = $suitcase_arr[$i]['sr_no'];
                                        $name = $suitcase_arr[$i]['name'];
                                        echo "
                                       <div class='col-md-3'>
                                        <label>
                                            <input type='radio' name='suitcase' value='$sr_no' class='form-check-input shadow-none'>
                                             $name
                                        </label>
                                        </div>
                                       ";
                                    }
                                    echo '<br><br><label class="form-label text-decoration-underline"></label>';
                                    echo "
                                       <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='airco' value='$airco_id' class='form-check-input shadow-none'>
                                             $airco_name
                                        </label>
                                        </div>
                                       ";

                                    ?>
                                </div>
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
            data.append('name', add_car_form.elements['name'].value);
            data.append('license_plate', add_car_form.elements['license_plate'].value);
            data.append('brand', add_car_form.elements['brand'].value);
            data.append('cost_per_day', add_car_form.elements['cost_per_day'].value);
            data.append('desc', add_car_form.elements['description'].value);
            data.append('fuel', add_car_form.elements['fuel'].value);
            data.append('gear', add_car_form.elements['gear'].value);
            data.append('seats', add_car_form.elements['seats'].value);
            data.append('doors', add_car_form.elements['doors'].value);
            data.append('suitcase', add_car_form.elements['suitcase'].value);
            data.append('airco', add_car_form.elements['suitcase'].value);

            let facilities = [];
            add_room_form.elements[''].forEach(el => {
                if (el.checked) {
                    facilities.push(el.value);
                }
            })
            data.append('facilities', JSON.stringify(facilities));

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/cars.php", true);

            xhr.onload = function() {
                console.log(this.responseText);
                var myModal = document.getElementById('add-car');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 1) {
                    alert('success', 'New car added!');
                    add_room_form.reset();
                } else {
                    alert('error', 'Server Down!');
                }

            }

            xhr.send(data);
        }
    </script>

</body>

</html>