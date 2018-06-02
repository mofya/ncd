<?php
include "databaseConnection.php";


 //processing report filter
if (isset($_GET['submit']) && $_GET['submit'] == 's'){
    // initial query
    $query = "SELECT * FROM `form_information`";

    if (isset($_GET['labUnit']) && !empty($_GET['labUnit'])) {
        // put value in variables
        $lab = mysqli_real_escape_string($db, $_GET['labUnit']);

        // add condition to the query string
        if ($lab != 'All') {
            $query .= "WHERE labUnit = '$lab'";
        } else {
            $query1 = "WHERE ";
        }
    }
    if (isset($_GET['month']) && !empty($_GET['month'])){
        // put value in variable
        $month = mysqli_real_escape_string($db, $_GET['month']);

        // add condition to query string
        if (isset($query1) && $month != 'All') {
            $query .= $query1." MONTH(dateOfIncident) = '$month'";
        } else if ($month != 'All') {
            $query .= "AND MONTH(dateOfIncident) = '$month'";
        }

    } else {
        // echo error
        echo "<div class='alert alert-info'>Please enter something in the filter form!</div>";
    }
    // run query
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    // get number of rows returned
    $num_rows = mysqli_num_rows($result);
} else {
    // for the first time the page loads. It pulls all the records from the db

    $currentMonth = date('n');  // gets the current month, used for db retrieval
    $monthName = date('F'); // gets name of current month, used for display

    // when page is first loaded
    $query = "SELECT * FROM `form_information` WHERE MONTH(dateOfIncident) = '$currentMonth'";
    // run query
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    // get number of rows returned
    $num_rows = mysqli_num_rows($result);

}

// this process is to get chart data
$curentMonth = date('m'); // gets current month
// list of months
$nameOfMonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
$month_count = count($nameOfMonth);
$records = [];
$monthArray = []; // declares an associative array to store query values

$combined = [];

// loop through till current month
for ($i = 1; $i <= $curentMonth; $i++) {
//    $j = $i + 1;
    $sql = "SELECT COUNT(*) as total FROM `form_information` WHERE MONTH(dateOfIncident) = '$i'"; // adds to query string

    $res = mysqli_query($db, $sql); // runs the query
    $m = mysqli_fetch_assoc($res); // gets the retrieved values, can be accessed as $m['total']

    // stores the $m as a value of month_$i
    //$monthArray[$nameOfMonth[$i-1]] = $m['total'];
    // new implementation
    $monthArray[] = ['theMonth' => $nameOfMonth[$i-1], 'theRecord' => $m['total'] ];

}

// encode in json
$converted = json_encode(array('item' => $monthArray), JSON_FORCE_OBJECT);
//echo $converted;

?>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <h2>Analysis Reports</h2>
        <h4>
            View monthly reports and Root Cause reports
        </h4>


