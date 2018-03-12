<!-- page content -->
<div id="department" class="page-content" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="inventory-tab">
        <div class="page-title">
            <h1>Departments</h1>
            <select id="selct-dept" type="button" class="deptopt btn btn-default"> <i class="fa fa-chevron-down"></i></select>
        </div>

        <div class="tabpanel" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" id="CO" class="active">
                    <a href="#tab_content1" id="CO-tab" data-toggle="tab" role="tab" aria-expanded="true">Capital
                        Outlay</a>
                </li>
                <li role="presentation" id="MOOE" class="">
                    <a href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="true">MOOE</a>
                </li>
            </ul>
        </div>

        <div class="x_content">
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">
                    <div class="accordion" id="accordion" class="table-main table-responsive" role="tablist"
                         aria-multiselectable="true">
                        <table id="departmentTable" data-url="inventory/viewDept/CO/11" class="table table-no-bordered"
                               data-pagination="true" data-search="true">
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                    <div class="accordion" id="accordion" class="table-responsive" role="tablist"
                         aria-multiselectable="true">
                        <table id="deptMOOEtable" data-pagination="true" data-search="true"
                               data-url="inventory/viewDept/MOOE/11" class="table table-no-bordered">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

                                    <button type="submit" name="id" id="edtbutton">save</button>
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
</div>
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

<!-- /page content -->