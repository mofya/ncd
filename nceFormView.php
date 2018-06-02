<?php
$id=$_GET['id'];
include('databaseConnection.php');

$sql = mysqli_query($db, "SELECT * FROM `form_information` WHERE `refNumber` = '$id'");

$form_information = mysqli_fetch_array($sql);

if (!$sql)
{
    die("Database query failed: " . mysqli_error($db));
}
?>

<style>
    label {
        text-align: left;
    }
</style>

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
                <div class="col-md-2 pull-right">
                    <!-- print button -->
                    <button type="button" class="btn btn-primary" onclick="printNce()">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
                <form class="form-horizontal" role="form">
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Reference No.</label>
                        <div class="col-md-7">
                            <input class="form-control"  name="refNo" value="<?php echo $form_information['refNumber'];?>" readonly>
                        </div>
                    </div>
                    <!-- Options come here -->
                    <div class="form-group col-md-12">
                        <h2 style="text-align: center">Information</h2>
                        <hr>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Date of Incident:</label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $form_information['dateOfIncident'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Time of Incident:</label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $form_information['incidentTime'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5" for="#labs">Laboratory Unit:</label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $form_information['labUnit'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Work area:</label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $form_information['incidentSite'];?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Name<small>(of equip/supply/patient)</small>:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="nameOfPatient" value="<?php echo $form_information['nameOfPatient'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Lot #/ID #:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="lotId" value="<?php echo $form_information['lotId'];?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">Specimen: </label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $form_information['specimen'];?>" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label col-md-5">NCE identified by: </label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $form_information['identifier'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Clinical area notified?</label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['clinicalArea'];?>" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Person notified:</label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['personNotified'];?>" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Date Notified:</label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['notificationDate'];?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Incident reported to/ <small>Responsible person</small>:</label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['responsiblePerson'];?>" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Position:</label>
                            <div class="col-md-7">
                                <input class="form-control"  value="<?php echo $form_information['reportedToPosition'];?>" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label col-md-5">Date reported:</label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['dateReported'];?>" readonly>
                            </div>
                        </div>
                        <hr>
                    </div>



                    <div class="col-md-12">
                        <hr>
                        <div class="form-group col-md-6">
                            <label class="control-label col-md-5">Report initialed by:</label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['reportInitiator'];?>" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label col-md-5">Designation:</label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['designation'];?>" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <hr>
                        <h4><u>Description of NCE:</u></h4>
                        <p>
                            <?php if($form_information['actionTaken'] == null)
                                echo "N/A";
                            else echo $form_information['actionTaken'];?>
                        </p>
                    </div>

                    <div class="form-group col-md-12">
                        <hr>
                        <h4><u>Immediate action taken:</u></h4>
                        <p>
                            <?php if($form_information['immediateAction'] == null)
                                echo "N/A";
                            else echo $form_information['immediateAction'];?>
                        </p>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <div class="form-group col-md-6">
                            <label class="control-label col-md-5">Classification: </label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['classification'];?>" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label col-md-5">Lab phase: </label>
                            <div class="col-md-7">
                                <input class="form-control" value="<?php echo $form_information['labPhase'];?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-md-offset-4">
                        <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                    </div>

                </form>
            </div> <!-- ./panel body -->
        </div>

    </div>
</div>

<script type="text/javascript">
    // this prints the contents of the screen
    function printNce(){
        window.print();
    }
</script>