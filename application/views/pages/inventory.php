<!-- page content -->
<div class="page-content right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="">
        <div class="inventory-tab x_panel">
            <div class="clearfix"></div>
            <!--Accordion-->
            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
                <!--ADD Item-->
                <div class="panel">
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Admin' || $position === 'Custodian') {
                        echo '<a  class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h4><i class="fa fa-plus-circle" ></i> Add Item</h4></a>';
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
                                                <li role="presentation" id="list1" class="active" >
                                                    <a href="#step1B" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                                                <span class="round-tab">
                                                                    <b>Item 1</b>
                                                                </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body" id="ModalI">
                                            <form id="addItemForm" role="form" action="inventory/saveAll" method="POST" data-parsley-validate="">

                                                <div id="bulkdiv" class="tab-content">

                                                    <div class="clone-tab tab-pane active" role="tabpanel" id="step1B">

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Item Name</label>
                                                            <input  type="text" name="item[]" class="form-control" data-parsley-trigger="blur"  data-parsley-group="set1"
                                                            data-parsley-length="[1, 20]" required>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Quantity</label>
                                                            <input type="number" min='1' name="quant[]" class="form-control" data-parsley-group="set1" required>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Unit Cost</label>
                                                            <input type="number" min='0' name="cost[]" data-parsley-group="set1" class="form-control"   data-error-messgae="Please Enter the Unit Cost" required>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Unit</label>
                                                            <input  name="Unit[]" data-parsley-group="set1" class="form-control col-md-7 col-xs-12" class="unit" list="list" required>
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

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Type</label>
                                                            <select data-parsley-group="set1" id="type" list="typelist" name="Type[]" class="form-control" required>
                                                                <option value="CO">Capital Outlay</option>
                                                                <option value="MOOE">MOOE</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Delivery Date</label>
                                                            <input data-parsley-group="set1" type="date" name="del[]" class="form-control" required>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Date Received</label>
                                                            <input data-parsley-group="set1" type="date" name="rec[]" class="form-control"  placeholder="Date Received" required>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Expiration Date</label>
                                                            <input data-parsley-group="set1" type="date" name="exp[]" class="form-control" required>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Supplier</label>
                                                            <select data-parsley-group="set1" list="typelist"  name="supp[]" class="supplieropt form-control" required>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                                            <label>Official Receipt</label>
                                                            <input data-parsley-group="set1" type="text" name="or[]" class="form-control"   data-error-messgae="Please enter the Official Receipt" required>
                                                        </div>

                                                        <div class="col-md-10 col-sm-12 col-xs-12 form-group">
                                                            <label>Description</label>
                                                            <textarea data-parsley-group="set1" name="description[]" id="message"  class="form-control" data-parsley-trigger="blur" data-parsley-minlength="1" data-parsley-maxlength="500" data-parsley-minlength-message="Description must"
                                                                      data-parsley-validation-threshold="10" required></textarea>
                                                        </div>
                                                        <div class="col-md-10 col-sm-12 col-xs-12 form-group">
                                                            <button id="buttonCounter1" type="button" onclick="save(1)" class="savebtn btn btn-success"><i class="fa fa-arrow-down"></i>Save</button>
                                                            <button type="submit" id="saveALL" class="btn btn-success"><i class="fa fa-arrow-down"></i> Save All</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-inline pull-right">
                                                    <button type="button" id="addanother" class="next-step btn btn-default"><i class="fa fa-plus-circle" ></i> Add another item</button>
                                                </div>
                                            </form>

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
                            <li id="TB1" role="presentation" class="active"><a href="#tab_content1" id="CO-tab" role="tab" data-toggle="tab" aria-expanded="true">Capital Outlay</a>
                            </li>
                            <li id="TB2" role="presentation" class=""><a href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="false">MOOE</a>
                            </li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <!-- Capital Outaly tab-->
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">

                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- Implement Bootsrap table-->
                                    <div class="x_panel">
                                        <table data-pagination="true" data-search="true" data-toggle="table" data-url="inventory/viewitem/CO" data-show-toggle="true" class="table table-no-bordered table-hover">
                                            <thead>
                                            <!-- Data-field for getting data  -->
                                            <tr>
                                                <th data-sortable="true" data-field="number">#</th>
                                                <th data-sortable="true" data-field="item">Item Name</th>
                                                <th data-sortable="true" data-field="description">Description</th>
                                                <th data-sortable="true" data-field="quantity">Quantity</th>
                                                <th data-sortable="true" data-field="unit">Unit</th>
                                                <?php $position = $this->session->userdata['logged_in']['position'];
                                                if ($position === 'Admin' || $position === 'Custodian'){
                                                    echo'<th data-field="action">Action</th>';
                                                }
                                                ?>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!--MOOE Tab-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                                <!-- Implement Bootsrap table-->
                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="x_panel">
                                        <table id="datatable"  data-pagination="true" data-search="true" data-toggle="table" data-url="inventory/viewitem/MOOE" data-show-toggle="true" class="table table-no-bordered table-hover">
                                            <thead>
                                            <!-- Data-field for getting data      -->
                                            <tr  data-toggle="collapse" data-target="#accordion" class="clickable">
                                                <th data-sortable="true" data-field="number">#</th>
                                                <th data-sortable="true" data-field="item">Item Name</th>
                                                <th data-sortable="true" data-field="description">Description</th>
                                                <th data-sortable="true" data-field="quantity">Quantity</th>
                                                <th data-sortable="true" data-field="unit">Unit</th>
                                                <?php $position = $this->session->userdata['logged_in']['position'];
                                                if ($position === 'Admin' || $position === 'Custodian'){
                                                    echo'<th data-field="action">Action</th>';
                                                }
                                                ?>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of Main Table Content-->
                </div>


                <!-- Modals -->
                <!-- Add Quantity -->
                <div id="addquant" class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Add Quantity</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST" novalidate>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Quantity</label>
                                        <input type="number" name="quant" min=0  class="form-control col-md-7 col-xs-12" placeholder="Quantity">
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label>Unit Cost</label>
                                        <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3"  placeholder="Unit Cost">
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Delivery Date</label>
                                        <input type="date" name="del"  class="form-control col-md-7 col-xs-12">
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Date Received</label>
                                        <input type="date" name="rec" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" >
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Expiration Date</label>
                                        <input type="date" name="exp" data-validate-length-range="5,20"  class="optional form-control col-md-7 col-xs-12">
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Supplier</label>
                                        <select list="typelist"  name="supp" class="supplieropt form-control"  placeholder="Type">
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn-modal btn btn-primary" name="id" value="1" id="quantsave"><i class="fa fa-arrow-down"></i> Save</button>
                                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- end of add quantity -->
                                <!--Edit-->
                <div id="edit_modal" class="modal fade Edit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Edit</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left" method="POST" action="inventory/edititem" novalidate>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="item" class="form-control col-md-7 col-xs-12" data-validate-length-range="20" data-validate-words="2" name="item" type="text" required placeholder="Item Name">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="description" type="text" name="description" class="form-control col-md-7 col-xs-12" required placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Unit<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="Unit"  type="text" name="Unit" class="form-control col-md-7 col-xs-12" required placeholder="Unit">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Type<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="Type" type="text" name="Type" class="form-control col-md-7 col-xs-12" required placeholder="Type">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="id" class="btn-modal btn btn-primary" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
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
                                <h4 class="modal-title" id="myModalLabel">Add Quantity</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST" novalidate>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Quantity<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" name="quant" min=0 class="form-control col-md-7 col-xs-12" required placeholder="Quantity">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn-modal btn btn-primary" name="id" value="1" id="quantsave"><i class="fa fa-arrow-down"></i> Save</button>
                                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- end of add quantity -->

                <!-- /Modal -->
            </div>
            </div>

        <!-- detail tab -->
        <div class="detail-tab x_panel hidden">
            <div class="clearfix"></div>
            <div class="x_title" id="DetailsHead">
                <h4>Item Name: <small> <b></b></small> </h4>
                <h4>Description: <small> <b></b></small> </h4>
                <p>Total Quantity: </p>
                <p>Unit:</p>

                <div class="clearfix"></div>
            </div>

            <!-- Main Table Content-->
            <div role="tabpanel" class="tab-pane fade active in" id="tab_cont." aria-labelledby="CO-tab">
                <button type="button" onclick="detail_back()" class="btn btn"></i> Back</a></button>

                <table id="detail-tab-table" class="table table-no-bordered table-hover">
                </table>
                <!-- Serial Accordion-->

                <div id="data1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                        <div class="col-md-offset-2">
                            <h4><b>List of Serial</b></h4>

                            <form class="serial-form" method="POST" action="inventory/addSerial">
                                <ul id="serial-tabs" class="nav nav-tabs">
                                </ul>

                                <div id="serial-tabcontent" class="tab-content">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Serial Accordion-->

            </div>
            <!--MOOE Tab-->
            <!-- end of Main Table Content-->
        </div>


        <!-- Modals -->

        <!--Distribution-->

        <div class="modal fade Distribute" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Distribution</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="form-horizontal form-label-left" action="inventory/distribute" method="POST" data-validate="parsley">
                            <div class="tab-content">

                                    <div id="serial">
                                        <label>
                                        </label>
                                        </div>

                                    <div class="col-md-6">
                                        <label for="name">Department</label>
                                        <select list="typelist"   name="dept" id="deptopt" class="form-control" required placeholder="Type">
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
        </div>
        <!-- end of distribution-->

        <!-- /Modal -->
    </div>
        </div>
        <div class="clearfix"></div>
    </div>
