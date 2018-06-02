<?php

include 'databaseConnection.php';
// This is where a RefNo is generated, based on the select department

function is_ajax_request(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

// if the function evaluates to ok
if (is_ajax_request()) {
    // get the department form XMLRequest
    $dept = $_GET['q'];

    // querying from the db to get a department code
    $query = "SELECT departmentCode FROM `departmet` WHERE department_name like '$dept'";

    // run query
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    // gets the retrieved values
    $row = mysqli_fetch_assoc($result);

    if ($row['departmentCode'] !== '') {
        $deptCode = $row['departmentCode']; // place departmentCode into variable

        // todo: get the latest entered record refNo and increment it to create new refNo
        $result = mysqli_query($db, "SELECT * FROM `form_information` ORDER BY created_at DESC limit 1");
        $data = mysqli_fetch_assoc($result);
        $ref_num = $data['refNumber'];  // gets the ref_number from the result

        // variable declaration
        $numPart = '';
        // split the refNum to get numerical put
        // e.g. BAC-11 to get code = BAC and nem = 11
        if (!empty($ref_num)){
            $numPart = explode("-", $ref_num);

            $numPart = $numPart[1] + 1; // increments the numerical part of the split string by 1
        } else {
            $numPart = 1;
        }

        // generatedID
        $generatedRefNo = $deptCode."-".$numPart;

        //$return["json"] = json_encode($deptCode);
        echo json_encode(array('id' => $generatedRefNo));  // returns the json to the request
    }

}