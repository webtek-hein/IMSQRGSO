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
<?php
$position = $this->session->userdata['logged_in']['position'];
if($position === 'Custodian'){
    include 'air.php';
}
?>

<div id="inventoryPageContent" class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class="inventory-tab col-lg-12">
                <div class="card">
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Custodian') {

                        // <form method="post" id="import_csv">
                        // <div class="form-group">
                        // <label>Select CSV File</label>
                        // <input type="file" name="csv_file" id=""/>
                        // </div>
                        // <button type="submit" name="import_csv" class="btn btn-info btn-sm" id="import_csv_btn" method="post"
                        // required accept=".csv" enctype="multipart/form-data">Import CSV</button>
                        // </form>
                        echo '<div class="card-header">
                                <button id="headingTwo" class="btn btn-success" data-toggle="tooltip" 
                                data-placement="bottom" title="Add New Item"><i class=" fa fa-plus"></i></button>
                                <button id="genReport_Buttons" onclick="toggleDiv($(\'.generateReport\'),$(\'.inventory-tab\'))" 
                                     class="btn btn-info" data-toggle="tooltip"
                                     data-placement="bottom" title="Print Reports"><i class="fa fa-file-archive-o"></i></button> 
                                 <button id="reconcileButton" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Reconcile">
                                 <i class="	fa fa-check-square-o"></i></button>
                                 <!-- <a href="air" class="btn btn-warning" style="border-color:#0c0c0c"
                                    data-toggle="tooltip" data-placement="bottom" title="Generate AIR"><i class="fa fa-edit"></i></a>-->
                                    <a class="btn btn-success" type="button" onclick="getOR()" data-toggle="modal"
                                    data-target=".chooseOR" data-toggle="tooltip" data-placement="bottom" title="Generate AIR"><i class="fa fa-edit"></i></a>
                                </div>';
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
                            <div class="table-responsive-sm  tab-pane fade show active" id="tab_content1"
                                 role="tabpanel"
                                 aria-labelledby="CO-tab">
                                <?php if ($position !== 'Supply Officer') {
                                    echo '<table data-show-refresh = "true" data-pagination="true" data-search= "true" id ="itemtable"
                                       class="table table-bordered table-hover"><thead class="table-secondary"></thead></table>';
                                } else {
                                    echo '<table data-show-refresh = "true" data-pagination="true" data-search= "true" id ="departmentTable"
                                       class="table table-bordered table-hover"><thead class="table-secondary"></thead></table>';
                                }
                                ?>
                            </div>
                            <!--MOOE Tab-->
                            <div class="table-responsive-sm tab-pane fade" id="tab_content2" role="tabpanel"
                                 aria-labelledby="MOOE-tab">
                                <?php if ($position !== 'Supply Officer') {
                                    echo '<table data-show-refresh = "true" data-pagination="true" data-search= "true" id ="MOOEtable"
                                       class="table table-bordered table-hover"><thead class="table-secondary"></thead></table>';
                                } else {
                                    echo '<table data-show-refresh = "true" data-pagination="true" data-search= "true" id ="deptMOOEtable"
                                       class="table table-bordered table-hover"><thead class="table-secondary"></thead></table>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-->
            <div hidden class="detail-tab col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="toggleDiv($('.inventory-tab'),$('.detail-tab '))"
                                class="btn btn-dark fa fa-arrow-left"></i> Back</a></button>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="DetailTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="DetInfo" data-toggle="tab" href="#Detail_Info"
                                   role="tab" aria-controls="info" aria-selected="true">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="DetDetail" data-toggle="tab" href="#Detail_Det"
                                   role="tab" aria-controls="detail" aria-selected="false">Details</a>
                            </li>
                            <?php if ($position !== 'Supply Officer') {
                                echo '<li class="nav-item">
                                <a class="nav-link" id="genLedger" data-toggle="tab" href="#Detail_Ledger"
                                   role="tab" aria-controls="Ledger" aria-selected="true">General Ledger</a></li>
                                <li class="nav-item">
                                <a class="nav-link" id="removedItems" data-toggle="tab" href="#removed_Items"
                                   role="tab" aria-controls="removedItems" aria-selected="false">Removed Items</a>
                            </li>';
                            }
                            ?>


                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade" id="Detail_Info" role="tabpanel"
                                 aria-labelledby="Information-tab">
                                <!-- Information-->
                                <?php if ($position === 'Custodian') {
                                    echo '<div class="col-lg-12">
                                    <form id="editInformation"
                                          class="serialForm form-horizontal form-label-left"
                                          action="inventory/edititem" method="POST">
                                   
                                   <div class="col-6 pull right">
                                   
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
                                                      data-parsley-minlength="1"
                                                      data-parsley-maxlength="500"
                                                      data-parsley-minlength-message="Description must"
                                                      data-parsley-validation-threshold="10"
                                                      data-parsley-required-messag="Put description of the items"
                                                      required></textarea>
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
                                                    <option value="pc/s">pc/s</option>
                                                    <option value="box">box</option>
                                                    <option value="set">set</option>
                                                    <option value="ream">ream</option>
                                                    <option value="dozen">dozen</option>
                                                    <option value="bundle">bundle</option>
                                                    <option value="sack">sack</option>
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
                                        
                                        
                                        <div class ="form-group pull-right">
                                             <button class="btn btn-success col-12" type="submit" name="id" id="edtbutton">
                                                    <i class="fa fa-check"></i> save
                                                </button>
                                        </div>
                                        
                                   </div>
                                        
                                   <div class="col-6 pull-left">
                                        <div class="form-group">
                                            <label class="col-md-12">Total Quantity</label>
                                            <div class="col-md-5">
                                                <p id="total"></p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Initial Quantity</label>
                                            <div class="col-md-5">
                                                <p id="initialStock"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Initial Price</label>
                                            <div class="col-md-5">
                                                <p id="initialCost"></p>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                           ';
                                } else {
                                    echo '<div class="col-lg-12">
                                    <form id="editInformation"
                                          class="serialForm form-horizontal form-label-left"
                                          action="inventory/edititem" method="POST">
                                   
                                   <div class="col-6 pull right">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12">Item Name</label>
                                            <div class="col-md-12">
                                                <input id="itemname"
                                                       type="text" name="item"
                                                       class="form-control"
                                                       data-parsley-group="set1"
                                                       data-parsley-required-message="Please insert Item name"
                                                       readonly
                                                       required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Description</label>
                                            <div class="col-md-12">
                                            <textarea id="itemdesc" data-parsley-group="set1"
                                                      name="description" id="message"
                                                      class="form-control"
                                                      data-parsley-minlength="1"
                                                      data-parsley-maxlength="500"
                                                      data-parsley-minlength-message="Description must"
                                                      data-parsley-validation-threshold="10"
                                                      data-parsley-required-messag="Put description of the items"
                                                      required
                                                      readonly></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Unit</label>
                                            <div class="col-md-12">
                                                <input id="unit" name="Unit" data-parsley-group="set1"
                                                       class="form-control" class="unit"
                                                       list="list"
                                                       data-parsley-required-message="Select the Unit"
                                                       required
                                                       readonly>
                                                <datalist id="list">
                                                    <option value="pc/s">pc/s</option>
                                                    <option value="box">box</option>
                                                    <option value="set">set</option>
                                                    <option value="ream">ream</option>
                                                    <option value="dozen">dozen</option>
                                                    <option value="bundle">bundle</option>
                                                    <option value="sack">sack</option>
                                               </datalist>
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <label class="col-md-12">Type</label>
                                            <div class="col-md-12">
                                                <select id="itemtype" data-parsley-group="set1" id="type"
                                                        list="typelist" name="Type"
                                                        class="form-control" required
                                                        readonly>
                                                    <option value="CO">Capital Outlay</option>
                                                    <option value="MOOE">MOOE</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                   </div>
                                        
                                   <div class="col-6 pull-left">
                                        <div class="form-group">
                                            <label class="col-md-12">Total Quantity</label>
                                            <div class="col-md-5">
                                                <p id="total"></p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Initial Quantity</label>
                                            <div class="col-md-5">
                                                <p id="initialStock"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Initial Price</label>
                                            <div class="col-md-5">
                                                <p id="initialCost"></p>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                           ';
                                }
                                ?>
                            </div>
                            <!--Detail-->
                            <div class="table-responsive tab-pane fade show active" id="Detail_Det" role="tabpanel"
                                 aria-labelledby="Detail-tab">
                                <form id="addQuant">
                                    <!-- Implement Bootsrap table-->
                                    <table id="detail-tab-table" data-search="true"
                                           class="table table-bordered table-hover">
                                        <thead class="table-secondary"></thead>
                                    </table>
                                </form>

                                <?php if ($position === 'Custodian') {
                                    echo '<btn class="btn btn-success" onclick="insertRow()">Add new detail</btn>';
                                }
                                ?>
                                <!-- View Serial-->
                                <div id="serialpage" class="Serial collapse col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4><b>List of Serial</b></h4>
                                        </div>
                                        <div class="card-body card-block">
                                            <form id="viewSerialForm" class="serial-form">
                                                <!-- Dynamic serial tabs here -->
                                                <div class="form-group">

                                                    <!-- qr button -->
                                                    <?php if ($position === 'Custodian') {
                                                        echo '<a class="btn btn-danger btn-sm" onclick="closeSerial()" style="color:white"
                                                                    data-toggle="tooltip" data-placement="bottom" title="Cancel">
                                                                    <i class="fa fa-times"></i></a>
                                                              <a class="btn btn-success btn-sm" onclick="viewQr()" style="color:white"> View QR Code</a>
                                                              <hr/>';
                                                    }
                                                    ?>
                                                    <!-- end of qr button -->
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="check" id="checkAll"> Check
                                                            All

                                                        </label>
                                                    </div>
                                                    <div id="serial-err-msg"></div>

                                                    <ul id="serial-tabs" class="nav nav-tabs">
                                                    </ul>
                                                    <!-- end of serial tabs -->
                                                    <div id="serial-tabcontent" class="tab-content">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end of view serial-->
                            </div>

                            <!--General Ledger-->
                            <div class="tab-pane fade" id="Detail_Ledger" role="tabpanel"
                                 aria-labelledby="Ledger-tab">
                                <br/>
                                <button onclick="printToPDF()" class="btn btn-info fa fa-download">
                                    Download as PDF
                                </button>
                                <!--  <label>From</label> <input type="date" value="<?php echo date("Y-m-d"); ?>">
                                <label>To </label> <input type="date" value="<?php echo date("Y-m-d"); ?>"> -->
                                <table id="ledger" data-show-refresh='true' data-pagination="true" data-search="true"
                                       class="table table-bordered table-hover">
                                    <thead class="table-secondary"></thead>
                                </table>
                            </div>
                            <!--End of General Ledger-->

                            <!--Removed Items-->
                            <div class="tab-pane fade" id="removed_Items" role="tabpanel"
                                 aria-labelledby="removed-tab">
                                <table id="removed-table" data-search="true" data-show-refresh='true'
                                       class="table table-bordered table-hover">
                                    <thead class="table-secondary"></thead>
                                </table>
                            </div>
                            <!--End of Removed Items-->

                        </div>
                    </div>
                </div>
            </div>
            <?php
            if($position === 'Custodian'){
                include 'addItem.php';
            }
            ?>

        </div>
    </div>
</div>
<?php
if($position === 'Custodian'){
    include 'generateReport.php';
    include 'chooseOR.php';
    include 'custDistribution.php';
    include 'generateQR.php';
    include 'reconcilePage.php';
}else if($position === 'Supply Officer'){
    include 'soDistribution.php';
    include 'departmentReturn.php';
}
?>
</div>

