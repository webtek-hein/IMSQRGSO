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
            <div class="col-lg-12 inventory-tab ">
                <div class="card">
                    <div class="card-header">
                        <select id="select-dept" type="button" class="deptopt form-control"><span
                                    class="fa fa-chevron-down"></span></select>
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
                        <button type="button" onclick="detail_back()" class="btn btn"></i> Back</a></button>
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
                                <form id="editInformation"
                                      class="serialForm form-horizontal form-label-left"
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
                                    <?php $position = $this->session->userdata['logged_in']['position'];
                                    if ($position === 'Custodian') {
                                        echo '<button class="btn btn-outline-info" type="submit" name="id" id="edtbutton">
                                            <i class="fa fa-check"></i> save
                                        </button>';
                                    }
                                    ?>
                                </form>

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