
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
            <div class="panel-heading">ROOT CAUSE ANALYSIS FORM</div>
            <div class="panel-body">
                <form role="form" method="post" action="">

                    <div class="form-group col-md-6" >
                        <label class="col-md-5" for="refNo">Reference No.</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="refNumber" id="refNo" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-5" for="investi">Date of Investigation:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dateOfInvesti" id="investi">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-5" for="teamlead">Team Leader:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="teamLeader" id="teamlead">
                        </div>
                    </div>
                    <!-- space filler -->
                    <div class="form-group col-md-6"></div>
                    <div class="col-md-12">
                        <h4>Investigation team</h4><hr>
                    </div>
                    <div class="form-group table-responsive col-md-12">
                    <!-- Table to present name & signature inputs -->
                        <table class="table" style="text-align: justify">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Signature</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="name1" placeholder="Name 1"></td>
                                <td><input type="text" class="form-control" name="sign1" placeholder="Sign 1"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="name2" placeholder="Name 2"></td>
                                <td><input type="text" class="form-control" name="sign2" placeholder="Sign 2"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="name3" placeholder="Name 3"></td>
                                <td><input type="text" class="form-control" name="sign3" placeholder="Sign 3"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="name4" placeholder="Name 4"></td>
                                <td><input type="text" class="form-control" name="sign4" placeholder="Sign 4"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="name5" placeholder="Name 5"></td>
                                <td><input type="text" class="form-control" name="sign5" placeholder="Sign 5"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="name6" placeholder="Name 6" </td>
                                <td><input type="text" class="form-control" name="sign6" placeholder="Sign 6"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-12">
                        <h4>Method of Investigation</h4><hr>
                        <div class="checkbox">
                            <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="Brainstorming">
                                Brainstorming</label>
                            <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="5 Whys">
                                5 Whys</label>
                            <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="Staff interviews">
                                Staff Interviews</label>
                            <label class="checkbox-inline"> <input type="checkbox" name="method[]" value="Fishbone diagram">
                                Fishbone Diagram</label>
                        </div>
                        <div>
                            <label class="col-md-4">Attach evidence where necessary:</label>
                            <input type="file" name="attachment">
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
                    <div class="form-group col-md-6">
                        <label for="sign" class="col-md-5">Team Leader Signature:</label>
                        <div class="col-md-7">
                            <input class="form-control" name="teamLeadSign" id="sign">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date" class="col-md-5">Completion Date:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="finishDate" id="date">
                        </div>
                    </div>
                    <div class="col-md-12 col-md-offset-4">
                        <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                </form>
            </div><!-- ./panel-body -->
        </div><!-- ./panel -->

    </div>
</div>