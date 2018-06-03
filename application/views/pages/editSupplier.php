<div hidden class="col-lg-12 editSupplier-tab">
    <div class="card">
        <div class="card-header">
            <button type="button" onclick="toggleDiv($('.supplier-tab'),$('.editSupplier-tab'))"
                    class="btn btn-dark fa fa-arrow-left"></i> Back</a></button>
        </div>
        <div class="card-body">
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
                    <div type="email" id="email1" name="email[]"></div>
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
                <br>
                <hr>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" name="id" id="edtbuttonsupplier"><i
                            class="fa fa-check"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
