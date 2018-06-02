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

//todo: add on ref number

/*Information*/
$refNum = escapeStr($db, $_POST['refNo']);
$form_action = escapeStr($db,$_POST['form_action']);
$inc_time = escapeStr($db, $_POST['incidentTime']);
$inc_date = escapeStr($db, $_POST['dateOfIncident']);
$lab_unit = escapeStr($db, $_POST['labUnit']);
$inc_site = escapeStr($db, $_POST['incidentSite']);
$lot_id = escapeStr($db, $_POST['lotId']);
$name_patient = escapeStr($db, $_POST['nameOfPatient']);
$area_notified = escapeStr($db, $_POST['clinicalAreaIde']);
$notified_person = escapeStr($db, $_POST['personNotified']);
$date_notified = escapeStr($db, $_POST['dateNotified']);
$reported_to = escapeStr($db, $_POST['reportedTo']);
//$reporter_name = escapeStr($db,$_POST['reporter']);
$reported_date = escapeStr($db, $_POST['dateReported']);
$report_initiator = escapeStr($db, $_POST['reportInitiator']);
$designation = escapeStr($db, $_POST['designation']);
$position = escapeStr($db, $_POST['position']);
$specimen = escapeStr($db, $_REQUEST['Specimen']);
$specimen_other = escapeStr($db, $_REQUEST['infoSpecimen']);
$identifier = escapeStr($db, $_REQUEST['identified_by_radio']);
$identifier_other = escapeStr($db, $_REQUEST['identified_by_other']);
$action_taken = escapeStr($db, $_REQUEST['action_taken']);
$immediate_action = escapeStr($db, $_POST['immediate_action']);
$classification = escapeStr($db, $_POST['classification']);
$labPhase = escapeStr($db, $_POST['labPhase']);  // added after feedback
//$corrective_action = escapeStr($db, $_POST['corrective_action']);
$completion_date = escapeStr($db, $_POST['completion_date']);
//$status = escapeStr($db, $_POST['status']);
//$extended_date = escapeStr($db, $_POST['extended_date']);

// form data for root cause table
$dateOfInvestigation = escapeStr($db, $_POST['dateOfInvesti']);
$teamLeader = escapeStr($db, $_POST['teamLeader']);
$name1 = escapeStr($db, $_POST['name1']);
$name2 = escapeStr($db, $_POST['name2']);
$name3 = escapeStr($db, $_POST['name3']);
$name4 = escapeStr($db, $_POST['name4']);
$name5 = escapeStr($db, $_POST['name5']);
$name6 = escapeStr($db, $_POST['name6']);
$invetiMethod = $_POST['method'];// find fix for this guy
$evidence = '';
$rootCause = escapeStr($db, $_POST['rootCause']);
$finding = escapeStr($db, $_POST['findings']);

$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    // inserts into the db
    $sql = mysqli_query($db, "INSERT INTO form_information (refNumber, formAction, dateOfIncident , incidentTime, labUnit, 
          incidentSite, nameOfPatient, lotId, specimen, identifier, clinicalArea, personNotified, notificationDate, 
          responsiblePerson, dateReported, reportInitiator, designation, reportedToPosition, 
          specimenOther, identifierOther, actionTaken, immediateAction, classification, labPhase,
          completionDate)                      
		VALUES ('$refNum', '$form_action', '$inc_date','$inc_time','$lab_unit','$inc_site','$name_patient','$lot_id','$specimen',
		'$identifier','$area_notified','$notified_person','$date_notified','$reported_to', '$reported_date','$report_initiator',
		'$designation','$position','$specimen_other','$identifier_other','$action_taken', '$immediate_action', '$classification',
		'$labPhase', '$completion_date')");
    if (!$sql) {
        die("Database query failed: " . mysqli_error($db));
    }

    else{
        // dealing with evidence upload
        if (isset($_FILES['evidence']['name'])) {
            $tmpPath = $_FILES['evidence']['tmp_name'];  // get tmp name

            if (!empty($tmpPath)) {
                $filename = $_FILES['evidence']['name'];
                $filepath = "uploads/". date('Y-H-i-s'). "-" . $filename;

                if (move_uploaded_file($tmpPath, $filepath)) {
                    $evidence = $filepath;  // if file uploads, set evidence to file path
                } else {
                    echo "<div class='alert-warning'><i class=\"fa fa-times\" aria-hidden=\"true\"></i> File was not uploaded...</div>";
                }
            }
        }  // end if

        // serialize the $investiMethod array, so we are able to store it to db
        $invetiMethod = serialize($invetiMethod);

        // storing root cause data to appropriate table
        $query = "INSERT INTO root_analysis (refNumber, dateOfInvestigation, teamLeader, firstMember, secondMember, thirdMember, 
              fourthMember, fifthMember, sixthMember, investigationMethod, evidence, rootCause, findings)
              VALUES ('$refNum', '$dateOfInvestigation', '$teamLeader', '$name1', '$name2', '$name3', '$name4', '$name5', '$name6',
              '$invetiMethod', '$evidence', '$rootCause', '$finding')";
        $run = mysqli_query($db, $query);
        if (!$run) {
            // throws error
            die("Database query failed: " . mysqli_error($db));
        }

        $category_array = ["specimen_management", "reporting", "qc_eqa", "supplies", "complaints", "equipment", "safety", "others"];
        $category_other = ["specimenOther", "reportingOther", "qcOther", "suppliesOther", "complaintsOther",
            "equipOther", "safetyOther", "othersOther"];

        for ($j = 0; $j < sizeof($category_array); $j++){
            if (!empty($_POST[$category_array[$j]])){
                $category = $_POST[$category_array[$j]];
                for ($i = 0; $i < sizeof($category); $i++){
                    $category_sql[$i] = mysqli_query($db, "INSERT INTO $category_array[$j] (refNumber, selected)
                  VALUES ('$refNum', '$category[$i]')");

                    if (!$category_sql[$i]) {
                        die("Database query failed: " . mysqli_error($db));
                    }
                }

                if(!empty($_POST[$category_other[$j]])) {
                    $other = $_POST[$category_other[$j]];
                    $sql = mysqli_query($db, "INSERT INTO $category_array[$j] (refNumber, selected)
                      VALUES ('$refNum', '$other')");

                    if (!$sql) {
                        die("Database query failed: " . mysqli_error($db));
                    }
                }
            }
        }
    }
}

?>

<?php
//Step5
mysqli_close($db);

// redirect to home page
header("Location: index.php?succ=2");

?>
