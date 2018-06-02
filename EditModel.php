<?php

include('databaseConnection.php');

/**
 * Provides a conventional way of escaping strings from posted data
 *
 * @param $dbconn, provides a connection to the database
 * @param $value, is the vale that is to be escaped
 * @return string
 */
function escapeStr($dbconn, $value){
    return mysqli_real_escape_string($dbconn, $value);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}else {
    //redirect with Error
    header("Location: index.php?error=1");
}

if (isset($_POST['edit'])){
    // form data
    $incDate = escapeStr($db, $_POST['dateOfIncident']);
    $incTime = escapeStr($db, $_POST['incidentTime']);
    $lab = escapeStr($db, $_POST['labUnit']);
    $site = escapeStr($db, $_POST['incidentSite']);
    $patientName = escapeStr($db, $_POST['nameOfPatient']);
    $lotId = escapeStr($db, $_POST['lotId']);
    $specimen = escapeStr($db, $_POST['specimen']);
    $identifiedBy = escapeStr($db, $_POST['identifiedBy']); //identifier
    $clinicArea = escapeStr($db, $_POST['clinicalAreaIde']);
    $personNotified = escapeStr($db, $_POST['personNotified']);
    $dateNotified = escapeStr($db, $_POST['dateNotified']);
    $reportedTo = escapeStr($db, $_POST['reportedTo']);
    //$reporter = escapeStr($db, $_POST['reporter']);
    $reportedDate = escapeStr($db, $_POST['dateReported']);
    $reportInitiator = escapeStr($db, $_POST['reportInitiator']);
    $designation = escapeStr($db, $_POST['designation']);
    $position = escapeStr($db, $_POST['position']);
    $actionTaken = escapeStr($db, $_POST['actionTaken']);
    $status = escapeStr($db, $_POST['status']);

    //update query in the db
    $updateQuery = mysqli_query($db,"UPDATE form_information SET dateOfIncident ='$incDate', incidentTime ='$incTime',
          labUnit ='$lab', incidentSite='$site', nameOfPatient='$patientName', lotId='$lotId', specimen='$specimen',
          identifier='$identifiedBy', clinicalArea='$clinicArea', personNotified='$personNotified', notificationDate='$dateNotified',
          responsiblePerson='$reportedTo', dateReported='$reportedDate', reportInitiator='$reportInitiator',
          designation='$designation', reportedToPosition='$position', actionTaken='$actionTaken', status='$status' WHERE refNumber = '$id'");

    // check if query ran
    if (!$updateQuery) {
        die("Database query failed: " . mysqli_error($db));
    }else{
        // update the categories in respective tables
        $result = mysqli_query($db, "SHOW TABLE STATUS LIKE 'form_information'");
        $data = mysqli_fetch_assoc($result);
        $ref_number = $data['Auto_increment'] - 1;

        $category_array = ["specimen_management", "reporting", "qc_eqa", "supplies", "complaints", "computer",
            "equipment", "safety", "others"];
        $category_other = ["specimenOther", "reportingOther", "qcOther", "suppliesOther", "complaintsOther",
            "computerOther", "equipOther", "safetyOther", "othersOther"];

        for ($j = 0; $j < sizeof($category_array); $j++){
            if (!empty($_POST[$category_array[$j]])){
                $category = $_POST[$category_array[$j]];
                for ($i = 0; $i < sizeof($category); $i++){
                    $category_sql[$i] = mysqli_query($db, "UPDATE $category_array[$j] SET selected='$category[$i]'WHERE refNumber ='$id'");

                    if (!$category_sql[$i]) {
                        die("Database query failed: " . mysqli_error($db));
                    }
                }

                if(!empty($_POST[$category_other[$j]])) {
                    $other = $_POST[$category_other[$j]];
                    $sql = mysqli_query($db, "UPDATE $category_array[$j] SET selected='$other' WHERE refNumber ='$id'");

                    if (!$sql) {
                        die("Database query failed: " . mysqli_error($db));
                    }
                }
            }
        }
    }// ./if else

    // redirect to home
    header("Location: index.php?succ=3");

}
