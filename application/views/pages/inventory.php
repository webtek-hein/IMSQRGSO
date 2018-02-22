<!-- page content -->
<div id="inventory-main-page" class="page-content right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="">
        <div class="clearfix"></div>
        <!--inventory-->
        <div class="inventory-tab x_panel">
            <!--Accordion-->
            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
                <!--ADD Item-->
                <div class="panel">
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Admin' || $position === 'Custodian') {
                        echo '<a  class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h4><i class="fa fa-cart-arrow-down" ></i> Add Item</h4></a>';
                    }
                    ?>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="wizard">
                                        <div class="wizard-inner">
                                            <div class="connecting-line"></div>
                                            <ul id="bulk" class="nav nav-tabs" role="tablist">
                                                <li role="presentation" id="list1" class="active">
                                                    <a href="#step1B" data-toggle="tab" aria-controls="step1" role="tab"
                                                       title="Step 1">
                                                                <span class="round-tab">
                                                                    <b>Item 1</b>
                                                                </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body" id="ModalI">
                                            <div class="col-md-9">
                                                <div class="x_panel">
                                                    <form id="addItemForm" role="form" action="inventory/saveAll"
                                                          method="POST" data-parsley-validate="">
                                                        <div id="bulkdiv" class="tab-content">
                                                            <div class="clone-tab tab-pane active" role="tabpanel"
                                                                 id="step1B">

                                                                <div class="left">
                                                                    <div class="form-group">
                                                                        <label>Item Name</label>
                                                                        <input type="text" name="item[]"
                                                                               class="form-control"
                                                                               data-parsley-trigger="blur"
                                                                               data-parsley-group="set1"
                                                                               data-parsley-length="[1, 20]"
                                                                               data-parsley-required-message="Please insert Item name"
                                                                               required>
                                                                    </div>

                                                                    <div class="group">
                                                                        <label>Quantity</label>
                                                                        <input type="number" min='1' name="quant[]"
                                                                               class="form-control"
                                                                               data-parsley-group="set1"
                                                                               data-parsley-required-message="Please enter Quantity"
                                                                               required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Unit Cost</label>
                                                                        <input type="number" min='0' name="cost[]"
                                                                               data-parsley-group="set1"
                                                                               class="form-control"
                                                                               data-parsley-required-message="Please insert Unit Cost"
                                                                               required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Unit</label>
                                                                        <input name="Unit[]" data-parsley-group="set1"
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

                                                                    <div class="form-group">
                                                                        <label>Type</label>
                                                                        <select data-parsley-group="set1" id="type"
                                                                                list="typelist" name="Type[]"
                                                                                class="form-control" required>
                                                                            <option value="CO">Capital Outlay</option>
                                                                            <option value="MOOE">MOOE</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="right">
                                                                    <div class="form-group">
                                                                        <label>Delivery Date</label>
                                                                        <input data-parsley-group="set1" type="date"
                                                                               name="del[]" class="form-control"
                                                                               data-parsley-required-message="Select the Delivery Date"
                                                                               required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Date Received</label>
                                                                        <input data-parsley-group="set1" type="date"
                                                                               name="rec[]" class="form-control"
                                                                               placeholder="Date Received"
                                                                               data-parsley-required-message="Select Date Received"
                                                                               required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Expiration Date</label>
                                                                        <input data-parsley-group="set1" type="date"
                                                                               name="exp[]" class="form-control"
                                                                               data-parsley-required-message="Select the Expiration Date"
                                                                               required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Supplier</label>
                                                                        <select data-parsley-group="set1"
                                                                                list="typelist" name="supp[]"
                                                                                class="supplieropt form-control"
                                                                                required>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Official Receipt Number</label>
                                                                        <input data-parsley-group="set1" type="text"
                                                                               name="or[]" class="form-control"
                                                                               data-parsley-required-message="Input Official Receipt"
                                                                               required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-10">
                                                                    <label>Description</label>
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

                                                                <div class="ln_solid"></div>

                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                        <button id="buttonCounter1" type="button" onclick="save(1)"
                                                                                class="savebtn btn btn-default"><i
                                                                                    class="fa fa-arrow-down"></i> Save
                                                                        </button>
                                                                        <button type="submit" id="saveALL" class="btn btn-default"><i
                                                                                    class="fa fa-download"></i> Save All
                                                                        </button>
                                                                        <button  type="button" id="addanother"
                                                                                 class="next-step btn btn-default"><i
                                                                                    class="fa fa fa-cart-plus"></i> Add another item
                                                                        </button>
                                                                    </div>
                                                                </div>

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
                    </div>
                </div>
                <!-- /ADD item-->
            </div>
            <!-- Main Table Content-->
            <div class="x_content">
                <div role="tabpanel" data-example-id="togglable-tabs" class="togle">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li id="TB1" role="presentation" class="active"><a href="#tab_content1" id="CO-tab" role="tab"
                                                                           data-toggle="tab" aria-expanded="true">Capital
                                Outlay</a>
                        </li>
                        <li id="TB2" role="presentation" class=""><a href="#tab_content2" role="tab" id="MOOE-tab"
                                                                     data-toggle="tab" aria-expanded="false">MOOE</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <!-- Capital Outaly tab-->
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">

                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <!-- Implement Bootsrap table-->
                                <div class="x_panel">
                                    <table id="itemtable" data-pagination="true" data-search="true"
                                           data-show-toggle="true" class="table table-no-bordered table-hover">
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--MOOE Tab-->
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                            <!-- Implement Bootsrap table-->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="x_panel">
                                    <table id="datatable" data-pagination="true" data-search="true" data-toggle="table"
                                           data-url="inventory/viewitem/MOOE" data-show-toggle="true"
                                           class="table table-no-bordered table-hover">
                                        <thead>
                                        <!-- Data-field for getting data      -->
                                        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true" data-field="number">#</th>
                                            <th data-sortable="true" data-field="item">Item Name</th>
                                            <th data-sortable="true" data-field="description">Description</th>
                                            <th data-sortable="true" data-field="quantity">Quantity</th>
                                            <th data-sortable="true" data-field="unit">Unit</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of Main Table Content-->
        </div>
        <!-- detail tab -->

        <!-- Add Item-->
        <div class="detail-tab x_panel hidden">
            <button type="button" onclick="detail_back()" class="btn btn"></i> Back</a></button>
            <div class="x_title" id="DetailsHead"><a id="changetoEdit" href="#"><i class="glyphicon glyphicon-edit"></i></a>
                <form action="inventory/edititem" method="POST">
                    <h4>Item Name: <b id="itemname"></b></h4>
                    <p>Description: <b id="itemdesc"></b></p>
                    <p>Total Quantity: <b id="total"></b></p>
                    <p>Unit: <b id="unit"></b></p>
                    <p>Type: <b id="itemtype"></b></p>
                    <button type="submit" name="id" id="edtbutton" hidden>save</button>
                </form>
            </div>
            <div class="clearfix"></div>
            <!-- Main Table Content-->
            <div role="tabpanel" class="tab-pane fade active in" id="tab_cont." aria-labelledby="CO-tab">
                <a id="detailAddquantity" href="#" data-toggle="modal" data-target="#addquant"
                   class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>

                <!-- Add Quantity -->
                <div id="addquant" class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
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

                                </form>
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

                        </div>

                    </div>
                </div>

                <table id="detail-tab-table" class="table table-no-bordered table-hover">
                </table>

                <!-- Serial Accordion-->
                <div id="data1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="col-md-offset-2">
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
                </div>
                <!-- /Serial Accordion-->
            </div>
            <!-- end of Main Table Content-->

            <!--Distribution-->
            <div class="modal fade Distribute" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Distribution</h4>
                        </div>
                        <form role="form" class="form-horizontal form-label-left" action="inventory/distribute" method="POST" data-validate="parsley">
                        <div class="modal-body">
                                <div class="tab-content">
                                    <div id="serial">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="name">Department</label>
                                    <select list="typelist" name="dept" class="deptopt form-control" required placeholder="Type">
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="name">Account Code</label>
                                    <select list="typelist"  name="Code" id="accode" class="form-control" required placeholder="Account Code">
                                    </select>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="po">PO Number</label>
                                    <input id="po" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="po" required type="text" placeholder="PO Number">
                                </div>

                                <div class="col-md-6 ">
                                    <label class="col-md-8">PR Number</label>
                                    <input id="pr" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pr" required type="text" placeholder="PR Number">
                                </div>

                                <div class="col-md-6">
                                    <label for="name">OBR Number</label>
                                    <input id="obr" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="obr" required type="text" placeholder="OBR Number">
                                </div>

                                <div class="item form-group">
                                    <div id="container2" class="col-md-6">
                                        <label for="name">Receiving Person</label>
                                        <input id="owner" class="form-control col-md-7 col-xs-12" name="owner"  type="text" placeholder="Supply Officer">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="id" class="btn-modal btn btn-success" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
                            <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
                        </div>
                        </form>

                    </div>

                </div>
            </div>

          <!-- end of distribution-->




