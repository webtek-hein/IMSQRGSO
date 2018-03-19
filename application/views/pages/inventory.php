<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Inventory</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="dashboard">Dashboard</a></li>
                    <li class="active">Inventory</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class="col-lg-12 inventory-tab">
                <div class="card">

                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Custodian') {


                        echo '<form method="post" id="import_csv" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Select CSV File</label>
                            <input type="file" name="csv_file" id="csv_file" required accept=".csv"/>
                        </div>
                        <br/>
                        <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV
                        </button>
                    </form>
                                <div class="card-header">
                            <button id="headingTwo" class="btn btn-outline-success">
                                <i class=" fa fa-plus" ></i><span> New</span></button>
                             <button id="genReport_Buttons" class="btn btn-outline-primary" data-toggle="tab"
                                aria-expanded="true"
                                href="#" data-target=".generateReport">
                            <i class="fa fa-file-archive-o"></i><span> Reports</span></button> </div>';

                    }
                    ?>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="CO-tab" data-toggle="tab" href="#tab_content1"
                                   role="tab"
                                   aria-controls="co" aria-selected="true">Capital
                                    Outlay</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="MOOE-tab" data-toggle="tab" href="#tab_content2"
                                   role="tab"
                                   aria-controls="mooe" aria-selected="false">MOOE</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <!-- Capital Outaly tab-->
                            <div class="tab-pane fade show active" id="tab_content1" role="tabpanel"
                                 aria-labelledby="CO-tab">
                                <table data-pagination="true" data-search="true" id="itemtable"
                                       class="main table-no-bordered"
                                       class="table table-no-bordered table-hover">
                                </table>
                            </div>
                            <!--MOOE Tab-->
                            <div class="tab-pane fade" id="tab_content2" role="tabpanel" aria-labelledby="MOOE-tab">
                                <!-- Implement Bootsrap table-->
                                <table data-pagination="true" data-search="true" id="MOOEtable"
                                       class="main table-no-bordered"
                                       data-pagination="true"
                                       class="table table-no-bordered table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form id="addQuant">
                <!-- Detail-->
                <div hidden class="detail-tab col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" onclick="detail_back()" class="btn btn-primary"></i> Back</a></button>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="DetailTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="DetInfo" data-toggle="tab" href="#Detail_Info"
                                   role="tab" aria-controls="info" aria-selected="true">Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="DetDetail" data-toggle="tab" href="#Detail_Det" role="tab" aria-controls="detail" aria-selected="false">Details</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <!-- Information-->
                                <div class="tab-pane fade" id="Detail_Info" role="tabpanel"
                                     aria-labelledby="Information-tab">
                                    <div class="col-lg-4">
                                        <form id="editInformation"
                                              class="serialForm form-horizontal form-label-left"
                                              action="inventory/edititem" method="POST">

                                            <div class="form-group">
                                                <label class="col-md-12">Item Name</label>
                                                <div class="col-md-12">
                                                    <input id="itemname"
                                                           type="text" name="item"
                                                           class="form-control"
                                                           data-parsley-group="set1"
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
                                            <?php if ($position === 'Custodian') {
                                                echo '<button class="btn btn-outline-info" type="submit" name="id" id="edtbutton">
                                                    <i class="fa fa-check"></i> save
                                                </button>';
                                            }
                                            ?>
                                        </form>

                                    </div>
                                    <!--General Ledger-->
                                    <div class="col-lg-8">
                                            <h5>General Ledger</h5>
                                            <table id="ledger" data-pagination="true" data-search="true"
                                                   data-toggle="table" data-url="Inventory/getLedger/1"
                                                   class="table table-no-bordered">
                                                <thead>
                                                <!-- Data-field for getting data  -->
                                                <tr>
                                                    <th data-field="date">Date</th>
                                                    <th data-field="increased">Increased</th>
                                                    <th data-field="decreased">Decreased</th>
                                                    <th data-field="price">Price</th>
                                                    <th data-field="quantity">Quantity</th>
                                                    <th data-field="balance">Balance</th>
                                                </tr>
                                                </thead>
                                            </table>
                                    </div>

                                    <!--End of General Ledger-->

                                </div>
                                <!--Detail-->
                                <div class="tab-pane fade show active" id="Detail_Det" role="tabpanel"
                                     aria-labelledby="Detail-tab">
                                    <!-- Implement Bootsrap table-->
                                    <table id="detail-tab-table" data-search="true"
                                           class="table table-no-bordered table-hover">
                                    </table>
                                    <?php if ($position === 'Custodian'){
                                    echo '<a href="#" onclick="insertRow()">Add new detail</a>';
                                    }
                                    ?>
                                    <!-- View Serial-->
                                    <div id="serialpage" class="Serial collapse col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><b>List of Serial</b></h4>
                                            </div>
                                            <div class="card-body card-block">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Add Item-->
            <div hidden class="additemDiv col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-outline-primary" id="exit" onclick="addItemBack()">&times; Cancel
                        </button>
                    </div>
                    <div class="card-body card-block col-lg-10 align-self-center">
                        <div role="tabpanel" data-example-id="togglable-tabs" class="togle">
                            <ul id="bulk" class="nav nav-tabs" id="DetailTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="DetInfo" data-toggle="tab" href="#step1B"
                                       role="tab"
                                       aria-controls="step1" aria-selected="true">Item 1</a>
                                </li>
                                <li id="another">
                                    <button id="addanother" class="btn btn-primary"
                                            role="tab"><i class="ti-plus"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <form class="form-horizontal form-label-left input_mask" id="addItemForm" role="form"
                              action="inventory/saveAll" method="POST" data-parsley-validate="">
                            <div id="bulkdiv" class="tab-content">
                                <hr/>
                                <h3 id="addItemh3">Item Information</h3>
                                <hr/>
                                <div class="clone-tab tab-pane active" role="tabpanel" id="step1B">
                                    <div class="form-group">
                                        <label for="item" class=" form-control-label">Item Name</label>
                                        <input type="text" name="item[]"
                                               class="form-control has-feedback-left"
                                               data-parsley-group="set1"
                                               data-parsley-length="[1, 20]"
                                               data-parsley-required-message="Please insert Item name"
                                               placeholder="Enter the name of the item"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="itemtype" class=" form-control-label">Item type
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <select data-parsley-group="set1" id="type"
                                                        list="typelist" name="Type[]"
                                                        class="itemtype form-control" required>
                                                    <option value="CO">Capital Outlay</option>
                                                    <option value="MOOE">MOOE</option>
                                                </select>
                                            </div>
                                            <div class="col-2 has-feedback">
                                                <input type="checkbox" name="serialStatus[]" value="1"> With serial
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="item" class=" form-control-label">Quantity</label>
                                        <input type="number" name="quant[]"
                                               class="form-control has-feedback-left"
                                               data-parsley-trigger="blur"
                                               data-parsley-group="set1"
                                               data-parsley-length="[1, 20]"
                                               data-parsley-required-message="Please insert Item name"
                                               placeholder="Enter the quantity"
                                               required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Unit</label>
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
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Unit Cost</label>
                                        <input type="number" min='0' name="cost[]"
                                               data-parsley-group="set1"
                                               class="form-control has-feedback-left"
                                               data-parsley-required-message="Please insert Unit Cost"
                                               required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Description</label>
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
                                    <hr>
                                    <h3>Additional Details</h3>
                                    <hr>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Delivery Date</label>
                                        <input data-parsley-group="set1" type="date"
                                               name="del[]" class="form-control has-feedback-left"
                                               data-parsley-required-message="Enter the Delivery Date"
                                               required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Date Received</label>
                                        <input data-parsley-group="set1" type="date"
                                               name="rec[]" class="form-control has-feedback-left"
                                               data-parsley-required-message="Enter the Date received"
                                               required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Expiration Date</label>
                                        <input data-parsley-group="set1" type="date"
                                               name="exp[]" class="form-control has-feedback-left"
                                               data-parsley-required-message="Enter the Expiration Date"
                                               required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Supplier</label>
                                        <select data-parsley-group="set1"
                                                list="typelist" name="supp[]"
                                                class="supplieropt form-control has-feedback-left"
                                                required>
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Official Receipt Number</label>
                                        <input data-parsley-group="set1" type="text"
                                               name="or[]" class="form-control has-feedback-left"
                                               data-parsley-required-message="Input Official Receipt"
                                               required>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="unit" class=" form-control-label">Purchse Order (PO)
                                            number</label>
                                        <input data-parsley-group="set1" type="text"
                                               name="PO[]" class="form-control has-feedback-left"
                                               data-parsley-required-message="Input Purchase Order Number"
                                               required>
                                    </div>

                                    <hr>
                                    <button id="buttonCounter1" type="button" onclick="save(1)"
                                            class="savebtn btn btn-primary"><i class="fa fa-arrow-down"></i>
                                        Save
                                    </button>
                                    <button type="submit" id="saveALL" class="btn btn-success"><i
                                                class="fa fa-download"></i> Save All
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Genearate Report-->
            <div hidden class="generateReport col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button onclick="report_back()" class="btn btn-primary">Back</button>
                    </div>
                    <div class="card-body">
                        <div class="options">
                            <div class="checkbox opt1">
                                <label>OPTION: </label>
                                <label><input type="checkbox" value=""> CO</label>

                                <label><input type="checkbox" value=""> MOOE</label>

                                <label><input type="checkbox" value=""> ALL</label>
                            </div>

                            <ul class="list-inline opt2">
                                <li><p>Date of Delivery:
                                        <select id="deliveryDate" type="button" class="btn btn-default"></select>
                                    </p>
                                </li>
                                <li><p>Purchase Order:
                                        <select id="PO" type="button" class="btn btn-default"></select>
                                    </p>
                                </li>
                                <li><p>Item Name:
                                        <select id="Item Name" type="button" class="btn btn-default"></select>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <table data-search="true" data-pagination="true" data-toggle="table"
                                   class="table table-bordered">
                                <thead>
                                <tr>
                                    <th data-sortable="true" data-field="supplier">Item Name</th>
                                    <th data-sortable="true" data-field="address">Description</th>
                                    <th data-sortable="true" data-field="contact">Quantity</th>
                                    <th data-sortable="true" data-field="contact">Unit</th>
                                    <th data-sortable="true" data-field="contact">Cost</th>
                                    <th data-sortable="true" data-field="contact">Supplier</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Distribution Modal -->
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute" method="POST"
      data-validate="parsley">
    <div class="Distribute modal fade" id="DitributeItem" tabindex="-1" role="dialog"
         aria-labelledby="distrib-modal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Distribution</h5>
                </div>
                <div class="modal-body">

                    <div class="modal-body">

                        <div class="form-group">
                            <div class="serial col-md-10">
                                <label for="name"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="quant col-md-10">
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
                                <input id="date" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="date" required type="date">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">OBR Number</label>
                                <input id="obr" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="obr" required type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <div id="container2" class="col-md-10">
                                <label for="name">Receiving Person</label>
                                <input id="owner" class="form-control col-md-7 col-xs-12" name="owner"
                                       type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" id="save1" class="btn btn-primary btn-modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--Edit Quantity-->
