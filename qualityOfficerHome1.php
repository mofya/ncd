<?php
// feedback after action
$opt = new Options();
if (isset($_GET['Succ'])){
    $msg = "The delete operation was successful...";
    $opt->success($msg);
}else if (isset($_GET['succ']) && $_GET['succ']==3){
    $msg = "Record has been updated successfully...";
    $opt->success($msg);
}


?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Overview</div>
                <div class="panel-body">
                    <!-- table -->
                    <table class="table table-striped responsive-utilities" data-toggle="table" data-show-refresh="false"
                           data-show-toggle="true" data-show-columns="true" data-search="true"
                           data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                           data-sort-order="desc" style="font-size: small">

                        <thead>
                        <tr>
                            <!--<th data-field="state" data-checkbox="true">Count</th>-->
                            <th data-field="refNo" data-sortable="true">Reference No</th>
                            <th data-field="incidentSelected" data-sortable="false">Incident selected</th>
                            <th data-field="labUnit" data-sortable="true">Lab Unit</th>
                            <th data-field="dateOfIncident" data-sortable="true">Date of Incident</th>
                            <th data-field="status" data-sortable="true">Status</th>
                            <th data-field="action" data-sortable="false">Action</th>
                        </tr>
                        </thead>
                        <?php
                        include('connect.php'); // databaseConnection.php not working here
                        $result = $db->prepare("SELECT * FROM form_information");
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                        ?>
                        <tr>
                            <td><?php echo $row['refNumber']; ?></td>
                            <td></td>
                            <td><?php echo $row['labUnit']; ?></td>
                            <td><?php echo $row['dateOfIncident']; ?></td>
                            <td><?php
                                if($row['status'] === "closed")
                                    echo "Closed";
                                else echo "Pending";
                                ?>
                            </td>
                            <td>
                                <a rel="facebox" href="RCA.php?id=<?php echo $row['refNumber']; ?>"> RootCauseAnalysis </a>|
                                <a href="NCE.php?id=<?php echo $row['refNumber']; ?>" class="btn btn-sm"><i class="fa fa-file-text" title="View"></i> </a> |
                                <a href="NCE2.php?id=<?php echo $row['refNumber']; ?>" class="btn btn-sm"><i class="fa fa-edit" title="Edit"></i> </a> |
                                <button type="button" title="Delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal<?php echo $row['refNumber']; ?>">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Delete confirmation modal -->
                                <div class="modal fade" id="delModal<?php echo $row['refNumber']; ?>" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to <strong>delete this
                                                        report <em>Ref No.</em> <?php echo $row['refNumber']; ?></strong> from the system?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="delete.php?id=<?php echo $row['refNumber']; ?>" class="btn btn-danger">Yes</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end modal -->
                            </td>
                        </tr>
                            <?php
                        } //end foreach
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

