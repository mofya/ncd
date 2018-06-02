<?php
    include('databaseConnection.php');
    // picks the username from the db
    $userid = $_SESSION['user'];
    $result_2 = mysqli_query($db, "SELECT `username` FROM `" . MLS_PREFIX . "users` WHERE `userid` = $userid");
    $data_2 = mysqli_fetch_assoc($result_2);
    $username = $data_2['username'];

    // create a new object of the options class
    $opt = new Options();
    if (isset($_GET['succ'])){
        $message = "Your form was submitted successfully. Thank you.";
        $opt->success($message); // calls the success method from the opt class
    }

?>


<div class="container">
    <div class="row">
        <!-- wizard progress bar -->
        <section>
            <div class="col-md-11">
                <table class="table-responsive" border="1">
                    <tr>
                        <th width="192" rowspan="3"><img src="img/1Zambia.jpg" width="150" height="150"/></th>
                        <th class="tg-yw4l" colspan="9" bgcolor="grey"><h3>THE UNIVERSITY TEACHING HOSPITAL LABORATORY</h3>
                            <p>&nbsp;</p></th>
                        <th width="195" rowspan="3"><img src="img/1Zambia.jpg" width="150" height="150"/></th>
                    </tr>
                    <tr>
                        <th class="tg-yw4l" colspan="9">
                            <h3>Non-Conforming Event (NCE) Report Form<h3>
                        </th>
                    </tr>
                    <tr>
                        <th class="tg-yw4l" colspan="8"><h3>Document ID:</h3></th>
                        <th width="390" class="tg-yw4l"><h3>NCE-FM-001-v3</h3></th>
                    </tr>
                </table
            </div>
            <p style="padding-top: 10px">This form should be completed when any unexpected, unusual, or unplanned occurrence or finding that does
                not conform to specified requirements of the UTH Laboratory quality management system happen or is discovered.<br></p>
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-info-sign"></i>
                            </span>
                            </a>
                        </li>

                        <!-- TODO: remember to add back the disabled class here-->
                        <li role="presentation">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">NCE REPORT FORM</div>
                    <div class="panel-body">
                        <form role="form" class="form-horizontal" method="post" action="NCEModel.php" enctype="multipart/form-data">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <!-- Step 1 of the form -->
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-4" for="#labs"><span style="color: red">*</span>Select Unit:</label>
                                        <div class="col-md-7">
                                            <select class="form-control" name="labUnit" id="dept" title="Departments" onchange="generateRefNo()" required>
                                                <option>--Select--</option>
                                                <option value="Adult Center of Excellence">Adult Center of Excellence</option>
                                                <option value="Bacteriology">Bacteriology</option>
                                                <option value="Central Specimen Reception">Central Specimen Reception</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Cytology">Cytology</option>
                                                <option value="Early Infant Diagnosis">Early Infant Diagnosis</option>
                                                <option value="Haematology">Haematology</option>
                                                <option value="Histology">Histology</option>
                                                <option value="Mortuary">Mortuary</option>
                                                <option value="Paediatric Center of Excellence">Paediatric Center of Excellence</option>
                                                <option value="Pediatrics">Pediatrics</option>
                                                <option value="Parasitology">Parasitology</option>
                                                <option value="Premier">Premier</option>
                                                <option value="Sexually transmitted infections (STI)">Sexually transmitted infections
                                                    (STI)
                                                </option>
                                                <option value="Tuberculosis (TB)">Tuberculosis (TB)</option>
                                                <option value="virology">Virology</option>
                                                <option value="General">General</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-5">Reference No.</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="refNomb" name="refNo" readonly>
                                        </div>
                                    </div>
                                    <!--<div class="form-group col-md-6">
                                        <label class="control-label col-md-5"><span style="color: red">*</span>Action Taken:</label>
                                        <div class="col-md-7">
                                            <label class="radio-inline"> <input type="radio" name="form_action" value="corrective" checked required> Corrective Action</label>
                                        </div>
                                    </div>-->
                                    <div class="col-md-12">
                                        <hr>
                                        <h2 style="text-align: center">Categories</h2><hr>
                                    </div>
                                    <!-- row 1 for categories -->
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4" style="text-align: justify">
                                            <label>Specimen Management:</label>
                                            <div class="checkbox">
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Request form incompletely filled">
                                                    Request form incompletely filled</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Request form/sample not received">
                                                    Request form/sample not received</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Mismatched Request form/sample">
                                                    Mismatched Request form/sample</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Mismatched Request form/sample">
                                                    Mismatched Request form/sample</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Specimen lost">
                                                    Specimen lost</label><br>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Specimen labeling">
                                                    Specimen labeling</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Damaged specimen">
                                                    Damaged specimen</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Specimen transport delayed">
                                                    Specimen transport delayed</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Specimen packaged wrongly">
                                                    Specimen packaged wrongly</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Incorrect processing">
                                                    Incorrect processing</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="specimen_management[]" value="Specimen delivered to wrong unit">
                                                    Specimen delivered to wrong unit</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="specimenOther">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4" style="text-align: justify">
                                            <label>Reporting:</label>
                                            <div class="checkbox">
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Incorrect report issued">
                                                    Incorrect report issued</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Incorrect results transcribed">
                                                    Incorrect result transcribed</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Computer entry error">
                                                    Computer entry error</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Delay in reporting results">
                                                    Delay in reporting results</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Delay in authorizing results">
                                                    Delay in authorizing results</label><br>
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Critical report not released promptly">
                                                    Delay in authorizing results</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Wrong report caught just before release">
                                                    Critical report not released promptly</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="report[]" value="Specimen transport delayed">
                                                    Wrong report caught just before release</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="reportingOther">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4" style="text-align: justify">
                                            <label>QC/ EQA:</label>
                                            <div class="checkbox">
                                                <label class=" col-md-12"> <input type="checkbox" name="QC_EQA[]" value="EQA result not sent/sent late">
                                                    EQA result not sent/sent late</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="QC_EQA[]" value="EQA materials not delivered">
                                                    EQA materials not delivered</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="QC_EQA[]" value="EQA materials delivered later">
                                                    EQA materials delivered late</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="QC_EQA[]" value="QC materials delivered late">
                                                    QC materials delivered late</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="QC_EQA[]" value="Test results verified without QC">
                                                    Test results verified without QC</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="qcOther">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ./div -->
                                    <!-- row 2 for categories -->
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group col-md-4">
                                            <label>Supplies:</label>
                                            <div class="checkbox">
                                                <label class=" col-md-12"> <input type="checkbox" name="supplies[]" value="External problem">
                                                    External problem</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="supplies[]" value="Improperly prepared reagent">
                                                    Improperly prepared reagent</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="supplies[]" value="Reagent expiry">
                                                    Reagent expiry</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="supplies[]" value="Recalled lot">
                                                    Recalled lot</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="supplies[]" value="Change in lot number overlooked">
                                                    Change in lot number overlooked</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="suppliesOther">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Complaints:</label>
                                            <div class="checkbox">
                                                <label class=" col-md-12"> <input type="checkbox" name="complaints[]" value="Complaint by clinician">
                                                    Complaint by clinician</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="complaints[]" value="Complaint by patient">
                                                    Complaint by patient</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="complaints[]" value="Complaint by staff member">
                                                    Complaint by staff member</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="complaints[]" value="Complaint by patient's relative">
                                                    Complaint by patient's relative</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="complaintsOther">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Computer/ Equipment:</label>
                                            <div class="checkbox">
                                                <label class=" col-md-12"> <input type="checkbox" name="equipment[]" value="LIS related">
                                                    LIS-related (Please fill LIS issuess form LIS-FM-001)</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="equipment[]" value="Computer hardware problem">
                                                    Computer hardware problem</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="equipment[]" value="Computer software problem">
                                                    Computer software problem</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="equipment[]" value="Wrong calibration values">
                                                    Wrong calibration values</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="equipment[]" value="Wrong calibrator used">
                                                    Wrong calibrator used</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="equipOther">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ./div -->
                                    <!-- row 2 for categories -->
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group col-md-6">
                                            <label>Safety:</label>
                                            <div class="checkbox">
                                                <label class=" col-md-12"> <input type="checkbox" name="safety[]" value="Biological/Chemical spill">
                                                    Biological/Chemical spill</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="safety[]" value="Fire">
                                                    Fire</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="safety[]" value="Waste management">
                                                    Waste management</label>
                                                <label class=" col-md-12"> <input type="checkbox" name="safety[]" value="Incident/accident">
                                                    Incident/accident</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="safetyOther">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Others:</label>
                                            <div class="checkbox">
                                                    <div class="col-md-8">
                                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="othersOther">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ./div -->

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <!-- 2nd part of form -->
                                    <div class="form-group col-md-12">
                                        <h2 style="text-align: center">Information</h2>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-4">Date of Incident:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="dateOfIncident" id="datepicker" value="<?php echo date('Y-m-d')?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-4">Time of Incident:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="incidentTime" value="<?php date_default_timezone_set("Africa/Lusaka"); echo date('h:i');?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-4" for="#labs">Laboratory Unit:
                                            <i class="fa fa-info-circle" title="This selection is based on the selected department in part1 of the wizard."></i>
                                        </label>
                                        <div class="col-md-7">
                                            <select class="form-control" name="labUnit" id="labs" title="labs" required>
                                                <option>--Select--</option>
                                                <option value="Bacteriology">Bacteriology</option>
                                                <option value="Central Specimen Reception">Central Specimen Reception</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Cytology">Cytology</option>
                                                <option value="Haemotology">Haematology</option>
                                                <option value="Histology">Histology</option>
                                                <option value="Mortuary">Mortuary</option>
                                                <option value="Pediatrics">Pediatrics</option>
                                                <option value="Parasitology">Parasitology</option>
                                                <option value="Premier">Premier</option>
                                                <option value="Sexually transmitted infections (STI)">Sexually transmitted infections
                                                    (STI)
                                                </option>
                                                <option value="Tuberculosis (TB)">Tuberculosis (TB)</option>
                                                <option value="virology">Virology</option>
                                                <option value="General">General</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-4">Work Area:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="incidentSite" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-4">Name (of equipment/supplier/patient):</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="nameOfPatient">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label col-md-4">Lot #/ ID #:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="lotId">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <hr>
                                        <label class="control-label col-md-2"><span style="color: red">*</span>Specimen: </label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Blood">Blood</label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Urine">Urine</label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Stool">Stool</label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Sputum">Sputum</label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="CSF">CSF</label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Swab">Swab</label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Bone Marrow">Bone Marrow</label>
                                        <label class="radio-inline"> <input type="radio" name="Specimen" value="n_a">N/A</label>
                                        <label class="radio-inline col-md-2 pull-right">
                                            <input type="radio" name="Specimen" value="infoSpecimenOther">
                                            <input type="text" class="form-control" name="infoSpecimen" placeholder="Other(Specify)" id="infoSpecimen">
                                        </label>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-2"><span style="color: red">*</span>NCE identified by: </label>
                                        <label class="radio-inline col-md-2"> <input type="radio" name="identified_by_radio" value="Clinical Staff">Lab staff</label>
                                        <label class="radio-inline col-md-2"> <input type="radio" name="identified_by_radio" value="Clinical Staff">Clinical staff</label>
                                        <label class="radio-inline col-md-2"> <input type="radio" name="identified_by_radio" value="Clinical Staff">Patient</label>
                                        <label class="radio-inline col-md-1"> <input type="radio" name="identified_by_radio" id="identOthers" value="identOthers">
                                            <input placeholder="Other(Specify)" type="text" name="identified_by_other" id="identified_by_other">
                                        </label>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-5">Clinical area notified?</label>
                                            <div class="col-md-7">
                                                <select id="clinicalAreaId" name="clinicalAreaIde" class="form-control" title="clinic notified" onchange="yesShow()" required>
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="not_required">Not Required</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-5">Person notified:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="personNotified" id="personNotify">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-6">Date Notified:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="dateNotified" id="date1" value="<?php echo date('Y-m-d')?>" required>
                                            </div>
                                        </div>
                                    </div><!-- ./end div -->

                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-5">Incident reported to/ <small>Responsible person</small>:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="reportedTo" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-5">Position:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="position" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-6">Date reported:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="date2" name="dateReported" value="<?php echo date('Y-m-d')?>" required>
                                            </div>
                                        </div>
                                    </div><!-- ./div -->

                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group col-md-6" data-tip="Using the username you registered with.">
                                            <label class="control-label col-md-5">Report initiated by:</label>
                                            <i class="fa fa-info-circle" title="This field using the username you registered with."></i>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="reportInitiator" value="<?php echo $username;?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label col-md-5">Designation:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="designation" required>
                                            </div>
                                        </div>

                                    </div><!-- ./div -->

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <!-- Step 3 of nce form -->
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-4"><span style="color: red">*</span>Description of NCE:</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="5" name="action_taken" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <hr>
                                        <label class="control-label col-md-4"><span style="color: red">*</span>Immediate action taken:</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="5" name="immediate_action" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <hr>
                                        <label class="control-label col-md-4"><span style="color: red">*</span>Classification/
                                            <small>Determination of extent (impact) of NCE</small>:
                                        </label>
                                        <div class="col-md-8">
                                            <label class="radio">
                                                <input type="radio" name="classification" value="low" required> Low (no known adverse outcome)
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="classification" value="medium"> Medium (Minor self-limiting adverse outcome)
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="classification" value="high"> High (Adverse outcome with or without successful intervention)
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <hr>
                                        <label class="control-label col-md-4"><span style="color: red">*</span>Lab phase:</label>
                                        <div class="col-md-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="labPhase" value="Pre-examination" required> Pre-examination
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="labPhase" value="Examination"> Examination
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="labPhase" value="Post Examination"> Post Examination
                                            </label>
                                        </div>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="complete">
                                  <div class="form-group col-md-12">
                                      <h2 style="text-align: center">Root Cause Analysis</h2>
                                  </div>
                                    <!-- root cause form here -->
                                    <p><em>Record root cause analysis for non-conformances/occurrences here.</em></p><br>

                                    <div> <!-- root cause form -->
                                        <div class="form-group col-md-6">
                                            <label class="col-md-5" for="investi">Date of Investigation:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="date3" name="dateOfInvesti" id="investi">
                                            </div>
                                        </div>
                                        <!--<div class="form-group col-md-6">
                                            <label class="col-md-5" for="teamlead">Team Leader:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="teamLeader" id="teamlead">
                                            </div>
                                        </div>-->
                                        <div class="col-md-12">
                                            <h3>Investigation team</h3><hr>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name1" placeholder="Name 1">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name2" placeholder="Name 2">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name3" placeholder="Name 3">
                                                </div>
                                            </div>
                                            <!-- spacer -->
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name4" placeholder="Name 4">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name5" placeholder="Name 5">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name6" placeholder="Name 6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <h3>Method of Investigation</h3><hr>
                                            <div class="checkbox">
                                                <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="Brainstorming">
                                                    Brainstorming</label>
                                                <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="5 Whys">
                                                    5 Whys</label>
                                                <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="Staff interviews">
                                                    Staff Interviews</label>
                                                <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="Fishbone diagram">
                                                    Fishbone Diagram</label>
                                            </div><br>
                                            <div>
                                                <label class="col-md-4">Attach evidence where necessary:
                                                    <i class="fa fa-info-circle" title="If you have multiple files to upload, please place them in a zip folder and upload that zipped file"></i>
                                                </label>
                                                <input type="file" name="evidence">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12"><hr>
                                            <label for="finding" class="col-md-4">Findings of the investigation:</label>
                                            <textarea class="form-control" rows="5" name="findings" id="finding"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="root" class="col-md-4">Root cause(s):</label>
                                            <textarea class="form-control" rows="5" name="rootCause" id="root"></textarea>
                                            <hr>
                                        </div>

                                    </div> <!-- ./ root cause -->

                                    <!-- <div class="form-group col-md-6">
                                        <label class="control-label col-md-5">Planned completion date:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="date4" name="completion_date" value="<?php echo date('Y-m-d')?>" required>
                                        </div>
                                    </div> -->

                                    <?php
                                    if($user->isAdmin()) { // only admin can edit this section
                                        ?>

                                        <div class="form-group col-md-6">
                                            <label class="control-label col-md-3"><span style="color: red">*</span>Status</label>
                                            <div class="col-md-9">
                                                <label class="radio-inline col-md-5"> <input type="radio" name="status" value="closed" required> NCE closed</label>
                                                <label class="radio-inline col-md-5"> <input type="radio" name="status" value="Extent" > NCE extented to
                                                    <input name="extended_date" class="form-control" type="date" value="<?php echo date('Y-m-d')?>">
                                                </label>
                                            </div>
                                        </div>

                                        <?php
                                    } // end if
                                    ?>


                                    <!-- Submit button -->
                                    <ul class="list-inline pull-right">
                                        <hr>
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        <li><button type="submit" class="btn btn-success" name="submit">Submit</button></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>

                </div><!-- ./panel -->

            </div><!-- ./wizard -->
        </section>
    </div>
