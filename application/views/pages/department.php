<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Departments</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Departments</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class="col-lg-12 department-tab">
                <select id="select-dept" type="button" class="col-lg-5 deptopt form-control"></select>
                <div class="card">
                    <div class="card-header">
                            <button id="reconcileButton" class="btn btn-outline-success">
                                <i class="fa fa-balance-scale"></i> RECONCILE
                            </button>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item active">
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
                                <table id="departmentTable" data-url="inventory/viewDept/CO/11"
                                       class="table table-no-bordered"
                                       data-pagination="true" data-search="true">
                                </table>
                            </div>
                            <!--MOOE Tab-->
                            <div class="tab-pane fade" id="tab_content2" role="tabpanel" aria-labelledby="MOOE-tab">
                                <!-- Implement Bootsrap table-->
                                <table id="deptMOOEtable" data-pagination="true" data-search="true"
                                       data-url="inventory/viewDept/MOOE/11" class="table table-no-bordered">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-->
            <div hidden class="col-lg-12 detail-tab ">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="toggleDiv($('.department-tab'),$('.detail-tab '))" class="btn btn"></i> Back</a></button>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="DetailTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="DetInfo" data-toggle="tab" href="#Detail_Info"
                                   role="tab"
                                   aria-controls="info" aria-selected="true">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="DetDetail" data-toggle="tab" href="#Detail_Det"
                                   role="tab"
                                   aria-controls="detail" aria-selected="false">Details</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <!-- Information-->
                            <div class="tab-pane fade show active" id="Detail_Info" role="tabpanel"
                                 aria-labelledby="Information-ta">
                                <p class="col-md-12">Item Name : <span id="itemname"></p>


                                <p class="col-md-12">Description: <span id="itemdesc"></p>

                                <p class="col-md-12">Total Quantity: <span id="total"></p>

                                <p class="col-md-12">Unit: <span id="unit"></p>

                                <p class="col-md-12">Type: <span id="itemtype"></p>
                            </div>
                            <!--Detail-->
                            <div class="tab-pane fade" id="Detail_Det" role="tabpanel" aria-labelledby="Detail-tab">
                                <!-- Implement Bootsrap table-->
                                <table id="detail-tab-table" class="table table-no-bordered table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Reconcile Page-->
            <div hidden class="reconcilePage col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button onclick="toggleDiv($('.department-tab'), $('.reconcilePage'))" class="btn btn-primary">Back</button>
                    </div>
                    <form id="compareitem" role="form"
                          action="inventory/compare/" method="POST">
                    <div class="card-body">
                        <div class="table-responsive-sm-sm tab-content pl-3 p-1">
                            <table dclass="table table-no-bordered"
                                   data-pagination="true" data-search="true" id="reconcileTable">
                            </table>
                        </div>
                    </div>
                        <button class="btn btn-success" type="submit" name="id" id="save1" href="#">Reconcile Items</button>
                    </form>
                </div>
            </div>
            <!--End of Reconcile Page-->

            <!-- View Serial-->
            <div hidden class="Serial col-lg-12 ">
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
        <!-- View Serial-->
        <div hidden class="Serial  page-content">
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
        <!-- /page content -->