<!-- page content -->
<div id="inventory-main-page" class="main page-content" role="main" xmlns:height="http://www.w3.org/1999/xhtml">

    <div class="inventory-tab">
        <div class="page-title">
            <h1>Inventory</h1>
        </div>
        <div role="tabpanel" data-example-id="togglable-tabs" class="togle">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li id="TB1" role="presentation" class="active">
                    <a href="#tab_content1" id="CO-tab" role="tab" data-toggle="tab" aria-expanded="true">Capital
                        Outlay</a>
                </li>
                <li id="TB2" role="presentation" class="">
                    <a href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="false">MOOE</a>
                </li>
            </ul>
        </div>
        <?php $position = $this->session->userdata['logged_in']['position'];
        if ($position === 'Custodian') {
            echo '<button id="headingTwo" class="btn pull-right" data-toggle="tab" aria-expanded="true"  href="#collapseTwo" aria-controls="collapseTwo">
                                <i class=" fa fa-plus" ></i><span> New</span></button>';
        }
        ?>
        <!-- Main Table Content-->
        <div class="x_content">

            <div id="myTabContent" class="tab-content">

                <!-- Capital Outaly tab-->
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">

                    <div class="accordion" id="accordion" class="table-main table-responsive" role="tablist"
                         aria-multiselectable="true">
                        <!-- Implement Bootsrap table-->
                        <table data-pagination="true" data-search="true" id="itemtable" class="main table-no-bordered"
                               class="table table-no-bordered table-hover">
                        </table>
                    </div>
                </div>

                <!--MOOE Tab-->
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                    <!-- Implement Bootsrap table-->
                    <div class="accordion" id="accordion" class="table-responsive" role="tablist"
                         aria-multiselectable="true">
                        <table data-pagination="true" data-search="true" id="MOOEtable" class="main table-no-bordered"
                               data-pagination="true" class="table table-no-bordered table-hover">
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end of Main Table Content-->


    <!-- Item Detail -->
    <div class="detail-tab hidden">

        <button type="button" onclick="detail_back()" class="btn btn"></i> Back</a></button>

        <div role="tabpanel" data-example-id="togglable-tabs" class="togle">
            <ul id="DetailTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li id="DetInfo" role="presentation" class="active">
                    <a href="#Detail_Info" id="DetInformation" role="tab" data-toggle="tab" aria-expanded="true">Information</a>
                </li>
                <li id="DetDetail" role="presentation" class="">
                    <a href="#Detail_Det" role="tab" id="DetDetail" data-toggle="tab" aria-expanded="false">Detail</a>
                </li>
            </ul>
        </div>

        <div class="x_content">
            <div id="DetailTabContent" class="tab-content">

                <!-- Information -->
                <div role="tabpanel" class="tab-pane fade active in" id="Detail_Info" aria-labelledby="Information-tab">
                    <div class="accordion" id="accordion" class="table-main table-responsive" role="tablist"
                         aria-multiselectable="true">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div id="DetailsHead">
                                <form id="editInformation" class="serialForm form-horizontal form-label-left"
                                      action="inventory/edititem" method="POST">

                                    <div class="form-group">
                                        <label class="col-md-12">Item Name</label>
                                        <div class="col-md-12">
                                            <input id="itemname"
                                                   type="text" name="item"
                                                   class="form-control"
                                                   data-parsley-trigger="blur"
                                                   data-parsley-group="set1"
                                                   data-parsley-length="[1, 20]"
                                                   data-parsley-required-message="Please insert Item name"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Description</label>
                                        <div class="col-md-12">
                                            <textarea id="itemdesc" data-parsley-group="set1"
                                                      name="description" id="message"
                                                      class="form-control"
                                                      data-parsley-trigger="blur"
                                                      data-parsley-minlength="1"
                                                      data-parsley-maxlength="500"
                                                      data-parsley-minlength-message="Description must"
                                                      data-parsley-validation-threshold="10"
                                                      data-parsley-required-messag="Put description of the items"
                                                      required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Total Quantity</label>
                                        <div class="col-md-12">
                                            <p id="total"></p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Unit</label>
                                        <div class="col-md-12">
                                            <input id="unit" name="Unit" data-parsley-group="set1"
                                                   class="form-control" class="unit"
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
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Type</label>
                                        <div class="col-md-12">
                                            <select id="itemtype" data-parsley-group="set1" id="type"
                                                    list="typelist" name="Type"
                                                    class="form-control" required>
                                                <option value="CO">Capital Outlay</option>
                                                <option value="MOOE">MOOE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-default" type="submit" name="id" id="edtbutton"><i class="fa fa-check"></i> save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Detail-->
                <div role="tabpanel" class="tab-pane fade" id="Detail_Det" aria-labelledby="Detail-tab">
                    <!-- Implement Bootsrap table-->
                    <div class="accordion table-responsive" id="accordion" role="tablist" aria-multiselectable="true">
                        <table id="detail-tab-table" class="table table-no-bordered table-hover">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Item Detail -->

    <!-- Add Item-->
    <div class="additemDiv hidden">
    <div class="addItem-tab">
        <div class="page-title">
            <button class="btn btn-danger" id="exit" onclick="addItemBack()">&times; Cancel</button>
            <h1>New Item</h1>
        </div>

        <div role="tabpanel" data-example-id="togglable-tabs" class="togle">
            <ul id="bulk" class="nav nav-tabs" role="tablist">
                <li role="presentation" id="list1" class="active">
                    <a id="1st" href="#step1B" data-toggle="tab" aria-controls="step1" role="tab"><p>Item 1</p></a>
                </li>
                <li id="another">
                    <a href="#" role="tab" id="addanother"><p>Add Another Item</p></a>
                </li>
            </ul>
        </div>
            <div class="x_content">
            <div class="formdiv col-md-12 col-sm-12 col-xs-12">
                <form class="form-horizontal form-label-left input_mask" id="addItemForm" role="form"
                      action="inventory/saveAll" method="POST" data-parsley-validate="">
                    <div id="bulkdiv" class="tab-content">
                        <h3 id="addItemh3">Item Information</h3>
                        <div class="ln_solid"></div>

                        <div class="form-group has-feedback">
                            <label class="col-md-12 col-sm-2 col-xs-2">Type</label>
                            <div class="col-md-5">
                                <select id="itemtype" data-parsley-group="set1" id="type"
                                        list="typelist" name="Type[]"
                                        class="form-control" required>
                                    <option value="CO">Capital Outlay</option>
                                    <option value="MOOE">MOOE</option>
                                </select>
                            </div>
                            <div class="col-md-2 hideInput">
                                <input data-parsley-group="set1"
                                       name="serialStatus[]" id="serialStatus" type="radio" value="1">with Serial<br>
                            </div>
                            <div class="col-md-2 hideInput">
                                <input data-parsley-group="set1" data-required="true"
                                       name="serialStatus[]" id="serialStatus" type="radio" value="0">without Serial<br>
                            </div>
                        </div>

                        <div class="clone-tab tab-pane active" role="tabpanel" id="step1B">
                            <div class="form-group has-feedback">
                                <label class="col-md-12 col-sm-12 col-xs-12">Item Name</label>
                                <div class="col-md-5">
                                    <input type="text" name="item[]"
                                           class="form-control has-feedback-left"
                                           data-parsley-trigger="blur"
                                           data-parsley-group="set1"
                                           data-parsley-length="[1, 20]"
                                           data-parsley-required-message="Please insert Item name"
                                           required>
                                    <span class="fa fa-user form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label class="col-md-12 col-sm-12 col-xs-12">Quantity</label>
                                <div class="col-md-5">
                                    <input type="number" min='1' name="quant[]"
                                           class="form-control has-feedback-left"
                                           data-parsley-group="set1"
                                           data-parsley-required-message="Please enter Quantity"
                                           required>
                                    <span class="fa fa-plus-square-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="col-md-12 col-sm-12 col-xs-12">Unit</label>
                                <div class="col-md-5">
                                    <input name="Unit[]" data-parsley-group="set1"
                                           class="form-control has-feedback-left" class="unit"
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
                                    <span class="fa fa-cubes form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                            </div>

                            <div class="form-group has-feedback">
                                <label class="col-md-12 col-sm-12 col-xs-12">Unit Cost</label>
                                <div class="col-md-5">
                                    <input type="number" min='0' name="cost[]"
                                           data-parsley-group="set1"
                                           class="form-control has-feedback-left"
                                           data-parsley-required-message="Please insert Unit Cost"
                                           required>
                                    <span class="fa fa-circle-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12">Description</label>
                                <div class="col-md-5">
                                                        <textarea data-parsley-group="set1"
                                                                  name="description[]" id="message"
                                                                  class="form-control"
                                                                  data-parsley-trigger="blur"
                                                                  data-parsley-minlength="1"
                                                                  data-parsley-maxlength="500"
                                                                  data-parsley-minlength-message="Description must"
                                                                  data-parsley-validation-threshold="10"
                                                                  data-parsley-required-messag="Put description of the items"
                                                                  required></textarea>
                                </div>
                            </div>
                            <div class="ln_solid col-md-12"></div>
                            <h3>Additional Details</h3>
                            <div class="ln_solid col-md-12"></div>
                            <div class="form-group has-feedback">
                                <label class="col-md-4 col-sm-12 col-xs-12">Delivery Date</label>
                                <label class="col-md-4 col-sm-12 col-xs-12">Date Received</label>
                                <label class="col-md-4 col-sm-12 col-xs-12">Expiration Date</label>

                                <div class="col-md-4">
                                    <input data-parsley-group="set1" type="date"
                                           name="del[]" class="form-control has-feedback-left"
                                           data-parsley-required-message="Select the Delivery Date"
                                           required>
                                    <span class="fa fa-calendar-plus-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                                <div class="col-md-4">
                                    <input data-parsley-group="set1" type="date"
                                           name="rec[]" class="form-control has-feedback-left"
                                           placeholder="Date Received"
                                           data-parsley-required-message="Select Date Received"
                                           required>
                                    <span class="fa fa-calendar-check-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                                <div class="col-md-4">
                                    <input data-parsley-group="set1" type="date"
                                           name="exp[]" class="form-control has-feedback-left"
                                           data-parsley-required-message="Select the Expiration Date"
                                           required>
                                    <span class="fa fa-calendar-times-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label class="col-md-6 col-sm-12 col-xs-12">Supplier</label>
                                <label class="col-md-6 col-sm-12 col-xs-12">Official Receipt Number</label>

                                <div class="col-md-6">
                                    <select data-parsley-group="set1"
                                            list="typelist" name="supp[]"
                                            class="supplieropt form-control has-feedback-left"
                                            required>
                                    </select>
                                    <span class="fa fa-truck form-control-feedback left" aria-hidden="true">
                                                            </span>
                                </div>
                                <div class="col-md-6">
                                    <input data-parsley-group="set1" type="text"
                                           name="or[]" class="form-control has-feedback-left"
                                           data-parsley-required-message="Input Official Receipt"
                                           required>
                                    <span class="fa fa-ticket form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">

                            </div>


                            <div class="ln_solid"></div>
                            <button id="buttonCounter1" type="button" onclick="save(1)"
                                    class="savebtn btn btn-default"><i class="fa fa-arrow-down"></i> Save
                            </button>
                            <button type="submit" id="saveALL" class="btn btn-default"><i
                                        class="fa fa-download"></i> Save All
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
</div>
<!--End of Add Item-->

