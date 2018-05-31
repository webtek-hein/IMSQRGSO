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

<div hidden id="AIRcont">
    <div class="card">
        <div class="card-body">
            <div id="air" class="right-invoice">
                <section id="memo">
                    <section id="client-info">
                        <img src="./assets/images/logo.png" style="width:50px; height:50px;"></img>
                        <h6><b>City Government of Baguio</b></h6>
                        <br>
                        <h6 style="margin-top:-10px;"><b>ACCEPTANCE AND INSPECTION REPORT</b></h6>
                    </section>
                </section>
                <div class="clearfix"></div>
                <div class="tg-wrap">
                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <thead>
                        <tr>
                            <th>
                                <h7 style="position:left; float:left;">Supplier: <input id="supplier" type="text">
                                </h7>
                                <h7 style="position:right; float:right;">Invoice No.: <input id="OR_no" type="text">
                                </h7>
                                <br></br>
                                <h7 style="position:left; float:left; margin-top:-10px;">PO No.: <input id="PO_num"
                                                                                                        type="text"> </input>
                                </h7>
                                <h7 style="position:right; float:right; margin-right:20px; margin-top:-13px;">
                                    AIR No.: <input type="text"></input></h7>
                                <br></br>
                                <h7 style="position:left; float:left; margin-top:-20px;">Requisitioning
                                    Office/Department: <input type="text"></input></h7>
                                <h7 style="position:right; float:right; margin-right:40px; margin-top:-20px;">
                                    Date: <input type="text"></input></h7>
                            </th>
                        </tr>
                        </thead>
                    </table>

                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <thead class="table-secondary">
                        <tr>
                            <th class="thead1"><b>ITEM</b></th>
                            <th class="thead1"><b>QUANTITY</b></th>
                            <th class="thead1"><b>UNIT</b></th>
                            <th class="thead2"><b>DESCIPTION</b></th>
                            <th class="thead1"><b>AMOUNT</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                            <td class="tbody"></td>
                        </tr>
                        </tbody>
                    </table>

                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <tfoot>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tfoot>
                    </table>
                    <table id="tg-umsCj" class="tg" style="undefined;table-layout: fixed; width: 750px">
                        <tfoot>
                        <tr>
                            <td class="tfoot5" align="center">ACCEPTION</td>
                            <td class="tfoot6" align="center">INSPECTION</td>
                        </tr>
                        <tr>
                            <td class="tfoot7" valign="top">Date Received:
                                <input id="date_received" type="text">
                                <br></br>
                                <center> Complete
                                <input type="radio" size="15px" class="input1" id="complete" checked name="rad">
                                <br>
                               <center>Partial
                                    <input type="radio" size="15px" class="input1" id="partial" name="rad">
                                <br></br>

                                        <center> <p style="margin-top:-10px;color: black;"><b> <input type="text" size="15px"
                                                                                     class="input1"></b></p>
                                <hr width="200px">
                                <span> <input type="text" size="15px" class="input1"> Officer</span>
                            </td>
                            <td class="tfoot8" valign="top">Date Inspected: <input type="text" size="15px"
                                                                                   class="input1"></input>
                                <br></br>
                                <p style="margin-left:75px; margin-top:-10px; font-size: small;">Inspected,
                                    verified and found acceptable</p>
                                <p style="margin-left:75px; margin-top:-20px; font-size: small;"> as to
                                    quantity and specifications</p></input>
                                <br></br>
                                <center><p style="margin-top:-10px; color: black;"><b> <input type="text" size="15px"
                                                                                              class="input1"></b>
                                    </p>
                                    <hr></hr>
                                    <span>GSO Inspector</span>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <br></br>
                <hr width="300px"></hr>
                <center><b>END-USER</b></center>


                <div class="clearfix"></div>


                <STYLE TYPE="text/css">
                    html {
                        line-height: 1;
                    }

                    table {
                        border-collapse: collapse;
                        border-spacing: 0;
                    }

                    html, body {
                        /* MOVE ALONG, NOTHING TO CHANGE HERE! */
                    }

                    /**
                     * IMPORTANT NOTICE: DON'T USE '!important' otherwise this may lead to broken print layout.
                     * Some browsers may require '!important' in oder to work properly but be careful with it.
                     */
                    .clearfix {
                        display: block;
                        clear: both;
                    }

                    .x-hidden {
                        display: none !important;
                    }

                    .hidden {
                        display: none;
                    }

                    b, strong, .bold {
                        font-weight: bold;
                    }

                    #container {
                        font: normal 13px/1.4em 'Open Sans', Sans-serif;
                        margin: 0 auto;
                        min-height: 1158px;
                        position: relative;
                        width: 850px;
                        width: 850px;
                    }

                    .right-invoice {
                        padding: 50px 50px 50px 50px;
                        min-height: 1078px;
                    }

                    #memo:after {
                        content: '';
                        display: block;
                        clear: both;
                    }

                    #client-info {
                        float: center;
                        text-align: right;
                        min-width: 220px;
                        text-align: center;
                    }

                    #client-info span {
                        display: block;
                        min-width: 20px;
                        text-align: center;
                    }

                    #client-info > span {
                        color: #858585;
                        font-size: 15px;
                        margin-bottom: 20px;
                    }

                    input[type="text"] {
                        border: none;
                        background-color: ghostwhite;
                    }

                    table {
                        table-layout: fixed;
                    }

                    /**table**/
                    .tg-wrap {
                        border-style: solid;
                        border-width: 1px;
                    }

                    .tg {
                        border-collapse: collapse;
                        border-spacing: 0;
                        margin: 0px auto;

                    }

                    .tg tr td {
                        border-style: solid;
                        border-width: 1px;
                    }

                    .tg td {
                        font-family: Arial, sans-serif;
                        font-size: 12px;
                        padding: 5px 5px;
                        border-style: solid;
                        border-width: 1px;
                        overflow: hidden;
                        word-break: normal;
                    }

                    .tg th {
                        font-family: Arial, sans-serif;
                        font-size: 13px;
                        font-weight: normal;
                        padding: 5px 5px;
                        border-style: solid;
                        border-width: 1px;
                        overflow: hidden;
                        word-break: normal;
                    }

                    .tg .tg-yw41 {
                        vertical-align: top;
                        width: 220px;
                    }

                    .tg .tg-yw42 {
                        vertical-align: top;
                        width: 180px;
                    }

                    .tg .tg-yw43 {
                        vertical-align: top;
                        width: 140px;
                    }

                    .tg .tg-yw44 {
                        vertical-align: top;
                        width: 100px;
                    }

                    .tg .tg-yw51 {
                        vertical-align: top;
                        width: 350px;
                        height: 15px;
                        text-align: center;
                    }

                    .tg .tg-yw52 {
                        vertical-align: top;
                        width: 120px;
                        height: 15px;
                        text-align: center;
                    }

                    .tg .thead1 {
                        width: 30px;
                        text-align: center;
                    }

                    .tg .thead2 {
                        width: 147px;
                        text-align: center;
                    }

                    .tg .thead3 {
                        width: 50px;
                        text-align: center;
                    }

                    .tg .tbody {
                        height: 450px;
                    }

                    .tg .tfoot1 {
                        width: 57px;
                    }

                    .tg .tfoot2 {
                        width: 240px;
                    }

                    .tg .tfoot3 {
                        height: 100px;
                    }

                    .tg .tfoot4 {
                        height: 100px;
                    }

                    .tg .tfoot5 {
                        width: 300px;
                    }

                    .tg .tfoot7 {
                        height: 170px;
                    }

                    .tg .sign1 {
                        height: 40px;
                        width: 143px;
                        vertical-align: bottom;
                    }

                    .tg .sign {
                        height: 55px;
                        text-align: center;
                        vertical-align: top;
                    }

                    .tg .sign hr {
                        color: black;
                        border-style: solid;
                        border-width: 1px;
                    }

                    .tg .name {
                        text-align: center;
                    }

                    #printpagebutton {
                        margin-top: 20px;
                    }

                    @media print {
                        /* Here goes your print styles */
                        table {
                            page-break-after: auto;
                        }

                        tr {
                            page-break-inside: avoid;
                            page-break-after: auto;
                        }

                        td {
                            page-break-inside: avoid;
                            page-break-after: auto;
                        }

                        thead {
                            display: table-header-group;
                        }

                        tfoot {
                            display: table-footer-group;
                        }
                    }

                    }
                    @page {
                        size: 21cm 29.7cm;   /*A4*/
                        margin: 0; /*webkit says no*/
                    }

                </STYLE>
            </div>
        </div>
        <button onclick="printAIR()" class="btn btn-primary">PRINT</button>
    </div>