<form class="form-horizontal form-label-left" method="POST" action="inventory/editquantity">
    <div class="Edit modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="distrib-modal"
         aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Adjustment</h5>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="quantity">Quantity<span
                                    class="required">*</span>
                        </label>
                        <input type="number" id="quantity" class="form-control"
                               data-validate-length-range="20" data-validate-words="2" name="quantity"
                               required
                               placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label for="name">Remarks / Reason<span
                                    class="required">*</span>
                        </label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" class="btn-modal btn btn-primary" id="save1"><i
                                class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--Distribution for Supply Officer-->
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute"
      method="POST" data-validate="parsley">
    <div class="DistributeSP modal fade" id="DitributeItemSP" tabindex="-1" role="dialog"
         aria-labelledby="largeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Distribution</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="serial col-md-10">
                            <label for="name"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="quant col-md-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            <label for="date">Date of Distribution</label>
                            <input id="date" class="form-control col-md-7 col-xs-12"
                                   data-validate-length-range="6"
                                   data-validate-words="2" name="date" required type="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="container2" class="col-md-10">
                            <label for="name">End User</label>
                            <input id="owner" class="form-control col-md-7 col-xs-12" name="owner"
                                   type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" class="btn btn-primary btn-modal" id="save1">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
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
<!-- Add Quantity -->
<form class="form-horizontal form-label-left" action="inventory/addquant" method="POST"
      novalidate>
