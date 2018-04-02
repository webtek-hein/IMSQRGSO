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
            <div class="col-lg-12 supplier-tab">
                <div class="card">
                    <div class="card-header">
                        <?php $position = $this->session->userdata['logged_in']['position'];
                        if ($position === 'Custodian') {
                            echo '<button onclick="addSupplier()" class="btn btn-primary">
                                <i class="fa fa-plus"></i><span> Add Supplier</span>
                            </button>';
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <table id="supplier-table" data-search="true" data-pagination="true"
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
            <div hidden class="col-lg-12 addSupplier">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="toggleDiv($('.supplier-tab'),$('.addSupplier'))" class="btn btn-primary"></i> Back</a></button>
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
                                           name="contact" data-required="true"
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
                </div>
            </div>
            <div hidden class="col-lg-12 editSupplier-tab">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="toggleDiv($('.supplier-tab'),$('.editSupplier-tab'))" class="btn btn-primary"></i> Back</a></button>
                    </div>
                    <div class="card-body">
                        <form id="editInformation"
                              class="serialForm form-horizontal form-label-left"
                              action="supplier/addSupplier" method="POST" data-validate="parsley">

                            <div class="form-group">
                                <label for="Supplier Name" class="col-md-12">Supplier Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="supplier"
                                           id="supplier"
                                           data-required="true"
                                           class="form-control"
                                           data-error-message="Please enter the Supplier Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Address" class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input type="text" id="location" name="address"
                                           data-required="true"
                                           data-parsley-minlength="1"
                                           data-parsley-maxlength="200"
                                           class="form-control has-feedback-left"
                                           data-error-message="Please Enter the Address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Address" class="col-md-12">Contact Number</label>
                                <div class="col-md-12">
                                    <input id="cno" class="form-control"
                                           type="text" name="contact" data-required="true"
                                           data-parsley-minlength="1"
                                           data-parsley-maxlength="11"
                                           data-error-message="Please Enter Contact Number" required>
                                </div>
                            </div>
                           
                           <?php if ($position === 'Custodian') {
                            echo '<button class="btn btn-outline-info" type="submit" name="id" id="edtbuttonsupplier"><i class="fa fa-check"></i> Save</button>';
                           }
                           ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


