<?php

// database credentials local
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'rent-a-car';
}

// database credentials online
else if($_SERVER['SERVER_NAME'] == 'daanswart.nl'){
    
    $hname = 'daansw-web.db.transip.me';
    $uname = 'daansw_Admin';
    $pass = 'HAHA123';
    $db = 'daansw_web';

}

// Connection to database
$con = mysqli_connect($hname, $uname, $pass, $db);

// Connection error
if (!$con) {
    die('Cannot Connect to Database ' . mysqli_connect_error());
}
// Data filteration
function filteration($data)
{
    foreach ($data as $key => $value) {
        $value = trim($value);
        $value = stripcslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);
        $data[$key] = $value;
    }
    return $data;
}

function selectAll($table)
{
    $con = $GLOBALS['con'];

    if ($table == 'cars') {
        $res = mysqli_query($con, "SELECT * FROM $table ORDER BY `status` DESC, `brand`");
    } else {
        $res = mysqli_query($con, "SELECT * FROM $table ORDER BY `sr_no`");
    }
    return $res;
}

function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Select");
        }
    } else {
        die("Query cannot be prepared - Select");
    }
}

function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            echo mysqli_error($con);
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Update");
        }
    } else {
        echo mysqli_error($con);
        die("Query cannot be prepared - Update");
    }
}

function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            echo $stmt->error;
            mysqli_stmt_close($stmt);
            die("<br>Query kan niet worden uitgevoerd - Insert</p>");
        }
    } else {
        die("Query kan niet worden voorbereid - Insert");
    }
}

function deleteRow($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Delete");
        }
    } else {
        die("Query cannot be prepared - Delete");
    }
}
