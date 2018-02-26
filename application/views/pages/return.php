<!-- page content -->
<div id="returns" class="page-content" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="page-title">
        <h1>Returns</h1>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <table id="datatable" data-pagination="true" data-search="true" data-toggle="table"
                       data-url="invetory/returnitem" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-sortable="true" data-field="number">#</th>
                        <th data-sortable="true" data-field="timestamp">Timestamp</th>
                        <th data-sortable="true" data-field="serial">Serial no.</th>
                        <th data-sortable="true" data-field="item">Item Name</th>
                        <th data-sortable="true" data-field="description">Item Description</th>
                        <th data-sortable="true" data-field="datereturned">Date Returned</th>
                        <th data-sortable="true" data-field="reason">Reason</th>
                        <th data-sortable="true" data-field="returnedby">Returned By</th>
                        <th data-sortable="true" data-field="receivedby">Received By</th>
                        <th data-sortable="true" data-field="status">Returned Status</th>
                        <th data-sortable="true" data-field="action">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- MODAL -->
    <!-- Replace -->
    <div class="modal fade replace" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Replace</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left" novalidate>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Account Code<span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="accountcode" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6" data-validate-words="2" name="AccountCode"
                                       required="required" type="text" placeholder="Account Code">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Serial Number<span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="serialno" name="SerialNumber" required="required"
                                       class="form-control col-md-7 col-xs-12" placeholder="Serial Number">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Received By<span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="receivedby" name="ReceivedBy" required="required"
                                       class="form-control col-md-7 col-xs-12" placeholder="Received By">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="save1"><i class="fa fa-arrow-down"></i> Save
                    </button>
                    <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <!-- /Replace -->
    <!-- /Modal -->

    <!-- Ignore -->
    <div class="modal fade ignore" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><b>Available Stock of this Item is 5</b></h4>
                </div>
                <div class="modal-body">
                    <b>Are You sure you want to Ignore this Entry?</b>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="save1"><i class="fa fa-check-square-o"></i> Yes
                    </button>
                    <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <!-- /Ignore -->

</div>
