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
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Custodian') {


                        echo '<div class="card-header">
                                  <button onclick="addSupplier()" class="btn btn-primary">
                                  <i class="fa fa-plus"></i><span> Add Supplier</span>
                                  </button>
                              </div>';
                    }
                    ?>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <table id="supplier-table" data-search="true" data-pagination="true"
                                   class="table table-bordered table-sm">
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
                        <button type="button" onclick="toggleDiv($('.supplier-tab'),$('.addSupplier'))"
                                class="btn btn-primary fa fa-arrow-left"></i> Back</a></button>
                    </div>
                    <div class="card-body card-block col-lg-8 align-self-center">
                        <div class="tab-content pl-3 p-1 AddSup hidden" id="myTabContent">
                            <form method="POST" action="supplier/addSupplier" data-validate="parsley">
                                <div class="form-group">
                                    <label for="Supplier Name" class=" form-control-label">Supplier Name</label>
                                    <input name="supplier" id="supplier-name"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please enter the Supplier Name">
                                </div>
                                <div class="form-group">
                                    <label for="Address" class=" form-control-label">Address</label>
                                    <input id="address" name="address"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Address">
                                </div>
                                <div class="form-group">
                                    <label for="PostalCode" class=" form-control-label">Postal Code</label>
                                    <input id="postal" name="postal"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Postal Code">
                                </div>
                                <div class="form-group col-12">

                                    <div class="input_contact form-group col-5">
                                        <label for="Contactno" class=" form-control-label pull-left">Cellphone
                                            Number/s:</label>
                                        <div class="input-group">
                                            <input id="contactno" class=" form-control"
                                                   name="contact" data-required="true"
                                                   data-error-message="Please Enter Contact Number">
                                            </input>
                                            <button type="button" class="btn btn-primary btn-sm add">
                                                <i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class=" form-control-label">Email</label>
                                    <input id="email" class="form-control col-6"
                                           name="email" data-required="false"
                                           data-error-message="Please Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="tin" class=" form-control-label">TIN</label>
                                    <input id="tin" class="form-control col-6"
                                           name="tin" data-required="false">
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
                                class="btn btn-primary fa fa-arrow-left"></i> Back</a></button>
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
                                           data-error-message="Please enter the Supplier Name">
                                </div>
                                <div class="form-group">
                                    <label for="Address" class=" form-control-label">Address</label>
                                    <input id="location" name="address"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Address">
                                </div>
                                <div class="form-group">
                                    <label for="PostalCode" class=" form-control-label">Postal Code</label>
                                    <input id="postal1" name="postal"
                                           data-required="true"
                                           class="form-control col-6"
                                           data-error-message="Please Enter the Postal Code">
                                </div>
                                <div class="input_contact form-group">
                                    <label for="Contactno" class=" form-control-label">Contact Number/s</label>
                                    <div class="input-group">
                                    <div id="contactno1" name="contact[]"></div>
                                </div>
                                </div>
                            <div class="form-group">
                                    <label for="email" class=" form-control-label">Email</label>
                                    <input id="email1" class="form-control col-6"
                                           name="email" data-required="false"
                                           data-error-message="Please Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="tin" class=" form-control-label">TIN</label>
                                    <input id="tin1" class="form-control col-6"
                                           name="tin" data-required="false">
                                </div>
                                <div class="form-group">
                                    <label for="tin" class=" form-control-label">Status</label>
                                    <select id="status" class="form-control col-6"
                                           name="status" data-required="false">
                                            <option value="Active">Active</option>
                                             <option value="Inactive">Inactive</option>
                                        </select>
                                           
                                </div>
                            <br><hr>
                            <div class="form-group">
                                <button class="btn btn-outline-info" type="submit" name="id" id="edtbuttonsupplier"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>';
                    } else {
                        echo '<div class="card-body">
                        <form id="editInformation"
                              class="serialForm form-horizontal form-label-left"
                              action="supplier/addSupplier" method="POST" data-validate="parsley">
                            <div class="form-group">
                                <label for="Supplier Name" class="col-md-12">Supplier Name</label>
                                <div class="col-md-12">
                                    <input name="supplier"
                                           readonly="readonly"
                                           id="supplier"
                                           data-required="true"
                                           class="form-control"
                                           data-error-message="Please enter the Supplier Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Address" class="col-md-12">Address</label>
                                <div class="col-md-12">
                                   <textarea id="contactno"
                                            readonly = "readonly"
                                           name="address" data-required="true"
                                           data-error-message="Please Enter Contact Number">
                                        Cellphone Number/s:
                                        Telephone Number:
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Address" class="col-md-12">Contact Number</label>
                                <div class="col-md-12">
                                    <input id="cno" class="form-control"
                                           readonly="readonly"
                                           name="contact" data-required="true"
                                           data-parsley-minlength="1"
                                           data-parsley-maxlength="11"
                                           data-error-message="Please Enter Contact Number" required>
                                </div>
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


