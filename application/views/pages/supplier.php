<!-- page content -->
<div id="supplier" class="page-content main" role="main" xmlns:height="http://www.w3.org/1999/xhtml">

    <div class="inventory-tab">
        <div class="page-title">
            <h1>Supplier</h1>
        </div>

        <button class="pull-right" role="tab" id="headingOne" data-toggle="tab"
                href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-plus"></i><span> Add Supplier</span>
        </button>

        <div class="accordion table-responsive" id="accordion" role="tablist" aria-multiselectable="true">

            <table id="supplier-table" data-search="true" data-pagination="true" data-toggle="table"
                   data-url="supplier/viewSuppliers"
                   class="table table-no-bordered">
                <thead>
                <tr>
                    <th data-sortable="true" data-field="supplier">Supplier</th>
                    <th data-sortable="true" data-field="address">Address</th>
                    <th data-sortable="true" data-field="contact">Contact</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

<div class="AddSup hidden" role="tabpanel" aria-labelledby="headingOne">
    <button type="button" onclick="addSupplierBack()" class="btn btn"></i> Back</a></button>
    <div class="x_content">
        <div class="panel-body">
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form method="POST" action="supplier/addSupplier" data-validate="parsley">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="first-name">Supplier Name</label>
                                    <input type="text" name="supplier" id="first-name"
                                           data-required="true" class="form-control has-feedback-left"
                                           data-error-message="Please enter the Supplier Name">
                                    <span class="fa fa-truck form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="last-name">Address</label>
                                    <input type="text" id="last-name" name="address"
                                           data-required="true" class="form-control has-feedback-left"
                                           data-error-message="Please Enter the Address">
                                    <span class="fa fa-location-arrow form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="middle-name">Contact Number</label>
                                    <input id="middle-name" class="form-control has-feedback-left"
                                           type="text" name="contact" data-required="true"
                                           data-error-message="Please Enter Contact Number">
                                    <span class="fa fa-phone form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                                    <button class="btn btn-danger" type="button"><i
                                                class="fa fa-close"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-success"><i
                                                class="fa fa-send"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->