</div>
<div class="content mt-3">
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
                                                      data-parsley-trigger="blur"
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
            <!-- Add Item-->
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
                                        <input class="addItemInput" type="checkbox" tabindex="-1" name="serialStatus[]"
                                               value="1"> With serial
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
                                        <input type="number" min='0' name="cost[]"
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
                                                  data-parsley-trigger="blur"
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
        </div>
    </div>
</div>
<!--Genearate Report-->
<div hidden class="generateReport col-lg-12">
    <div class="card">
        <div class="card-header">
            <button onclick="toggleDiv($('.inventory-tab'),$('.generateReport'))"
                    class="btn btn-dark fa fa-arrow-left">
                Back
            </button>

        </div>
        <div class="card-body">
            <button onclick="printToPDFreport()" class="btn btn-info fa fa-download"> Download as PDF</button>
            <hr>
            <div class="row">
                <div class="col-md-12 form-horizontal">
                    <label>Select the type of Item:</label>
                    <input value="ALL" type="radio" name="type" checked> All
                    <input value="CO" type="radio" name="type"> Capital Outlay
                    <input value="MOOE" type="radio" name="type"> MOOE
                </div>
                <div class="col-md-4 form-horizontal">
                    <div class="select form-group">
                        <label>Reports on:</label>
                        <select class="form-control" id="reportsOption">
                            <option value="0">Delivered Item</option>
                            <option value="1">Distributed Items</option>
                            <option value="2">Returned Items</option>
                            <option value="3">Supplier</option>
                        </select>
                    </div>
                </div>
                <form id="reportDate" class="col-md-8 form-inline">
                    <div class="form-group">
                        <label for="from"> From: </label>
                        <input required type="date" class="form-control" id="from">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="to"> To: </label>
                        <input required type="date" class="form-control" id="to">
                        </input>
                    </div>
                    <button type="button" id="repdateBTN" onclick="getreportDate()" class="btn btn-success">Go</button>
                </form>
            </div>
            <div class="row">
                <div id="returnedReport" class="col-md-12 table-responsive">
                    <table id="reportTable" data-pagination="true"
                           class="table table-bordered table-hover">
                    </table>
                </div>
                <div id="returnedReport" class="col-md-12 table-responsive">
                    <table id="hiddenReptTable" data-pagination="true"
                           class="table table-bordered table-hover" hidden>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Genearate Report-->

