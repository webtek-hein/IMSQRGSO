<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Returns</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Returns</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Returns-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="returnTable" class="table table-no-bordered">
                        </table>
                    </div>
                </div>
            </div>
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
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute" method="POST"
      data-validate="parsley">
    <div class="ViewSerial modal fade" id="DitributeItem" tabindex="-1" role="dialog"
         aria-labelledby="distrib-modal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Distribution</h5>
                </div>
                <div class="modal-body">

                    <div class="col-4">
                        <div class="form-group">
                            <p>Quantity Left: <span id="quantLeft"></span></p>
                            <br>
                            <div class="serial">
                                <label for="name"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="quant">
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">Department</label>
                                <select list="typelist" name="dept" class="deptopt form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">Account Code</label>
                                <select list="typelist" name="Code" id="accode" class="form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="date">Date of Distribution</label>
                                <input id="date" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="date" required type="date">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">OBR Number</label>
                                <input id="obr" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="obr" required type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-10">
                                <label for="name">Supply Officer</label>
                                <select list="typelist" name="owner" class="ownerOpt form-control" required>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" id="save1" class="btn btn-primary btn-modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- accept return -->
<form class="form-horizontal form-label-left">
    <div class="AcceptReturn modal fade" id="accept_modal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <h5 class="modal-title" id="myModalLabel">Are you sure you want to Accept?</h5>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Remarks</label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button  name="id" class="btn-modal btn btn-primary" id="save1"><i
                                class="fa fa-arrow-down"></i> Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end accept return -->

</div>
