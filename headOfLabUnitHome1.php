<?php
// handles displaying of successful edit message
// feedback after action
$opt = new Options();
if (isset($_GET['succ']) && $_GET['succ']==3){
    $msg = "Record has been updated successfully...";
    $opt->success($msg);
}


?>

<!-- bootstrap-table script-->
<script src="<?php echo $set->url;?>/js/bootstrap-table.js"></script>

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
                                <td><?php echo $row['labUnit']; ?></td>
                                <td><?php echo $row['dateOfIncident']; ?></td>
                                <td><?php
                                    if($row['status'] === "closed")
                                        echo "Closed";
                                    else echo "Pending";
                                    ?>
                                </td>
                                <td>
                                    <a href="NCE.php?id=<?php echo $row['refNumber']; ?>" class="btn btn-sm"><i class="fa fa-file-text" title="View"></i> </a>|
                                    <a href="NCE2.php?id=<?php echo $row['refNumber']; ?>" class="btn btn-sm"><i class="fa fa-edit" title="Edit"></i> </a>|
                                    <a rel="facebox" href="RCA.php?id=<?php echo $row['refNumber']; ?>"> RootCauseAnalysis </a>
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

<!-- custon table script -->
<script>
    $(function () {
        $('#hover, #striped, #condensed').click(function () {
            var classes = 'table';

            if ($('#hover').prop('checked')) {
                classes += ' table-hover';
            }
            if ($('#condensed').prop('checked')) {
                classes += ' table-condensed';
            }
            $('#table-style').bootstrapTable('destroy')
                .bootstrapTable({
                    classes: classes,
                    striped: $('#striped').prop('checked')
                });
        });
    });

    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
    }
</script>