<!-- View Serial-->
<div class="Serial hidden page-content">
    <div id="data1" class="panel-collapse collapse" role="tabpanel">
        <h4><b>List of Serial</b></h4>
        <form class="serial-form" method="POST" action="inventory/addSerial">
            <!-- Dynamic serial tabs here -->
            <ul id="serial-tabs" class="nav nav-tabs">
            </ul>
            <!-- end of serial tabs -->
            <div id="serial-tabcontent" class="tab-content">
            </div>
        </form>
    </div>
</div>
<!--End of View Serial-->

<!-- Add Item -->
<div class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Quantity</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST"
                      novalidate>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Quantity</label>
                        <input data-parsley-group="set2" data-parsley-trigger="blur" type="number"
                               name="quant" min=0
                               class="form-control has-feedback-left">
                        <span class="fa fa-plus-square-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Unit Cost</label>
                        <input type="number" min='0' name="cost" class="form-control has-feedback-left"
                               id="inputSuccess3">
                        <span class="fa fa-circle-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Delivery Date</label>
                        <input type="date" name="del" class="form-control has-feedback-left">
                        <span class="fa fa-calendar-plus-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Date Received</label>
                        <input type="date" name="rec" data-validate-length-range="5,20"
                               class="optional form-control has-feedback-left">
                        <span class="fa fa-calendar-check-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Expiration Date</label>
                        <input type="date" name="exp" data-validate-length-range="5,20"
                               class="optional form-control has-feedback-left">
                        <span class="fa fa-calendar-times-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-4 form-group has-feedback">
                        <label>Supplier</label>
                        <select list="typelist" name="supp"
                                class="supplieropt form-control has-feedback-left"
                                placeholder="Type">
                        </select>
                        <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Official Receipt Number</label>
                        <input data-parsley-group="set2" data-parsley-trigger="blur" type="number"
                               name="quant" min=0 class="form-control has-feedback-left">
                        <span class="fa fa-ticket form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn-modal btn btn-default" id="savequant" name="id"
                                value="1" id="quantsave">
                            <i class="fa fa-arrow-down"> Save</i>
                        </button>
                        <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">
                            <i class="fa fa-close"> Cancel</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End of Add Item -->

