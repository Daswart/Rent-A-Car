<?php
require('inc/functies.php');
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Instellingen</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">INSTELLINGEN</h3>

                <!-- General settings section -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Algemene Instelingen</h5>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> Bewerk
                            </button>
                        </div>

                        <h6 class="card-subtitle mb-1 fw-bold">Site Titel</h6>
                        <p class="card-text" id="site_titel"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Over ons</h6>
                        <p class="card-text" id="site_overOns"></p>
                    </div>
                </div>

                <!-- General settings Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form></form>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Algemene Instellingen</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Site Titel</label>
                                    <input type="text" name="site_title" class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Over ons</label>
                                    <textarea name="site-about" class="form-control shadow-none" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Annuleer</button>
                                <button type="button" class="btn custom-bg text-white shadow-none">VERZENDEN</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script>
        let general_data;

        function get_general() {
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/instellingen_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                general_data = JSON.parse(this.responseText);
                console.log(general_data);
                site_titel.innerText = general_data.site_titel;
                site_overOns.innerText = general_data.site_overOns;
            }

            xhr.send('get_general');
        }

        window.onload = function() {
            get_general();
        }
    </script>
</body>

</html>