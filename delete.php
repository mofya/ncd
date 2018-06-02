<?php

include('databaseConnection.php');

if (!isset($_GET['id'])){
    header("Location: index.php"); // redirect
}else {
    $id = $_GET['id'];

    $category_array = ["specimen_management", "reporting", "qc_eqa", "supplies", "complaints", "computer",
        "equipment", "safety", "others"];

    $delete = mysqli_query($db, "DELETE FROM `form_information` WHERE `refNumber` = '$id'");
    if (!$delete) {
        die("Datebase query failed: " . mysqli_error($db));
    }

    for ($j = 0; $j < sizeof($category_array); $j++) {
        $sql[$j] = mysqli_query($db, "DELETE FROM $category_array[$j] WHERE `refNumber` = '$id'");
        if (!$category_array[$j]) {
            die("Database query failed: " . mysqli_error($db));
        }
    }
    // redirect to home page
    header("Location: index.php?Succ=1");
}