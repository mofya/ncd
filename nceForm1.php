<?php
include('databaseConnection.php');
$result = mysqli_query($db, "SHOW TABLE STATUS LIKE 'form_information'");
$data = mysqli_fetch_assoc($result);
$ref_num = $data['Auto_increment'];
?>

<div class="container">
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
        </table>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">NCE REPORT FORM</div>

            <div class="panel-body">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Reference No.</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"  name="refNo" value="<?php echo "NCE$ref_num";?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5"><span style="color: red">*</span>Action Taken:</label>
                        <div class="col-md-7">
                            <label class="radio-inline col-md-5"> <input type="radio" name="form_action" value="corrective" required> Corrective Action</label>
                            <label class="radio-inline col-md-5"> <input type="radio" name="form_action" value="preventive" > Preventive Action</label>
                        </div>
                    </div>
                    <!-- Options come here -->
                    <div class="form-group col-md-12">
                        <h2 style="text-align: center">Information</h2>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-4">Date of Incident:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dateOfIncident" value="<?php echo date('d-m-Y');?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-4">Time of Incident:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="timeOfIncident" value="<?php echo date('H:i:s');?>">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-4" for="#labs">Laboratory Unit:</label>
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

                    <div class="form-group col-md-12">
                        <hr>
                        <label class="control-label col-md-2"><span style="color: red">*</span>Specimen: </label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Blood" checked required>Blood</label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Urine">Urine</label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Stool">Stool</label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Sputum">Sputum</label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="CSF">CSF</label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Swab">Swab</label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="Bone Marrow">Bone Marrow</label>
                        <label class="radio-inline"> <input type="radio" name="Specimen" value="n_a">N/A</label>
                        <label class="radio-inline">
                            <input type="radio" name="Specimen" value="infoSpecimenOther">
                            <input type="text" class="form-control" name="infoSpecimen" placeholder="Other(Specify)" id="infoSpecimen">
                        </label>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="control-label col-md-2"><span style="color: red">*</span>NCE identified by: </label>
                        <label class="radio-inline"> <input type="radio" name="identified_by_radio" value="Clinical Staff">Lab staff</label>
                        <label class="radio-inline"> <input type="radio" name="identified_by_radio" value="Clinical Staff">Clinical staff</label>
                        <label class="radio-inline"> <input type="radio" name="identified_by_radio" value="Clinical Staff">Patient</label>
                        <label class="radio-inline"> <input type="radio" name="identified_by_radio" id="identOthers" value="identOthers">
                            <input placeholder="Other(Specify)" type="text" name="identified_by_other"
                               id="identified_by_other">
                        </label>
                        <hr>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Clinical area notified?</label>
                        <div class="col-md-7">
                            <select name="clinicalAreaIde" class="form-control" title="clinic notified" required>
                                <option>--Select--</option>
                                <option value="yes">Yes</option>
                                <option value="not_required">Not Required</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Person notified:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="personNotified">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Date Notified:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dateNotified" id="datepicker" value="<?php echo date('d-m-Y')?>" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Incident reported to/ <small>Responsible person</small>:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="reporter" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Name of reporter:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="reporter" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Date reported:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="datepicker" name="dateReported" required>
                        </div>
                    </div>

                    <?php // picks username from the database
                    include('databaseConnection.php');
                    $userid = $_SESSION['user'];
                    $result_2 = mysqli_query($db, "SELECT `username` FROM `" . MLS_PREFIX . "users` WHERE `userid` = $userid");
                    $data_2 = mysqli_fetch_assoc($result_2);
                    $username = $data_2['username'];
                    ?>

                    <div class="form-group col-md-4">
                        <label class="control-label col-md-5">Report initialed by:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="reportInitiator" value="<?php echo $username;?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label col-md-5">Designation:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="designation" required>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label col-md-5">Position:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="position" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <hr>
                        <label class="control-label col-md-4">Description of NCE:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" name="action_taken" required>Describe the incident and include the immediate action taken.
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <hr>
                        <label class="control-label col-md-4">Close out by Quality Officer:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" name="close_out" required></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="control-label col-md-5"><span style="color: red">*</span>Classification/
                            <small>Determination of extent (impact) of NCE</small>:
                        </label>
                        <div class="col-md-7">
                            <label class="radio-inline col-md-3"> <input type="radio" name="classification" value="low" required> Low</label>
                            <label class="radio-inline col-md-3"> <input type="radio" name="classification" value="medium" > Medium</label>
                            <label class="radio-inline col-md-3"> <input type="radio" name="classification" value="high" > High</label>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <hr>
                        <label class="control-label col-md-4">Root causes:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" name="root_cause" required></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <hr>
                        <label class="control-label col-md-4">Corrective/ Preventive action:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" name="corrective_action" required></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Planned completion date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="datepicker" name="completion_date" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-3"><span style="color: red">*</span>Status</label>
                        <div class="col-md-9">
                            <label class="radio-inline col-md-5"> <input type="radio" name="status" value="closed" required> NCE closed</label>
                            <label class="radio-inline col-md-5"> <input type="radio" name="status" value="Extent" > NCE extented to
                                <input name="extended_date" class="form-control" type="date" value="<?php echo date('d-m-Y');?>">
                            </label>
                        </div>
                    </div>

                    <!-- button -->
                    <div class="col-md-12 col-md-offset-5">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div> <!-- ./panel body -->
        </div>

    </div>
</div>