<!--        <div class="col-md-offset-6">-->
<!--            <div class="well well-lg">-->
<!--                <h4><u>Filter report</u></h4>-->
<!--                <form role="form" action="" method="get">-->
<!--                    <div class="form-group col-md-6">-->
<!--                        <label for="labs">Select lab unit</label>-->
<!--                        <select class="form-control" name="labUnit" id="labs">-->
<!--                            <option>All</option>-->
<!--                            --><?php
//                            // getting departments from the database
//                            $depts = mysqli_query($db, "SELECT * FROM departmet");
//                            while ($row = mysqli_fetch_assoc($depts)){
//                                echo "<option>".$row['department_name']."</option>";
//                            }
//                            ?>
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="form-group col-md-6">-->
<!--                        <label for="month">Select month</label>-->
<!--                        <select class="form-control" name="month" id="month">-->
<!--                            <option>All</option>-->
<!--                            <option value="1">January</option>-->
<!--                            <option value="2">February</option>-->
<!--                            <option value="3">March</option>-->
<!--                            <option value="4">April</option>-->
<!--                            <option value="5">May</option>-->
<!--                            <option value="6">June</option>-->
<!--                            <option value="7">July</option>-->
<!--                            <option value="8">August</option>-->
<!--                            <option value="9">September</option>-->
<!--                            <option value="10">October</option>-->
<!--                            <option value="11">November</option>-->
<!--                            <option value="12">December</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <button type="submit" name="submit" value="s" class="btn btn-success col-md-offset-11">Filter</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
    </div><!-- ./row -->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Reports</strong>
                    <a href="#charts" class="pull-right" title="View graphical chart representation">View chart report</a>
                </div>
                <div class="panel-body">
                    <!-- report filter -->
                    <div class="col-md-6 col-lg-7">
                        <h5><u>Filter report</u></h5>
                        <form role="form" action="" method="get">
                            <div class="form-group col-md-5">
                                <label for="labs">Select lab unit</label>
                                <select class="form-control" name="labUnit" id="labs">
                                    <option>All</option>
                                    <?php
                                    // getting departments from the database
                                    $depts = mysqli_query($db, "SELECT * FROM departmet");
                                    while ($row = mysqli_fetch_assoc($depts)){
                                        echo "<option>".$row['department_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="month">Select month</label>
                                <select class="form-control" name="month" id="month">
                                    <option>All</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2" style="padding-top: 25px">
                                <button type="submit" name="submit" value="s" class="btn btn-success">Filter</button>
                            </div>
                        </form>
                        <hr>
                    </div>

                    <!-- table -->
                    <table class="table table-striped responsive-utilities" data-toggle="table" data-show-refresh="false"
                           data-show-toggle="true" data-show-columns="true" data-search="true"
                           data-select-item-name="toolbar1" data-pagination="true" data-sort-name="refNo"
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
                        <tbody>
                        <?php
                        if ($num_rows > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['refNumber']; ?></td>
                                    <td><?php echo $row['labUnit']; ?></td>
                                    <td><?php echo $row['dateOfIncident']; ?></td>
                                    <td>
                                        <?php
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
                            } // end while
                        } // end if
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- ./row -->
    <div class="row" id="charts">
        <div class="col-md-6">
            <h4><u>Comparison of monthly incidents</u></h4><br>
            <canvas id="myChart1" width="400" height="300"></canvas>

            <script>

                let myObj = JSON.parse('<?= $converted; ?>');
                let months = "";  // stores the months
                let records = "";  // stores the records

                // loops through the object and gets the months and records
                for (let i in myObj.item) {
                    months += myObj.item[i].theMonth + ", ";
                    records += myObj.item[i].theRecord + ", ";
                }


                var ctx = document.getElementById("myChart1").getContext('2d');
                var myChart1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: months.split(", "),
                        datasets: [{
                            label: '# of Incidents',
                            data: records.split(", "),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(45, 93, 74, 0.2)',
                                'rgba(28, 22, 65, 0.2)',
                                'rgba(213, 179, 57, 0.2)',
                                'rgba(57, 195, 213, 0.2)',
                                'rgba(105, 73, 73, 0.2)',
                                'rgba(117, 255, 102, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(45, 93, 74, 1)',
                                'rgba(28, 22, 65, 1)',
                                'rgba(213, 179, 57, 1)',
                                'rgba(57, 195, 213, 1)',
                                'rgba(105, 73, 73, 1)',
                                'rgba(117, 255, 102, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>

        <div class="col-md-6">
            <h4><u>Sample doughnut chart</u></h4>
            <canvas id="donut" width="400" height="300"></canvas>

            <script>

                var ctx = document.getElementById("donut").getContext('2d');
                var donut = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['monday', 'tuesday', 'wednesday'],
                        datasets: [{
                            label: '# of Incidents',
                            data: [10, 20, 30],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(45, 93, 74, 0.2)',
                                'rgba(28, 22, 65, 0.2)',
                                'rgba(213, 179, 57, 0.2)',
                                'rgba(57, 195, 213, 0.2)',
                                'rgba(105, 73, 73, 0.2)',
                                'rgba(117, 255, 102, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(45, 93, 74, 1)',
                                'rgba(28, 22, 65, 1)',
                                'rgba(213, 179, 57, 1)',
                                'rgba(57, 195, 213, 1)',
                                'rgba(105, 73, 73, 1)',
                                'rgba(117, 255, 102, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                       animation: {
                           animateScale: true
                       }
                    }
                });
            </script>
        </div>

    </div><!-- ./row -->
</div>