<div id="addquant" class="modal fade Add_Quantity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Quantity</h4>
            </div>
            <div class="modal-body">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Quantity<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="quant" min=0 class="form-control col-md-7 col-xs-12"
                                   required
                                   placeholder="Quantity">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-modal btn btn-default" name="id" value="1" id="quantsave">
                    <i
                            class="fa fa-arrow-down"></i> Save
                </button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal"><i
                            class="fa fa-close"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- end of add quantity -->

<!-- accept -->
<form class="form-horizontal form-label-left" method="POST" action="inventory/acceptitem">
    <div class="Accept modal fade" id="accept_modal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <h5 class="modal-title" id="myModalLabel">Are you sure you want to Accept?</h5>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Remarks</label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" name="id" class="btn-modal btn btn-primary" id="save1"><i
                                class="fa fa-arrow-down"></i> Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end of accept -->

<!--Return-->
<form role="form" class="form-horizontal form-label-left" action="inventory/deptreturn"
      method="POST" data-validate="parsley">
    <div class="Return modal fade" id="return" tabindex="-1" role="dialog"
         aria-labelledby="largeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Return</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="serial col-md-10">
                        </div>
                    </div>
                    <div class=" quant form-group">
                    </div>

                    <div class="form-group ">
                        <label>Date Returned</label>
                        <input type="date" name="returndate" data-validate-length-range="5,20"
                               class="optional form-control has-feedback-left">
                    </div>

                    <div class="form-group">
                        <label>Receiver</label>
                        <input class="form-control" data-parsley-group="set2" data-parsley-trigger="blur" type="text"
                               name="receiver">
                    </div>
                    <div class="form-group">
                        <label for="name">Remarks<span
                                    class="required">*</span>
                        </label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" class="btn btn-primary btn-modal" id="save1">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--end of Return-->
</div>

