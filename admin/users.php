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
    <title>Admin Panel - Users </title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <!-- Room Section -->
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">USERS</h3>

                <!-- Room section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <!-- <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i> Add -->
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width: 1300px;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefoonnummer</th>
                                        <th scope="col">Adres</th>
                                        <th scope="col">Postcode</th>
                                        <th scope="col">Woonplaats</th>
                                        <th scope="col">Geboortedatum</th>
                                        <th scope="col">Geverifieerd</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Datum</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php require('inc/scripts.php'); ?>
    <script src="scripts/users.js"></script>
</body>

</html>