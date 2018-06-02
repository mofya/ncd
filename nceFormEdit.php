<?php
$id = $_GET['id'];
include('databaseConnection.php');

$sql = mysqli_query($db, "SELECT * FROM `form_information` WHERE `refNumber` = '$id'");

$form_information = mysqli_fetch_array($sql);

if (!$sql) {
    die("Database query failed: " . mysqli_error($db));
}
else {
    $category_array = ["specimen_management", "reporting", "qc_eqa", "supplies", "complaints", "computer",
        "equipment", "safety", "others"];
    $category_other = ["specimenOther", "reportingOther", "qcOther", "suppliesOther", "complaintsOther",
        "computerOther", "equipOther", "safetyOther", "othersOther"];
}
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
                    <h3>Non-Conforming Event (NCE) Report Form</h3>
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
                <form class="form-horizontal" method="post" action="EditModel.php?id=<?php echo $form_information['refNumber'];?>">
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Reference No.</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"  name="refNo" value="<?php echo $form_information['refNumber'];?>" readonly>
                        </div>
                    </div>
                    <!-- Options come here -->
                    <div class="col-md-12">
                        <h2 style="text-align: center">Categories</h2>
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
                                <label class=" col-md-12"> <input type="checkbox" name="others[]" value="Power interruption">
                                    Power interruption</label>
                                <label class=" col-md-12"> <input type="checkbox" name="others[]" value="waste interruption">
                                    Waste interruption</label>
                                <label class=" col-md-12"> <input type="checkbox" name="others[]" value="Temperature out of range">
                                    Temperature out of range</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control col-md-12" placeholder="Other" name="othersOther">
                                </div>
                            </div>
                        </div>
                    </div><!-- ./div -->

                    <div class="form-group col-md-12">
                        <hr>
                        <h2 style="text-align: center">Information <small>(All fields with asterisk <span style="color: red">*</span> symbol are required)</small> </h2>

                        <hr>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Date of Incident:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dateOfIncident" value="<?php echo $form_information['dateOfIncident'];?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Time of Incident:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="incidentTime" value="<?php echo $form_information['incidentTime'];?>">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5" for="labs"><span style="color: red">*</span>Laboratory Unit:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="labUnit" value="<?php echo $form_information['labUnit'];?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Work Area:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="incidentSite" value="<?php echo $form_information['incidentSite'];?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Name<small>(of equipment/supply/patient)</small>:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="nameOfPatient" value="<?php echo $form_information['nameOfPatient'];?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Lot #/ID #:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="lotId" value="<?php echo $form_information['lotId'];?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5"><span style="color: red">*</span>Specimen: </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="specimen" value="<?php echo $form_information['specimen'];?>" id="infoSpecimen">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5"><span style="color: red">*</span>NCE identified by: </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="identifiedBy" id="identified_by_other" value="<?php echo $form_information['identifier'];?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Clinical area notified?</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="clinicalAreaIde" value="<?php echo $form_information['clinicalArea'];?>">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Person notified:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="personNotified" value="<?php echo $form_information['personNotified'];?>">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Date Notified:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="dateNotified" id="datepicker" value="<?php echo $form_information['notificationDate'];?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Incident reported to/ <small>Responsible person</small>:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="reportedTo" value="<?php echo $form_information['responsiblePerson'];?>" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Position:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="position" value="<?php echo $form_information['reportedToPosition'];?>" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Date reported:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="datepicker" name="dateReported" value="<?php echo $form_information['dateReported'];?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group col-md-6">
                            <label class="control-label col-md-5">Report initialed by:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="reportInitiator" value="<?php echo $form_information['reportInitiator'];?>">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label col-md-5">Designation:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="designation" value="<?php echo $form_information['designation'];?>" required>
                            </div>
                        </div>
                    </div>



                    <div class="form-group col-md-12">
                        <hr>
                        <label class="control-label col-md-3">Description of NCE:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" name="actionTaken" required>
                                <?php if($form_information['actionTaken'] == null)
                                    echo "N/A";
                                else echo $form_information['actionTaken'];?>
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3"><span style="color: red">*</span>Status:</label>
                        <div class="col-md-9">
                            <label class="radio-inline col-md-5"> <input type="radio" name="status" value="closed" required> NCE closed</label>
<!--                            <label class="radio-inline col-md-5"> <input type="radio" name="status" value="Extent" > NCE extented to-->
<!--                                <input name="extended_date" class="form-control" type="date" value="--><?php //echo date('Y-m-d')?><!--">-->
<!--                            </label>-->
                        </div>
                    </div>

                    <!-- button -->
                    <div class="col-md-12 col-md-offset-4">
                        <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        <button type="submit" name="edit" class="btn btn-success" onclick="return confirm('Do you want to save things changes?');">Save</button>
                    </div>

                </form>
            </div> <!-- ./panel body -->
        </div>

    </div>
</div>