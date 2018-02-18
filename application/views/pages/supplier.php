<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Supplier</h2>
                        <div class="clearfix"></div>
                    </div>
                        <div class="x_content">
                                                <!-- start accordion -->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel">
                                                    <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <h4 class="panel-title">Add Supplier</h4>
                                                    </a>
                                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">

                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="x_panel">
                                                                    <div class="x_content">
                                                                        <form method="POST" action="supplier/addSupplier" data-validate="parsley" class="form-horizontal form-label-left" data-validate="parsley">

                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Supplier Name</label>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <input type="text" name="supplier" id="first-name" data-required="true" class="form-control col-md-7 col-xs-12" data-error-message="Please enter the Supplier Name">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address</label>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <input type="text" id="last-name" name="address" data-required="true" class="form-control col-md-7 col-xs-12" data-error-message="Please Enter the Address">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number</label>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="contact" data-required="true" data-error-message="Please Enter Contact Number">
                                                                                </div>
                                                                            </div>
                                                                            <div class="ln_solid"></div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                                                                    <button class="btn btn-danger" type="button"><i class="fa fa-close"></i> Cancel</button>
                                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <!-- end of accordion -->
                                <div class="x_content">
                                    <table data-pagination="true" data-search="true" data-toggle="table" data-url="supplier/viewSuppliers" data-show-toggle="true" class="table table-no-bordered table-hover">
                                        <thead>
                                        <!-- Data-field for getting data  -->
                                        <tr >
                                            <th data-sortable="true" data-field="supplier">Supplier</th>
                                            <th data-sortable="true" data-field="address">Akddress</th>
                                            <th data-sortable="true" data-field="contact">Contact</th>
                                        </tr>
                                     </thead>
                                    </table>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- /page content -->