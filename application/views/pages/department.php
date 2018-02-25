<!-- page content -->
<div id="inventory-main-page" class="page-content right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="inventory-tab row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 id="deptNameDistrib">Departments</h2>
                        <div class="clearfix"></div>
                    </div>
                    <select id="selct-dept" type="button" class="deptopt btn btn-default"><i class="fa fa-chevron-down"></select>
                    <div class="x_content">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="CO-tab" role="tab" aria-expanded="true">Capital Outlay</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="false">MOOE</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">
                                    <table id="departmentTable" data-url="inventory/viewDept/11"  data-toggle="table" data-pagination="true"
                                           data-search="true" data-show-toggle="true" class="table table-striped table-bordered">
                                        <thead>
                                        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true" data-field="name">Item Name</th>
                                            <th data-sortable="true" data-field="description">Description</th>
                                            <th data-sortable="true" data-field="quant">quantity</th>
                                            <th data-sortable="true" data-field="rec">Date Received</th>
                                            <th data-sortable="true" data-field="unit">Unit</th>
                                            <th data-sortable="true" data-field="action">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                                    <table id="datatable" data-pagination="true" data-search="true" data-toggle="table" data-url="" data-show-toggle="true" class="table table-striped table-bordered">
                                        <thead>
                                        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true">Item Name</th>
                                            <th data-sortable="true">Description</th>
                                            <th data-sortable="true">quantity</th>
                                            <th data-sortable="true">Date Received</th>
                                            <th data-sortable="true">Unit</th>
                                        </tr>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
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





    </div>
</div>
<!-- /page content -->