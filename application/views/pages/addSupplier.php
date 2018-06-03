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
                                   data-error-message="Please Enter Contact Number" required>
                            <button type="button" class="btn btn-primary btn-sm contact_add">
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
