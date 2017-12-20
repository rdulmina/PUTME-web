<?php require_once "../model/Driver.php" ?>

<!-- model to handle register requests -->
<div id="view_data_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-md-11">
                    <h3 class="modal-title" style="margin-left: 12%">Handle Filled Request</h3>
                </div>
                <div class="col-md-1">
                    <button type="button" style="margin-left: 20%" class="close" data-dismiss="modal" aria-label="Close"  style="margin-right: 0">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Request ID</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_req_id" id="view_req_id" maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Bin ID</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="view_bin_id" id="view_bin_id" maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Is Filled</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  id="view_is_filled" name="view_is_filled"  maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Location</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  id="view_location" name="view_location" oninput="mytest()" maxlength="12" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type="text" rows="5" id="view_description" name="view_description" maxlength="100" required="" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 control-label">Drivers to be Assigned</label>
                        <div class="col-md-8" id="drivernames">


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="view_id" id="view_id" />
                            <input type="button" onclick="assignDriver()" name="update" id="update" value="Assign Driver" class="btn btn-success my-lg-button-success" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

