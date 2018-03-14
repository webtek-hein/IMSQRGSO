<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Supplier</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Supplier</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Supplier-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-primary" role="tab" id="headingOne" data-toggle="tab"
                                href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-plus"></i><span> Add Supplier</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1" id="myTabContent">
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
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="addSupplierBack()" class="btn btn"></i> Back</a></button>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1 AddSup hidden" id="myTabContent">
                            <form method="POST" action="supplier/addSupplier" data-validate="parsley">
                                <div class="form-group">
                                    <label for="Supplier Name" class=" form-control-label">Supplier Name</label>
                                    <input type="text" name="supplier" id="supplier-name"
                                           data-required="true"
                                           class="form-control has-feedback-left"
                                           data-error-message="Please enter the Supplier Name">
                                </div>
                                <div class="form-group">
                                    <label for="Address" class=" form-control-label">Address</label>
                                    <input type="text" id="address" name="address"
                                           data-required="true"
                                           class="form-control has-feedback-left"
                                           data-error-message="Please Enter the Address">
                                </div>
                                <div class="form-group">
                                    <label for="Address" class=" form-control-label">Contact Number</label>
                                    <input id="contactno" class="form-control has-feedback-left"
                                           type="text" name="contact" data-required="true"
                                           data-error-message="Please Enter Contact Number">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i
                                                class="fa fa-send"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
