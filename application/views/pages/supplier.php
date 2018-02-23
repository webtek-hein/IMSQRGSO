<!-- page content -->
<div id="inventory-main-page" class="page-content right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
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

                                                            <div class="col-md-7 col-sm-12 col-xs-12">
                                                                <div class="x_panel">
                                                                    <div class="x_content">
                                                                        <form method="POST" action="supplier/addSupplier" data-validate="parsley" class="form-horizontal form-label-left" data-validate="parsley">

                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                    <label for="first-name">Supplier Name</label>
                                                                                    <input type="text" name="supplier" id="first-name" data-required="true" class="form-control has-feedback-left" data-error-message="Please enter the Supplier Name">
                                                                                    <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                    <label for="last-name">Address</label>
                                                                                    <input type="text" id="last-name" name="address" data-required="true" class="form-control has-feedback-left" data-error-message="Please Enter the Address">
                                                                                    <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                    <label for="middle-name">Contact Number</label>
                                                                                    <input id="middle-name" class="form-control has-feedback-left" type="text" name="contact" data-required="true" data-error-message="Please Enter Contact Number">
                                                                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true" ></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ln_solid"></div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
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
                                            <th data-sortable="true" data-field="address">Address</th>
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

<!-- /page content -->