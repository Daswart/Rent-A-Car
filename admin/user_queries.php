<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['seen'] == 'all') {
        $q = "UPDATE `user_queries` SET `seen`=?";
        $values = [1];
        if (update($q, $values, 'i')) {
            alert('success', 'Alle berichten gemarkeerd als gelezen!');
        } else {
            alert('error', 'Alle berichten gemarkeerd als gelezen mislukt!');
        }
    } else {
        $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no` = ?";
        $values = [1, $frm_data['seen']];
        if (update($q, $values, 'ii')) {
            alert('success', 'Gemarkeerd als gelezen');
        } else {
            alert('error', 'Gemarkeerd als gelezen mislukt');
        }
    }
}

if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM `user_queries`";
        if (mysqli_query($con, $q)) {
            alert('success', 'Alle berichten verwijderd!');
        } else {
            alert('error', 'Alle berichten verwijderd mislukt!');
        }
    } else {
        $q = "DELETE FROM `user_queries` WHERE `sr_no` = ?";
        $values = [$frm_data['del']];
        if (deleteRow($q, $values, 'i')) {
            alert('success', 'Bericht verwijderd!');
        } else {
            alert('error', 'Bericht verwijderen mislukt');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Berichten klanten</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Berichten Klanten</h3>


                <div class="card border-0 shadow-sm mb-4" style="height: 450px; overflow-y: scroll">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href="?seen=all" class=" btn btn-dark rounded-pill shadow-none btn-sm">
                                <i class="bi bi-check-all"></i> Markeer alles als gelezen
                            </a>
                            <a href="?del=all" class=" btn btn-danger rounded-pill shadow-none btn-sm">
                                <i class="bi bi-trash"></i> Verwijder alles
                            </a>
                        </div>
                        <div class="table-responsive-md">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Onderwerp</th>
                                        <th scope="col" width="30%">Bericht</th>
                                        <th scope="col">Datum</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;

                                    while ($row = mysqli_fetch_assoc($data)) {

                                        //convert datetime into date
                                        $date = strtotime($row['date']);
                                        $date = date('Y-m-d', $date);

                                        $seen = '';
                                        if ($row['seen'] != 1) {
                                            $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Markeer als gelezen</a><br>";
                                        }
                                        $seen .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Verwijder</a>";
                                        echo <<<query
                                        <tr>
                                        <td>$i</td>
                                        <td>$row[name]</td>
                                        <td>$row[email]</td>
                                        <td>$row[subject]</td>
                                        <td>$row[message]</td>
                                        <td>$date</td>
                                        <td>$seen</td>
                                        </tr>
                                        query;
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require('inc/scripts.php'); ?>

</body>

</html>