<!--Choose OR-->
<form role="form" class="form-horizontal form-label-left col-12" method="POST" data-validate="parsley">
    <div class="chooseOR modal fade" id="pickOR" tabindex="-1" role="dialog" aria-labelledby="chooseOR-modal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Please choose OR number</h5>
                </div>
                <div class="modal-body">
                    <label>Please select Official Receipt Number: </label>
                    <select class="form-control" id="or_no">
                        <option>-No Official Receipt Numbers -</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <a onclick="createReport()" data-dismiss="modal" class="btn btn-success btn-modal">Create Form</a>
                </div>

            </div>
        </div>
    </div>
</form>
<!--End choose OR-->

<!-- Distribution Modal -->
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute" method="POST"
      data-validate="parsley" id="form">
    <div class="Distribute dist modal fade" id="DitributeItem" tabindex="-1" role="dialog"
         aria-labelledby="distrib-modal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Distribution</h5>
                    <i class="fa fa-times" data-dismiss="modal" style="color:red"></i>
                </div>
                <div class="modal-body">

                    <div class="col-4">
                        <div class="form-group">
                            <p>Quantity Left: <span id="quantLeft"></span></p>
                            <br>
                            <div class="form-group options">
                                <div class="serial">
                                    <label for="name"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="quant">
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
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
                            <ul class="list-unstyled">
                                <li class="text-danger distrib-err-msg"></li>
                            </ul>
                            <div class="col-md-10">
                                <div class="text-danger dist-error-msg"></div>
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
                                       data-validate-words="2" name="obr" required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-10">
                                <label for="name">Supply Officer</label>
                                <select list="typelist" name="owner" class="ownerOpt form-control" required>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="id" id="save1" class="btn btn-success btn-modal"
                            onclick="return valreturn();">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--Distribution for Supply Officer-->
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute"
      method="POST" data-validate="parsley">
    <div class="DistributeSP distsp modal fade" id="DitributeItemSP" tabindex="-1" role="dialog"
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
                        <div class="serialsp col-md-10">
                            <label for="name"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="quantsp col-md-10">
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
                               name="quant[]" min=0
                               class="form-control has-feedback-left">
                        <span class="fa fa-plus-square-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Unit Cost</label>
                        <input type="number" min='0' name="cost[]" class="form-control has-feedback-left"
                               id="inputSuccess3">
                        <span class="fa fa-circle-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Delivery Date</label>
                        <input type="date" name="del[]" class="form-control has-feedback-left">
                        <span class="fa fa-calendar-plus-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Date Received</label>
                        <input type="date" name="rec[]" data-validate-length-range="5,20"
                               class="optional form-control has-feedback-left">
                        <span class="fa fa-calendar-check-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Expiration Date</label>
                        <input type="date" name="exp[]" data-validate-length-range="5,20"
                               class="optional form-control has-feedback-left">
                        <span class="fa fa-calendar-times-o form-control-feedback left"
                              aria-hidden="true"></span>
                    </div>

                    <div class="col-md-4 form-group has-feedback">
                        <label>Supplier</label>
                        <select list="typelist" name="supp[]"
                                class="supplieropt form-control has-feedback-left"
                                placeholder="Type">
                        </select>
                        <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Official Receipt Number</label>
                        <input data-parsley-group="set2" data-parsley-trigger="blur" type="number"
                               name="quant[]" min=0 class="form-control has-feedback-left">
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
    <div class="Accept acceptsp modal fade" id="accept_modal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <h5 class="modal-title" id="myModalLabel">Are you sure you want to Accept?</h5>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Remarks</label>
                        <textarea class="form-control col-12" name="remarks" id="remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" name="id" class="btn-modal btn btn-success" id="save1"><i
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
    <div class="Return returnsp modal fade" id="return" tabindex="-1" role="dialog"
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
                        <div class="serialsp col-md-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" quantsp form-group">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label>Date Returned</label>
                        <input type="date" name="returndate" data-validate-length-range="5,20"
                               class="optional form-control has-feedback-left" required>
                    </div>

                    <div class="form-group">
                        <label>Receiver</label>
                        <input class="form-control" data-parsley-group="set2" data-parsley-trigger="blur" type="text"
                               name="receiver" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Remarks<span
                                    class="required">*</span>
                        </label>
                        <textarea class="form-control" name="remarks" id="remarks" required></textarea>
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
<!-- Modal for generate qr -->
<div class="modal fade" id="genQr" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="QRImages">
                <div id="generatedQR">Loading qr images.....</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if ($position === 'Custodian') {
                    echo '<button name="saveqr" type="file" onclick="printDiv()" required>Print</button>';
                }
                ?>
            </div>
        </div>

    </div>
