<?php

include "databaseConnection.php";
// variable declaration
$analysisInfo = '';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $ref_id = $_GET['id'];

    $sql = mysqli_query($db, "SELECT * FROM `root_analysis` WHERE `refNumber` = '$ref_id'");

    $analysisInfo = mysqli_fetch_array($sql);

    if (!$sql)
    {
        die("Database query failed: " . mysqli_error($db));
    }

    // unserialize investigation method field data
    $methodsUsed = unserialize($analysisInfo['investigationMethod']);

    $methodsUsed = implode(", ", $methodsUsed);

} else {
    echo "<div class='alert alert-danger'>Error occurred!</div>";
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table-responsive" border="1">
                <tr>
                    <th width="192" rowspan="3"><img src="img/1Zambia.jpg" width="150" height="150"/></th>
                    <th class="tg-yw4l" colspan="9" bgcolor="grey"><h3>THE UNIVERSITY TEACHING HOSPITAL LABORATORY</h3>
                        <p>&nbsp;</p></th>
                    <th width="195" rowspan="3"><img src="img/1Zambia.jpg" width="150" height="150"/></th>
                </tr>
                <tr>
                    <th class="tg-yw4l" colspan="9">
                        <h3>Root Cause Analysis Report Form<h3>
                    </th>
                </tr>
                <tr>
                    <th class="tg-yw4l" colspan="8"><h3>Document ID:</h3></th>
                    <th width="390" class="tg-yw4l"><h3>NCE-FM-003-v2</h3></th>
                </tr>
            </table
        </div><br>
        <p><em>This form is used for recording root cause analysis reports for non-conformances/occurrences.</em></p>
        <div class="panel panel-default">
            <div class="panel-heading">VIEW ROOT CAUSE ANALYSIS FORM</div>
            <div class="panel-body">
                <form role="form" method="post" action="">

                    <div class="form-group col-md-6" >
                        <label class="col-md-5" for="refNo">Reference No.</label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $analysisInfo['refNumber'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-5" for="investi">Date of Investigation:</label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $analysisInfo['dateOfInvestigation'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-5" for="teamlead">Team Leader:</label>
                        <div class="col-md-7">
                            <input class="form-control" value="<?php echo $analysisInfo['teamLeader'];?>" readonly>
                        </div>
                    </div>
                    <!-- space filler, for better aesthetics -->
                    <div class="form-group col-md-6"></div>

                    <div class="col-md-12">
                        <h3>Investigation team</h3><hr>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input class="form-control" value="<?php echo $analysisInfo['firstMember'];?>" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo $analysisInfo['secondMember'];?>" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo $analysisInfo['thirdMember'];?>" readonly>
                            </div>
                        </div>
                        <!-- spacer -->
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input class="form-control" value="<?php echo $analysisInfo['fourthMember'];?>" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo $analysisInfo['fifthMember'];?>" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo $analysisInfo['sixthMember'];?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <hr>
                        <p>
                            <h4>Method of Investigation</h4>
                            <?php echo $methodsUsed;?>
                        </p>
                        <div>
                            <label class="col-md-4">Attach evidence where necessary:</label>
                            <a href="<?php echo $set->url.$analysisInfo['evidence'];?>">Click here to view</a>
                        </div>
                    </div>
                    <div class="form-group col-md-12"><hr>
                        <p>
                            <h4><u>Findings of investigation:</u></h4><br>
                            <?php echo $analysisInfo['findings'];?>
                        </p>
                    </div>
                    <div class="form-group col-md-12">
                        <hr>
                        <p>
                            <h4><u>Root Cause:</u></h4><br>
                            <?php echo $analysisInfo['rootCause'];?>
                        </p>
                        <hr>
                    </div>

                    <div class="col-md-12 col-md-offset-4">
                        <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                    </div>
                </form>
            </div><!-- ./panel-body -->
        </div><!-- ./panel -->

    </div>
</div>