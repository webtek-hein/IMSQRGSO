<div hidden class="additemDiv col-lg-12">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-danger btn-sm" id="exit"
                    onclick="toggleDiv($('.inventory-tab'), $('.additemDiv'))">
                <i class="fa fa-times"></i> Cancel
            </button>
        </div>
        <div class="card-body card-block col-lg-12">
            <div role="tabpanel" data-example-id="togglable-tabs" class="togle">
                <ul id="bulk" class="nav nav-tabs" id="DetailTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="DetInfo" data-toggle="tab" href="#step1B"
                           role="tab"
                           aria-controls="step1" aria-selected="true">Item 1</a>
                    </li>
                    <li id="another">
                        <button id="addanother" class="btn btn-primary" role="tab" data-toggle="tooltip"
                                data-placement="bottom" title="Add another Item">
                            <i class="ti-plus"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <br/>

            <form class="forUIaddItem form-horizontal form-label-left input_mask col-8" id="addItemForm"
                  role="form"
                  action="Inventory/saveAll" method="POST">

                <div id="bulkdiv" class="tab-content">
                    <h5 id="addItemh3">Item Information</h5>
                    <br/>

                    <div class="clone-tab tab-pane active" role="tabpanel" id="step1B">
                        <div class="form-group">
                            <label class="addItemLabel" for="item">Item Name</label>
                            <input name="item[]"
                                   class="addItemInput form-control col-6 align-middle"
                                   data-parsley-group="set1"
                                   placeholder="Enter the name of the item"
                                   required>
                        </div>
                        <div class="form-group">
                            <label class="addItemLabel" for="itemtype">Item type
                            </label>
                            <select data-parsley-group="set1"
                                    list="typelist" name="Type[]"
                                    class="addItemSelect itemtype form-control col-6" required>
                                <option value="CO">Capital Outlay</option>
                                <option value="MOOE">MOOE</option>
                            </select>
                            <input onchange="togglebox(1)" id="ws1" class="addItemInput chckboxIn" type="checkbox"
                                   tabindex="-1" name="serialStatus[]"
                                   value="1"> With serial
                            <input hidden id="wo1" type="checkbox" class="wochk" tabindex="-1" name="serialStatus[]"
                                   value="0">
                        </div>
                        <div class="form-group">
                            <label class="addItemLabel" for="quantity">Quantity</label>
                            <input type="number" name="quant[]"
                                   class="addItemInput form-control col-6"
                                   data-parsley-group="set1"
                                   placeholder="Enter the quantity" min="0"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Unit</label>
                            <input name="Unit[]" data-parsley-group="set1"
                                   class="addItemInput form-control col-6" class="unit"
                                   list="list"
                                   data-parsley-required-message="Select the Unit"
                                   required>
                            <datalist id="list">
                                <option value="piece">piece</option>
                                <option value="box">box</option>
                                <option value="set">set</option>
                                <option value="ream">ream</option>
                                <option value="dozen">dozen</option>
                                <option value="bundle">bundle</option>
                                <option value="sack">sack</option>
                                <option value="others">others</option>
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Unit Cost</label>
                            <input type="number" step="0.01" min='0' name="cost[]"
                                   data-parsley-group="set1"
                                   class="addItemInput form-control col-6"
                                   data-parsley-required-message="Please insert Unit Cost"
                                   required>
                            <ul class="list-unstyled">
                                <li class="text-danger cost-error-msg"></li>
                                <li class="text-danger cost-err-msg"></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Description</label>
                            <textarea data-parsley-group="set1"
                                      name="description[]" id="message"
                                      class="addItemTextarea form-control col-6"
                                      data-parsley-minlength="1"
                                      data-parsley-maxlength="500"
                                      data-parsley-validation-threshold="10"
                                      data-parsley-required-messag="Put description of the items"
                                      required></textarea>
                        </div>

                        <br/>
                        <h5>Additional Details</h5>
                        <br/>

                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Delivery Date</label>
                            <div class="input-group">
                                <input data-parsley-group="set1" type="date"
                                       name="del[]" class="addItemInput form-control col-6"
                                       data-parsley-required-message="Enter the Delivery Date"
                                       required>
                            </div>
                            <ul class="list-unstyled">
                                <li class="text-danger del-error-msg"></li>
                                <li class="text-danger del1-error-msg"></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Date Received</label>
                            <div class="input-group date">
                                <input class="addItemInput form-control col-6" type="date" name="rec[]"
                                       data-parsley-required-message="Enter the Date received"
                                       data-parsley-group="set1"
                                       required>
                            </div>
                            <ul class="list-unstyled">
                                <li class="text-danger rec-error-msg"></li>
                                <li class="text-danger rec1-error-msg"></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Expiration
                                Date</label>
                            <div class="input-group">
                                <input data-parsley-group="set1" type="date"
                                       name="exp[]" class="addItemInput form-control col-6"
                                       data-parsley-required-message="Enter the Expiration Date"
                                       required>
                            </div>
                            <ul class="list-unstyled">
                                <li class="text-danger exp-error-msg"></li>
                                <li class="text-danger exp1-error-msg"></li>
                                <li class="text-danger exp2-error-msg"></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Supplier</label>
                            <div class="input-group">
                                <select data-parsley-group="set1"
                                        list="typelist" name="supp[]"
                                        class="addItemSelect supplieropt form-control col-6"
                                        required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Official Receipt
                                Number</label>
                            <div class="input-group">
                                <input data-parsley-group="set1"
                                       name="or[]" class="addItemInput form-control col-6"
                                       data-parsley-required-message="Input Official Receipt"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="addItemLabel form-control-label">Purchse Order (PO)
                                number</label>
                            <div class="input-group">
                                <input data-parsley-group="set1"
                                       name="PO[]" class="addItemInput form-control col-6">
                            </div>
                        </div>

                        <button id="buttonCounter1" type="button" onclick="save(1)"
                                class="savebtn btn btn-outline-success"><i class="fa fa-arrow-down"></i>
                            Save
                        </button>
                        <button type="submit" id="saveALL" class="btn btn-success"><i
                                class="fa fa-download"></i> Save All
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