</div>
<!--end of Return-->
<!--Reconcile Page-->
<div hidden class="reconcilePage col-lg-12">
    <!-- Modal -->
    <div class="modal fade" id="reconSerialSelect" tabindex="-1" role="dialog" aria-labelledby="reconSerialSelect"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <form id="recValidate">
        <div class="card">
            <div class="card-header">
                <button onclick="toggleDiv($('.inventory-tab'),$('.reconcilePage'))"
                        class="btn btn-dark fa fa-arrow-left"> Back
                </button>

            </div>
            <div class="card-body">
                <a type="button" class="compare btn btn-success " onclick="validateReconcile()">Reconcile Items</a>
                <a type="button" class="compare btn btn-success ">Compare</a>

                <button onclick="printToPDFreconcile()" class="btn btn-info fa fa-download pull-right"> Download as
                    PDF
                </button>

                <ul class="nav nav-tabs" id="serialTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-status="1" id="non-serialized-tab" data-toggle="tab"
                           href="#nonSerTab"
                           role="tab"
                           aria-controls="serialized" aria-selected="false">Serialized Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-status="0" id="serialized-tab" data-toggle="tab" href="#serTab"
                           role="tab"
                           aria-controls="co" aria-selected="true">non-Serialized Items</a>
                    </li>

                </ul>
                <div class="tab-content pl-3 p-1" id="serTab">
                    <div class="table-responsive-sm tab-pane fade show active" id="nonSerTab" role="tabpanel"
                         aria-labelledby="nonSer-tab">

                        <table data-show-refresh="true" data-pagination="true" data-search="true" id="serializedItems"
                               class="table table-bordered table-hover table-responsive">
                            <thead class="table-secondary">
                        </table>
                    </div>
                    <div class="table-responsive-sm  tab-pane fade " id="serTab"
                         role="tabpanel"
                         aria-labelledby="nonSerialized-tab">
                        <table data-show-refresh="true" data-pagination="true" data-search="true" id="withoutSerial"
                               class="table table-bordered table-hover table-responsive">
                            <thead class="table-secondary"></thead>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div hidden class="discrepancies col-lg-12">
    <div class="card">
        <div class="card-header">
            <button type="button" onclick="toggleDiv($('.inventory-tab'),$('.discrepancies'))"
                    class="btn btn-primary fa fa-arrow-left"> Back
            </button>
        </div>

        <div class="card-body">
            <p>Please select the serials that was lost: </p>
            <div id="items">Serial not found.</div>
            <button type="button" onclick="toggleDiv($('.reconcilePage'),$('.discrepancies'));">Cancel</button>
            <button type="button" onclick="getAllSerial()">Submit</button>
        </div>
    </div>
</div>
<!--End of Reconcile Page-->

<!--Reconcile Page Modal-->
<div class="invdate modal fade" id="addinvdate" tabindex="-1" role="dialog"
     aria-labelledby="largeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="dateInv">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Date of Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-10">
                            <label for="invdate">Date of Inventory</label>
                            <input required id="inventoryDate" class="form-control col-md-7 col-xs-12"
                                   data-validate-length-range="6"
                                   data-validate-words="2" name="date" required type="date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="reconcile()" name="id" class="btn btn-success btn-modal" id="save1">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
        </form>
    </div>
</div>
</div>
<!--end of add inventory date-->


</div>