</div>

<script type="text/javascript">
    /**
     * Sends an XMLHttp request to automatically create a referenceNo based
     * on the selected department
     */
    function generateRefNo() {

        let department = document.getElementById('dept').value;  // gets the department name from the select list

        if (department !== '') {

            // this updates the lab unit select input field
            document.getElementById('labs').value = department;

            // sends an XMLHttp request to generateRef.php
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'generateRef.php' + '?q=' + department, true);

            xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');

            // this defines the function to execute every time the request status changes
            xhr.onreadystatechange = function () {
                // checking if the response is ready
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let result = xhr.responseText;
                    console.log('Result: ' + result);  // see what comes back

                    let json = JSON.parse(result);
                    // sets new value of refNo here
                    document.getElementById('refNomb').value = json.id;
                }
            };
            function countCheckboxes(){
              var inputElems = document.getElementsByTagName("input");
              var count = 0;
              for (var i=0; i<inputElems.length; i++) {
                if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {
                  count++;
                }
              }
              if(count == 0){
                alert("Please select atleast one category");
                event.preventDefault();
              }
            }

            function yesShow(){
              //var option = document.getElementById('clinicalAreaIde').options[document.getElementById('clinicalAreaIde')].value;
              if(document.getElementById('clinicalAreaId').value != "yes"){
                //alert("document.getElementById("clinicalAreaId").value");
                document.getElementById('personNotify').style.display ="none";
                document.getElementById('date1').style.display="none";
              }
            }
            // sends the request
            xhr.send();
        }
    }

</script>