<!--Distribution-->
<div id="DitributeItem" class="modal left fade Distribute" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Distribution</h4>
            </div>
            <form role="form" class="form-horizontal form-label-left" action="inventory/distribute"
                  method="POST" data-validate="parsley">
                <div class="modal-body">

                    <div class="form-group">
                        <div id='serial' class="col-md-10">
                            <label for="name">Serial/s</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id='quant' class="col-md-10">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10">
                            <label for="name">Department</label>
                            <select list="typelist" name="dept" class="deptopt form-control" required>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-10">
                            <label for="name">Account Code</label>
                            <select list="typelist" name="Code" id="accode" class="form-control" required>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10">
                            <label for="date">Date of Distribution</label>
                            <input id="date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                   data-validate-words="2" name="date" required type="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10">
                            <label>PR Number</label>
                            <input id="pr" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                   data-validate-words="2" name="pr" required type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10">
                            <label for="name">OBR Number</label>
                            <input id="obr" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                   data-validate-words="2" name="obr" required type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <div id="container2" class="col-md-10">
                            <label for="name">Receiving Person</label>
                            <input id="owner" class="form-control col-md-7 col-xs-12" name="owner" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-offset-3">
                    <button type="submit" name="id" class="btn-modal btn btn-default" id="save1">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                    <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Edit Quantity-->
<div id="edit_modal" class="modal fade Edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" method="POST" action="inventory/editquantity" novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Quantity<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="quantity" class="form-control col-md-7 col-xs-12"
                                   data-validate-length-range="20" data-validate-words="2" name="quantity" required
                                   placeholder="Qauntity">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Remarks / Reason<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="remarks" id="remarks"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="id" class="btn-modal btn btn-primary" id="save1"><i
                            class="fa fa-arrow-down"></i> Save
                </button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>

        </div>
        </form>
    </div>
</div>
<!--end of edit-->

<!-- Add Quantity -->
<div id="addquant" class="modal fade Add_Quantity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Quantity</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST" novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Quantity<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="quant" min=0 class="form-control col-md-7 col-xs-12" required
                                   placeholder="Quantity">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-modal btn btn-default" name="id" value="1" id="quantsave"><i
                            class="fa fa-arrow-down"></i> Save
                </button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal"><i
                            class="fa fa-close"></i> Cancel
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- end of add quantity -->


<!-- end of distribution-->
</body>


