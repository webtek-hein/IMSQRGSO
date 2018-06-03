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

<div id="supplierPageContent" class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Supplier-->
            <div class="col-lg-12 supplier-tab">
                <div class="card">
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Custodian') {


                        echo '<div class="card-header">
                                  <button onclick="addSupplier()" class="btn btn-info btn-sm">
                                  <i class="fa fa-plus"></i><span> Add Supplier</span>
                                  </button>
                              </div>';
                    }
                    ?>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <table id="supplier-table" data-search="true" data-pagination="true"
                                   class="table table-bordered">
                                <thead class="table-secondary">
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
                        <button type="button" onclick="toggleDiv($('.supplier-tab'),$('.addSupplier'))"
                                class="btn btn-dark fa fa-arrow-left"></i> Back</a></button>
                    </div>
                    <div class="card-body card-block col-lg-8 align-self-center">
                        <div class="tab-content pl-3 p-1 AddSup hidden" id="myTabContent">
                            <form method="POST" action="supplier/addSupplier" data-validate="parsley">
                                <div class="form-group">
                                    <label for="Supplier Name" class=" form-control-label">Supplier Name</label>
                                    <input name="supplier" id="supplier-name"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please enter the Supplier Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="Address" class=" form-control-label">Address</label>
                                    <input id="address" name="address"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="PostalCode" class=" form-control-label">Postal Code</label>
                                    <input id="postal" name="postal"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Postal Code" required>
                                </div>

                                <div class="input_contact form-group">
                                    <label for="Contactno" class=" form-control-label">Contact Number/s</label>
                                    <div class="input-group">
                                        <input id="contactno"
                                               name="contact[]" data-required="true"
                                               data-error-message="Please Enter Contact Number" required><button type="button" class="btn btn-primary btn-sm contact_add">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                </div>

                                <div class="input_email form-group">
                                    <label for="email" class=" form-control-label">Email</label>
                                    <div class="input-group">
                                    <input id="email"
                                           name="email[]" data-required="false"
                                           data-error-message="Please Enter Email" type="email" required>
                                    <button type="button" class="btn btn-primary btn-sm email_add">
                                        <i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tin" class=" form-control-label">TIN</label>
                                    <div class="text-danger tin-err-msg"><p>Example: 0000-0000-0000</p></div>
                                    <input id="tin" class="form-control col-6"
                                           name="tin" data-required="true" required">
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
            <script>
                $(document).ready(function () {

                });
            </script>
            <div hidden class="col-lg-12 editSupplier-tab">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="toggleDiv($('.supplier-tab'),$('.editSupplier-tab'))"
                                class="btn btn-dark fa fa-arrow-left"></i> Back</a></button>
                    </div>
                    <?php if ($position === 'Custodian') {
                        echo '<div class="card-body">
                        <form id="editInformation"
                              class="serialForm form-horizontal form-label-left"
                              action="supplier/editSupplier" method="POST" data-validate="parsley">
                            <div class="form-group">
                                    <label for="Supplier Name" class=" form-control-label">Supplier Name</label>
                                    <input name="supplier" id="supplier"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please enter the Supplier Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="Address" class=" form-control-label">Address</label>
                                    <input id="location" name="address"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="PostalCode" class=" form-control-label">Postal Code</label>
                                    <input id="postal1" name="postal"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Postal Code" required>
                                </div>
                                <div class="form-group">
                                    <label for="Contactno" class=" form-control-label">Contact Number/s</label>
                                    <div class="input-group">
                                    <div id="contactno1" name="contact[]"></div>
                                </div>
                                </div>
                            <div class="form-group">
                                    <label for="email" class=" form-control-label">Email</label>
                                     <div type="email" id="email1" name="email[]" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="tin" class=" form-control-label">TIN</label>
                                    <input id="tin1" class="form-control col-6"
                                           name="tin" data-required="true" required>
                                </div>
                                <div class="form-group">
                                    <label for="tin" class=" form-control-label">Status</label>
                                    <select id="status" class="form-control col-6"
                                           name="status" data-required="true" required>
                                            <option value="Active">Active</option>
                                             <option value="Inactive">Inactive</option>
                                        </select>
                                           
                                </div>
                            <br><hr>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="id" id="edtbuttonsupplier"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


